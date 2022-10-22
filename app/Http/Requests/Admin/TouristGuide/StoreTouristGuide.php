<?php

namespace App\Http\Requests\Admin\TouristGuide;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreTouristGuide extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.tourist-guide.create');
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'address' => ['required', 'string'],
            'birthday' => ['required', 'date'],
            'home_phone' => ['nullable', 'string'],
            'mobile_phone' => ['required', 'string'],
            'name' => ['required', 'string'],
            'office_phone' => ['nullable', 'string'],
            'sname' => ['nullable', 'string'],
            'tname' => ['required', 'string'],
            
        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array {
        return [
            'relative_contact_information' => ['required', 'string'],
            
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
