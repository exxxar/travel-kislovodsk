<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TouristGuideUpdateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'tname' => ['required', 'string', 'max:255'],
            'sname' => ['string', 'max:255'],
            'relative_contact_information' => ['required', 'json'],
            'mobile_phone' => ['required', 'string', 'max:50'],
            'office_phone' => ['string', 'max:50'],
            'home_phone' => ['string', 'max:50'],
            'address' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'softdeletes' => ['required'],
        ];
    }
}
