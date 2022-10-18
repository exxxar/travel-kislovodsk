<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
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
            'status_type_id' => ['required', 'integer', 'exists:status_types,id'],
            'amount' => ['required', 'numeric'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'booking_id' => ['required', 'integer', 'exists:bookings,id'],
            'description' => ['string'],
            'softdeletes' => ['required'],
        ];
    }
}
