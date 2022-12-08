<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChatUserResource extends JsonResource
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
            'fname' => $this->profile->fname,
            'sname' => $this->profile->sname,
            'tname' => $this->profile->tname,
            'photo' => $this->profile->photo,
        ];
    }
}
