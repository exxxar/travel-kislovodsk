<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TouristGuideResource extends JsonResource
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
            'name' => $this->name,
            'tname' => $this->tname,
            'sname' => $this->sname,
            'relative_contact_information' => $this->relative_contact_information,
            'mobile_phone' => $this->mobile_phone,
            'office_phone' => $this->office_phone,
            'home_phone' => $this->home_phone,
            'address' => $this->address,
            'birthday' => $this->birthday,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
