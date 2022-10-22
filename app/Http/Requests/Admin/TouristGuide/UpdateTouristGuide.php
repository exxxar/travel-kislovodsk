<?php

namespace App\Http\Requests\Admin\TouristGuide;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTouristGuide extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.tourist-guide.edit', $this->touristGuide);
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'address' => ['sometimes', 'string'],
            'birthday' => ['sometimes', 'date'],
            'home_phone' => ['nullable', 'string'],
            'mobile_phone' => ['sometimes', 'string'],
            'name' => ['sometimes', 'string'],
            'office_phone' => ['nullable', 'string'],
            'sname' => ['nullable', 'string'],
            'tname' => ['sometimes', 'string'],
            

        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array {
        return [
            'relative_contact_information' => ['sometimes', 'string'],
            
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
