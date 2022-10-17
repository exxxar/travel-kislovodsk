<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class ProfileStoreRequest extends FormRequest
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
            'fname' => ['required', 'string', 'max:255'],
            'sname' => ['string', 'max:255'],
            'tname' => ['required', 'string', 'max:255'],
            'photo' => ['string', 'max:255'],
            'softdeletes' => ['required'],
        ];
    }
}
