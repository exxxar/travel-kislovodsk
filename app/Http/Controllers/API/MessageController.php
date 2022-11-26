<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\MessageStoreRequest;
use App\Http\Requests\API\MessageUpdateRequest;
use App\Http\Resources\ChatsResource;
use App\Http\Resources\MessageCollection;
use App\Http\Resources\MessageResource;
use App\Http\Resources\ChatsCollections;
use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

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

        return new MessageCollection($messages);

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
    public function destroy(Request $request, Message $message)
    {
        $message->delete();

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
            'chat_id' => $request->chat_id
        ]);

        $chat = Chat::query()->where("id", $request->chat_id)->first();
        $chat->last_message_id = $message->id;
        $chat->last_message_at = $message->created_at;
        $chat->read_at = null;
        $chat->save();

        $messages = Chat::getChatMessagesByChatId($chat->id)
            ->paginate($request->size ?? config('app.results_per_page'));

        return MessageResource::collection($messages);

    }
}
