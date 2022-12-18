<?php

namespace App\Http\Controllers\API;

use App\Events\ChatNotificationEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\MessageStoreRequest;
use App\Http\Requests\API\MessageUpdateRequest;
use App\Http\Resources\ChatsResource;
use App\Http\Resources\ChatUserResource;
use App\Http\Resources\MessageCollection;
use App\Http\Resources\MessageResource;
use App\Http\Resources\ChatsCollections;
use App\Models\Booking;
use App\Models\Chat;
use App\Models\ChatUsers;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\MessageCollection
     */
    public function index(Request $request)
    {
        $messages = Message::paginate($request->size ?? config('app.results_per_page'));

        return new MessageCollection($messages);
    }

    public function readMessage(Request $request, $chatId)
    {
        $chat = Chat::query()->where("id", $chatId)->first();
        if (is_null($chat))
            return response()->json([], 404);

        $chat->read_at = Carbon::now();
        $chat->save();

        return response()->noContent();
    }

    public function chats(Request $request)
    {
        $chats = Chat::getChats()
            ->paginate($request->size ?? config('app.results_per_page'));


        return ChatsResource::collection($chats);
    }

    public function messageByChatId(Request $request, $chatId)
    {
        $messages = Chat::getChatMessagesByChatId($chatId)
            ->orderBy("created_at", 'DESC')
            ->paginate($request->size ?? config('app.results_per_page'));


        return MessageResource::collection($messages);

    }

    public function messageByUserId(Request $request, $userId)
    {
        $messages = Chat::getChatMessagesByUserId($userId)
            ->paginate($request->size ?? config('app.results_per_page'));

        return new MessageCollection($messages);

    }


    /**
     * @param \App\Http\Requests\API\MessageStoreRequest $request
     * @return \App\Http\Resources\MessageResource
     */
    public function store(MessageStoreRequest $request)
    {
        $message = Message::create($request->validated());

        return new MessageResource($message);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Message $message
     * @return \App\Http\Resources\MessageResource
     */
    public function show(Request $request, Message $message)
    {
        return new MessageResource($message);
    }

    /**
     * @param \App\Http\Requests\API\MessageUpdateRequest $request
     * @param \App\Models\Message $message
     * @return \App\Http\Resources\MessageResource
     */
    public function update(MessageUpdateRequest $request, Message $message)
    {
        $message->update($request->validated());

        return new MessageResource($message);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Message $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $message = Message::query()->find($id);
        if (!is_null($message)) {

            $chat = Chat::query()->with(["chatUsers"])
                ->where("id", $message->chat_id)
                ->first();

            $chat->last_message_id = null;
            $chat->last_message_at = Carbon::now();
            $chat->read_at = null;
            $chat->save();

            $message->delete();
        }


        return response()->noContent();
    }


    public function sendFile(Request $request)
    {
        $request->validate([
            "chat_id" => "required"
        ]);

        $userId = Auth::user()->id;

        $path = '/user/' . $userId . "/messages";
        if (!Storage::exists('/public' . $path)) {
            Storage::makeDirectory('/public' . $path);
        }

        $documents = [];

        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $key => $file) {
                $ext = $file->getClientOriginalExtension();

                $name = Str::uuid() . "." . $ext;

                $file->storeAs("/public", $path . '/' . $name);
                $url = Storage::url('user/' . $userId . "/messages/" . $name);
                array_push($documents, $url);
            }
        }

        $message = Message::query()->create([
            'message' => "Отправка файлов",
            'user_id' => $userId,
            'chat_id' => $request->chat_id,
            'content' => [
                "type" => "files",
                "links" => $documents
            ]
        ]);

        $chat = Chat::query()->with(["chatUsers"])
            ->where("id", $request->chat_id)
            ->first();

        $chat->last_message_id = $message->id;
        $chat->last_message_at = $message->created_at;
        $chat->read_at = null;
        $chat->save();

        $userListIds = $chat->chatUsers()->pluck("user_id");

        event(new ChatNotificationEvent($chat->id, $userListIds));

        return response()->noContent();

    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            "chat_id" => "required",
            "message" => "required",
        ]);


        $message = Message::query()->create([
            'message' => $request->message,
            'user_id' => Auth::user()->id,
            'chat_id' => $request->chat_id,
            'transaction_id' => $request->transaction_id ?? null
        ]);

        $chat = Chat::query()->with(["chatUsers"])->where("id", $request->chat_id)->first();
        $chat->last_message_id = $message->id;
        $chat->last_message_at = $message->created_at;
        $chat->read_at = null;
        $chat->save();

        $userListIds = $chat->chatUsers()->pluck("user_id");

        event(new ChatNotificationEvent($chat->id, $userListIds));

        return response()->noContent();

    }

    public function startGroupChat(Request $request)
    {
        $request->validate([
            "schedule_id" => "required",
            "tour_id" => "required"
        ]);

        $bookeds = Booking::query()
            ->where("schedule_id", $request->schedule_id)
            ->where("tour_id", $request->tour_id)
            //->whereNull("group_chat_id")
            ->get();


        if (!empty($bookeds)) {

            $userIds = [];

            $groupChatId = null;

            foreach ($bookeds as $booked) {
                if (!is_null($booked->group_chat_id))
                    $groupChatId = $booked->group_chat_id;

                if (is_null($booked->group_chat_id))
                    array_push($userIds, $booked->user_id);
            }


            if (is_null($groupChatId)) {
                $chat = Chat::query()->create([
                    "title" => "Групповой чат",
                    "description" => "test",
                    "is_multiply" => true,
                ]);

                $guideUserId = Auth::user()->id;
                $groupChatId = $chat->id;

                $message = Message::query()->create([
                    'message' => "Групповой чат запущен",
                    'user_id' => $guideUserId,
                    'chat_id' => $chat->id
                ]);

                $chat->last_message_id = $message->id;
                $chat->last_message_at = $message->created_at;
                $chat->read_at = null;
                $chat->save();
            }

            Chat::addUsersToChat($groupChatId, $userIds);

            foreach ($bookeds as $booked) {
                $booked->group_chat_id = $groupChatId;
                $booked->save();
            }
        }

        return response()->json([
            "chat_id" => $groupChatId
        ]);

    }

    public function startChat(Request $request)
    {
        $request->validate([
            "recipient_id" => "required",
            "message" => "required|max:255"
        ]);

        $message = $request->message;
        $senderId = Auth::user()->id;
        $recipientId = $request->recipient_id;

        if ($senderId == $recipientId)
            return response()->json([
                "errors" => [
                    "message" => ["Вы не можете задать себе вопрос!"]
                ]
            ], 400);

        $chat = Chat::startNewChat($message, $senderId, $recipientId);

        return response()->json([
            "chat_id" => $chat->id
        ]);

    }

    public function getChatUsers(Request $request, $chatId)
    {

        $chat = Chat::query()->with(["chatUsers"])->where("id", $chatId)
            ->first();

        $userIds = [];

        foreach ($chat->chatUsers as $user)
            array_push($userIds, $user->id);


        $users = User::query()
            ->with(["profile"])
            ->whereIn("id", $userIds)
            ->get();

        return ChatUserResource::collection($users);

    }
}
