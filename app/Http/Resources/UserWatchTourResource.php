<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserWatchTourResource extends JsonResource
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
            'user_id' => $this->user_id,
            'tour_id' => $this->tour_id,
            'count' => $this->count,
            'tour' => !is_null($this->tour) ? new TourResource($this->tour) : null,
            'watched_at' => $this->watched_at,
        ];
    }
}
