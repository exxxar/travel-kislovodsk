<?php

namespace App\Http\Requests\Admin\Tour;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTour extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.tour.edit', $this->tour);
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'creator_id' => ['sometimes', 'string'],
            'description' => ['nullable', 'string'],
            'duration' => ['nullable', 'string'],
            'duration_type_id' => ['nullable', 'string'],
            'is_active' => ['sometimes', 'boolean'],
            'is_draft' => ['sometimes', 'boolean'],
            'is_hot' => ['sometimes', 'boolean'],
            'movement_type_id' => ['nullable', 'string'],
            'payment_type_id' => ['nullable', 'string'],
            'preview_image' => ['nullable', 'string'],
            'rating' => ['sometimes', 'numeric'],
            'start_comment' => ['nullable', 'string'],
            'start_latitude' => ['sometimes', 'numeric'],
            'start_longitude' => ['sometimes', 'numeric'],
            'start_place' => ['sometimes', 'string'],
            'title' => ['sometimes', 'string'],
            'tour_object_id' => ['sometimes', 'string'],
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
