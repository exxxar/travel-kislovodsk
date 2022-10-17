<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'tour_id' => ['integer', 'exists:tours,id'],
            'tour_guide_id' => ['integer', 'exists:tour_guides,id'],
            'comment' => ['required', 'string'],
            'images' => ['json'],
            'rating' => ['required', 'numeric'],
            'softdeletes' => ['required'],
        ];
    }
}
