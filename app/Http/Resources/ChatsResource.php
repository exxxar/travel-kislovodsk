<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatsResource extends JsonResource
{
    private function randColor() {
        return  str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {


        return [
            'id' => $this->id,
            'title' => $this->title,
            'avatar' => 'https://via.placeholder.com/640x480.png/'.$this->randColor().'?text='.$this->id,
            'read_at' => $this->read_at,
            'last_message_at' => $this->last_message_at,
            'description' => $this->description,
            'message' => $this->message,
            'last_message_id' => $this->last_message_id,
        ];
    }
}
