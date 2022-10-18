<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
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
            'tour_id' => $this->tour_id,
            'user_id' => $this->user_id,
            'selected_prices' => $this->selected_prices,
            'additional_services' => $this->additional_services,
            'fname' => $this->fname,
            'sname' => $this->sname,
            'tname' => $this->tname,
            'phone' => $this->phone,
            'email' => $this->email,
            'start_at' => $this->start_at,
            'payed_at' => $this->payed_at,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
