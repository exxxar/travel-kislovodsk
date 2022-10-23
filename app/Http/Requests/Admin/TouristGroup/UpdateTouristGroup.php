<?php

namespace App\Http\Requests\Admin\TouristGroup;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTouristGroup extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.tourist-group.edit', $this->touristGroup);
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'additional_info' => ['nullable', 'string'],
            'children_count' => ['sometimes', 'integer'],
            'final_destination_point' => ['sometimes', 'string'],
            'foreigners_count' => ['sometimes', 'integer'],
            'registration_at' => ['sometimes', 'date'],
            'return_at' => ['sometimes', 'date'],
            'route_distance' => ['sometimes', 'numeric'],
            'satelite_phone' => ['nullable', 'string'],
            'start_at' => ['sometimes', 'date'],
            'start_point' => ['sometimes', 'string'],
            'summary_members_count' => ['sometimes', 'integer'],
            'tourist_agency_id' => ['sometimes', 'string'],
            'tourist_guide_id' => ['sometimes', 'string'],
            

        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array {
        return [
            'areas_of_rf' => ['sometimes', 'string'],
            'charge_batteries' => ['sometimes', 'string'],
            'children_ages' => ['nullable', 'string'],
            'dangerous_route_section' => ['nullable', 'string'],
            'date_and_method_communication_sessions' => ['sometimes', 'string'],
            'date_and_method_informing' => ['sometimes', 'string'],
            'difficulty_category' => ['sometimes', 'string'],
            'emergency_exit_routest' => ['sometimes', 'string'],
            'first_aid_equipment' => ['sometimes', 'string'],
            'foreigners_countries' => ['nullable', 'string'],
            'insurance' => ['nullable', 'string'],
            'loding_points' => ['sometimes', 'string'],
            'medical_professionals' => ['nullable', 'string'],
            'mobile_devices' => ['sometimes', 'string'],
            'radio_station' => ['sometimes', 'string'],
            
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
