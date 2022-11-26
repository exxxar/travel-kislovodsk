<?php

namespace App\Http\Requests\API;

use App\Traits\FailedValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class FavoriteUpdateRequest extends FormRequest
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
            'tour_id' => ['required', 'integer', 'exists:tours,id'],
        ];
    }
}
