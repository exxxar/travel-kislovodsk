<?php

namespace App\Http\Requests\Admin\Document;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateDocument extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.document.edit', $this->document);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'approved_at' => ['nullable', 'date'],
            'company_id' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'path' => ['sometimes', 'string'],
            'title' => ['nullable', 'string'],
            'valid_to' => ['nullable', 'date'],
            
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
