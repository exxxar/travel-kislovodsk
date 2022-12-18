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
            'start_city' => ['required', 'string', 'max:255'],
            'start_address' => ['required', 'string', 'max:255'],
            'start_latitude' => [ ''],
            'start_longitude' => [''],
            'start_comment' => ['string'],
            'tour_objects.*' => ['required', 'integer', 'exists:tour_objects,id'],
            'preview_image' => [''],
            'is_hot' => [''],
            'is_active' => [''],
            'is_draft' => [''],
            'duration' => ['string', 'max:255'],
            'images' => [''],
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
