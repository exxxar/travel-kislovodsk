<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'transaction_id' => $this->transaction_id,
            'user_id' => $this->user_id,
            'tour_guide_id' => $this->tour_guide_id,
            'read_at' => $this->read_at,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
