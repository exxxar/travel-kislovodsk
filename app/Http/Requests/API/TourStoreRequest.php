<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TourStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'start_place' => ['required', 'string', 'max:255'],
            'start_latitude' => ['required', 'numeric'],
            'start_longitude' => ['required', 'numeric'],
            'start_comment' => ['string'],
            'tour_object_id' => ['required', 'integer', 'exists:tour_objects,id'],
            'preview_image' => ['string', 'max:255'],
            'is_hot' => ['required'],
            'is_active' => ['required'],
            'is_draft' => ['required'],
            'duration' => ['string', 'max:255'],
            'rating' => ['required', 'numeric'],
            'images' => ['json'],
            'prices' => ['json'],
            'include_services' => ['json'],
            'exclude_services' => ['json'],
            'duration_type_id' => ['integer', 'exists:duration_types,id'],
            'movement_type_id' => ['integer', 'exists:movement_types,id'],
            'tour_type_id' => ['integer', 'exists:tour_types,id'],
            'payment_type_id' => ['integer', 'exists:payment_types,id'],
            'creator_id' => ['required', 'integer', 'exists:creators,id'],
            'verified_at' => [''],
            'softdeletes' => ['required'],
        ];
    }
}
