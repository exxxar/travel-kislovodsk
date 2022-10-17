<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TouristAgencyUpdateRequest extends FormRequest
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
            'phone' => ['required', 'string', 'max:50'],
            'softdeletes' => ['required'],
        ];
    }
}
