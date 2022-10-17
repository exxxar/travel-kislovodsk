<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TouristMemberUpdateRequest extends FormRequest
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
            'full_name' => ['required', 'string', 'max:255'],
            'birthday' => ['required', 'date'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'tourist_group_id' => ['required', 'integer', 'exists:tourist_groups,id'],
            'softdeletes' => ['required'],
        ];
    }
}
