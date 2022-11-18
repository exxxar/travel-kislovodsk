<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TourStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return config("app.debug") || !is_null(Auth::user());
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
            'duration_type_id' => ['integer', 'exists:dictionaries,id'],
            'movement_type_id' => ['integer', 'exists:dictionaries,id'],
            'tour_type_id' => ['integer', 'exists:dictionaries,id'],
            'payment_type_id' => ['integer', 'exists:dictionaries,id'],
            'creator_id' => [''],
            'verified_at' => [''],
            'deleted_at' => [''],
            'tour_objects' => [''],
        ];
    }
}
