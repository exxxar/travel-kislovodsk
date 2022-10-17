<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class DictionaryTypeUpdateRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:190', 'unique:dictionary_types,title'],
            'softdeletes' => ['required'],
        ];
    }
}
