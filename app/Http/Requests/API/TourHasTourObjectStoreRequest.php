<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TourHasTourObjectStoreRequest extends FormRequest
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
            'tour_id' => ['required', 'integer', 'exists:tours,id'],
            'tour_object_id' => ['required', 'integer', 'exists:tour_objects,id'],
        ];
    }
}
