<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TourObjectStoreRequest extends FormRequest
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
            'description' => ['required', 'string'],
            'address' => ['required', 'string', 'max:255'],
            'latitude' => ['required', 'numeric'],
            'longitude' => ['required', 'numeric'],
            'comment' => ['string'],
            'tour_guide_id' => ['required', 'integer', 'exists:tour_guides,id'],
            'creator_id' => ['required', 'integer', 'exists:creators,id'],
            'photos' => ['json'],
            'softdeletes' => ['required'],
        ];
    }
}
