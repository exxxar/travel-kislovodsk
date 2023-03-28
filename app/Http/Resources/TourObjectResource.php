<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpKernel\Profiler\Profile;

class TourObjectResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $guide = new ProfileResource($this->creator->profile);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'country' => $this->country??null,
            'city' => $this->city,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'comment' => $this->comment,
            'guide' => $guide,
            'photos' => $this->photos,
            "is_global_template" => $this->is_global_template ?? false,
            "pogoda_klimat_id" => $this->pogoda_klimat_id ?? null,
            "is_verified" => $this->is_verified ?? false,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
