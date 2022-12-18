<?php

namespace App\Http\Resources;

use App\Models\Dictionary;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->with(["user.profile","booking","statusType","tour"]);

        return [
            'id' => $this->id,
            'status_type' => new DictionaryResource($this->statusType),
            'status_type_id' => $this->status_type_id,
            'amount' => $this->amount,
            'user_id' => $this->user_id,
            'tour_id' => $this->tour_id,
            'tour' => new TourResource($this->tour),
            'user' => new ProfileResource($this->user->profile),
            'booking_id' => $this->booking_id,
            'booking' => new BookingResource($this->booking),
            'description' => $this->description,
            'created_at' => $this->created_at,
        ];
    }
}
