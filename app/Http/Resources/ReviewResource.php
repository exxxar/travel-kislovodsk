<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'user_id' => $this->user_id,
            'tour_id' => $this->tour_id,
            'tour_guide_id' => $this->tour_guide_id,
            'comment' => $this->comment,
            'images' => $this->images,
            'rating' => $this->rating,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
