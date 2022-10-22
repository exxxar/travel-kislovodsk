<?php

namespace App\Http\Requests\Admin\Booking;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateBooking extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.booking.edit', $this->booking);
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'email' => ['sometimes', 'email', 'string'],
            'fname' => ['sometimes', 'string'],
            'payed_at' => ['nullable', 'date'],
            'phone' => ['sometimes', 'string'],
            'sname' => ['nullable', 'string'],
            'start_at' => ['sometimes', 'date'],
            'tname' => ['sometimes', 'string'],
            'tour_id' => ['sometimes', 'string'],
            'user_id' => ['sometimes', 'string'],
            

        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array {
        return [
            'additional_services' => ['nullable', 'string'],
            'selected_prices' => ['sometimes', 'string'],
            
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
