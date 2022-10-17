<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class MessageUpdateRequest extends FormRequest
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
            'content' => ['json'],
            'transaction_id' => ['integer', 'exists:transactions,id'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'tour_guide_id' => ['required', 'integer', 'exists:tour_guides,id'],
            'read_at' => [''],
            'softdeletes' => ['required'],
        ];
    }
}
