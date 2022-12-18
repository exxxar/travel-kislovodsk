<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $this->with(["user.profile"]);

        return [
            'id' => $this->id,
            'message' => $this->message,
            'content' => $this->content,
            'transaction_id' => $this->transaction_id,
            'user_id' => $this->user_id,
            'profile' => new ProfileResource($this->user->profile),
            'transaction' => new TransactionResource($this->transaction),
            'chat_id' => $this->chat_id,
            'tour_id' => $this->sender_id,
            'read_at' => $this->read_at,
            'created_at' => $this->created_at,

        ];
    }
}
