<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TourObjectResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'comment' => $this->comment,
            'tour_guide_id' => $this->tour_guide_id,
            'creator_id' => $this->creator_id,
            'photos' => $this->photos,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
