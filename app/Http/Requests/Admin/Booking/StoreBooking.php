<?php

namespace App\Http\Requests\Admin\Booking;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreBooking extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.booking.create');
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'email' => ['required', 'email', 'string'],
            'fname' => ['required', 'string'],
            'payed_at' => ['nullable', 'date'],
            'phone' => ['required', 'string'],
            'sname' => ['nullable', 'string'],
            'start_at' => ['required', 'date'],
            'tname' => ['required', 'string'],
            'tour_id' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            
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
            'selected_prices' => ['required', 'string'],
            
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
