<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class DocumentStoreRequest extends FormRequest
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
            'title' => ['string', 'max:255'],
            'path' => ['required', 'string', 'max:255'],
            'description' => ['string'],
            'company_id' => ['required', 'integer', 'exists:companies,id'],
            'valid_to' => [''],
            'approved_at' => [''],
            'softdeletes' => ['required'],
        ];
    }
}
