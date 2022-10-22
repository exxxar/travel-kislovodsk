<?php

namespace App\Http\Requests\Admin\Tour;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreTour extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.tour.create');
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'creator_id' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'duration' => ['nullable', 'string'],
            'duration_type_id' => ['nullable', 'string'],
            'is_active' => ['required', 'boolean'],
            'is_draft' => ['required', 'boolean'],
            'is_hot' => ['required', 'boolean'],
            'movement_type_id' => ['nullable', 'string'],
            'payment_type_id' => ['nullable', 'string'],
            'preview_image' => ['nullable', 'string'],
            'rating' => ['required', 'numeric'],
            'start_comment' => ['nullable', 'string'],
            'start_latitude' => ['required', 'numeric'],
            'start_longitude' => ['required', 'numeric'],
            'start_place' => ['required', 'string'],
            'title' => ['required', 'string'],
            'tour_object_id' => ['required', 'string'],
            'tour_type_id' => ['nullable', 'string'],
            'verified_at' => ['nullable', 'date'],
            
        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array {
        return [
            'exclude_services' => ['nullable', 'string'],
            'images' => ['nullable', 'string'],
            'include_services' => ['nullable', 'string'],
            'prices' => ['nullable', 'string'],
            
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
