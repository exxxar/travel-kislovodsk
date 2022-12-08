<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class BookingResource extends JsonResource
{
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
            'tour_id' => $this->tour_id,
            'tour' => is_null($this->tour) ? null : new TourResource($this->tour),
            'user_id' => $this->user_id,
            'group_chat_id' => $this->group_chat_id ?? null,
            'schedule_id' => $this->schedule_id ?? null,
            'selected_prices' => $this->selected_prices,
            'additional_services' => $this->additional_services,
            'fname' => $this->fname,
            'sname' => $this->sname,
            'tname' => $this->tname,
            'phone' => $this->phone,
            'avatar' => $this->user->profile->photo,
            'email' => $this->email,
            'start_at' => Carbon::parse($this->start_at)->format('Y-m-d H:m'),
            'payed_at' => $this->payed_at,

        ];
    }
}
