<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends JsonResource
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
            'start_place' => $this->start_place,
            'start_latitude' => $this->start_latitude,
            'start_longitude' => $this->start_longitude,
            'start_comment' => $this->start_comment,
            'tour_object_id' => $this->tour_object_id,
            'preview_image' => $this->preview_image,
            'is_hot' => $this->is_hot,
            'is_active' => $this->is_active,
            'is_draft' => $this->is_draft,
            'duration' => $this->duration,
            'rating' => $this->rating,
            'images' => $this->images,
            'prices' => $this->prices,
            'include_services' => $this->include_services,
            'exclude_services' => $this->exclude_services,
            'duration_type_id' => $this->duration_type_id,
            'movement_type_id' => $this->movement_type_id,
            'tour_type_id' => $this->tour_type_id,
            'payment_type_id' => $this->payment_type_id,
            'creator_id' => $this->creator_id,
            'verified_at' => $this->verified_at,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
