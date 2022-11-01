<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\MessageStoreRequest;
use App\Http\Requests\API\MessageUpdateRequest;
use App\Http\Resources\MessageCollection;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\MessageCollection
     */
    public function index(Request $request)
    {
        $messages = Message::paginate($request->count ?? config('app.results_per_page'));

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
}
