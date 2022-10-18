<?php

namespace App\Http\Resources;

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
        return [
            'id' => $this->id,
            'status_type_id' => $this->status_type_id,
            'amount' => $this->amount,
            'user_id' => $this->user_id,
            'booking_id' => $this->booking_id,
            'description' => $this->description,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
