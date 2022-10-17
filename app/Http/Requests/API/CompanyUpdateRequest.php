<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdateRequest extends FormRequest
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
            'photo' => ['required', 'string', 'max:255'],
            'inn' => ['required', 'string', 'max:255'],
            'ogrn' => ['required', 'string', 'max:255'],
            'law_address' => ['required', 'string', 'max:255'],
            'softdeletes' => ['required'],
        ];
    }
}
