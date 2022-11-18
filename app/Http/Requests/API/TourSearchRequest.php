<?php

namespace App\Http\Requests\API;

use App\Exceptions\ExceptionAPI;
use App\Traits\FailedValidation;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TourSearchRequest extends FormRequest
{
    use FailedValidation;


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return config("app.debug") || !is_null(Auth::user());
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "from_place" => ['nullable','string', 'max:255'],
            "from_date" => ['nullable','string', 'max:255'],

            "to_place" => ['nullable','string', 'max:255'],

            "tour_types" => ['nullable','array'],
            "tour_types.*" => ['integer'],

            "payment_types" => ['nullable','array'],
            "payment_types.*" => ['integer'],

            "duration_types" => ['nullable','array'],
            "duration_types.*" => ['integer'],

            "is_hot" => ['nullable','boolean'],
            "price_types" => ['nullable','array'],
            "price_types.*" => ['integer'],


            "price_range_start" => ['nullable','integer'],
            "price_range_end" => ['nullable','integer'],

            "movement_types" => ['nullable','array'],
            "movement_types.*" => ['integer'],

            "sort_type" => ['nullable','integer'],
            "sort_direction" => ['nullable','integer'],

            "tour_categories" => ['nullable','array'],
            "tour_categories.*" => ['integer'],

            'include_services' => ['nullable','array'],
            'exclude_services' => ['nullable','array'],
        ];
    }
}
