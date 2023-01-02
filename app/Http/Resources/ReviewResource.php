<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        $profile = $this->user->profile??null;

        $photo = $profile->photo??null;

        $fname = $profile->fname??'-';
        $tname = $profile->tname??'-';

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'tour_id' => $this->tour_id,
            'tour' => new TourResource($this->tour),
            'guide' => $this->tourGuide,
            'tour_guide_id' => $this->tour_guide_id,
            'comment' => $this->comment ?? null,
            'images' => $this->images ?? [],
            'rating' => $this->rating ?? 1,
            'user_name'=>"$tname $fname",
            'user_photo'=>$photo,
            'created_at'=>$this->created_at,
        ];
    }
}
