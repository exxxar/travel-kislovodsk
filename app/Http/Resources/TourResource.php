<?php

namespace App\Http\Resources;

use App\Models\Review;
use App\Models\Schedule;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class TourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        $tourObjects = TourObjectResource::collection($this->whenLoaded("tourObjects"))->collection;
        $tourCategories = DictionaryResource::collection($this->whenLoaded("tourCategories"))->collection;
        $schedules = ScheduleResource::collection($this->whenLoaded("schedules"))->collection;
        $reviews = ReviewResource::collection($this->whenLoaded("reviews"))->collection;

        $tourType = new DictionaryResource($this->whenLoaded("tourType"));
        $movementType = new DictionaryResource($this->whenLoaded("movementType"));


        return [
            'id' => $this->id,
            'title' => $this->title,
            'base_price' => $this->base_price,
            'discount_price' => $this->discount_price,
            'short_description' => $this->short_description,
            'min_group_size' => $this->min_group_size,
            'max_group_size' => $this->max_group_size,
            'comfort_loading' => $this->comfort_loading,
            'schedules' => $schedules,

            'description' => $this->description,
            'start_address' => $this->start_address,
            'start_city' => $this->start_city,
            'start_latitude' => $this->start_latitude,
            'start_longitude' => $this->start_longitude,
            'start_comment' => $this->start_comment,
            'tour_objects' => $tourObjects,
            'tour_categories' => $tourCategories,
            'preview_image' => $this->preview_image,
            'is_hot' => $this->is_hot,
            'is_liked' => $this->is_liked ?? false,
            'is_active' => $this->is_active ?? false,
            'is_draft' => $this->is_draft ?? false,
            'duration' => $this->duration,
            'rating' => $this->rating ?? 1,
            'rating_statistic' => $this->rating_statistic ?? [],
            'images' => $this->images ?? [],
            'prices' => $this->prices ?? [],
            'payment_infos' => $this->payment_infos ?? [],
            'include_services' => $this->include_services ?? [],
            'exclude_services' => $this->exclude_services ?? [],
            'duration_type_id' => $this->duration_type_id,
            'movement_type' => $movementType->title ?? "Не установлен",
            'tour_type' => $tourType->title ?? "Не установлен",
            'tour_type_id' => $this->tour_type_id ?? null,
            'payment_type_id' => $this->payment_type_id,
            'creator_id' => $this->creator_id,
            'guide' => new ProfileResource($this->creator->profile) ?? null,
            'verified_at' => $this->verified_at,
            'reviews' => $reviews

        ];
    }
}
