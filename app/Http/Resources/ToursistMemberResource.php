<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ToursistMemberResource extends JsonResource
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
            'full_name' => $this->full_name,
            'birthday' => $this->birthday,
            'address' => $this->address,
            'phone' => $this->phone,
            'tourist_group_id' => $this->tourist_group_id,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
