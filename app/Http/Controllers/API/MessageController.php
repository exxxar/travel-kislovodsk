<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\MessageStoreRequest;
use App\Http\Requests\API\MessageUpdateRequest;
use App\Http\Resources\MessageCollection;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Models\User;
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

    public function selfMessages(Request $request)
    {
        $userId = Auth::user()->id ?? null;

        if (is_null($userId))
            return response()->json(["message" => "Error"], 400);

        $user = User::query()->with(["role"])->where("id", $userId)->first();

        if (is_null($user))
            return response()->json(["message" => "Error"], 400);

        $messages = Message::query()->where(
            ($user->role->role_name === "user" ? "user_id" : "tour_guide_id"),
            $user->id
        )->paginate($request->size ?? config('app.results_per_page'));


        return new MessageCollection($messages);
    }

    public function messageByUserId(Request $request, $userId)
    {
        $user = User::query()->with(["role"])->where("id", $userId)->first();

        if (is_null($user))
            return response()->json(["message" => "Error"], 400);

        $messages = Message::query()->where(
            ($user->role->role_name === "user" ? "user_id" : "tour_guide_id"),
            $user->id
        )->paginate($request->size ?? config('app.results_per_page'));

        return new MessageCollection($messages);

    }

    public function selfChats(Request $request)
    {

        return null;
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

    public function sendMessage(Request $request){

    }
}
