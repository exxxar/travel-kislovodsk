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
            'fname' => $this->profile->fname,
            'tname' => $this->profile->tname,
            'sname' => $this->profile->sname,
            'avatar' => $this->profile->avatar,
            'mobile_phone' => $this->mobile_phone,
            'office_phone' => $this->office_phone,
            'home_phone' => $this->home_phone,
            'address' => $this->address,
            'company' => $this->company,
            'birthday' => $this->birthday,
            'reviews' => $this->reviews,
            'rating' => $this->rating ?? 1,
            'rating_statistic' => $this->rating_statistic,
        ];
    }
}
