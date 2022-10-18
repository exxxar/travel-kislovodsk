<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class BookingUpdateRequest extends FormRequest
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
            'tour_id' => ['required', 'integer', 'exists:tours,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'selected_prices' => ['required', 'json'],
            'additional_services' => ['json'],
            'fname' => ['required', 'string', 'max:255'],
            'sname' => ['string', 'max:255'],
            'tname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'start_at' => ['required'],
            'payed_at' => [''],
            'softdeletes' => ['required'],
        ];
    }
}
