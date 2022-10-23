<?php

namespace App\Http\Requests\Admin\TouristGroup;

use Brackets\Translatable\TranslatableFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreTouristGroup extends TranslatableFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.tourist-group.create');
    }

/**
     * Get the validation rules that apply to the requests untranslatable fields.
     *
     * @return array
     */
    public function untranslatableRules(): array {
        return [
            'additional_info' => ['nullable', 'string'],
            'children_count' => ['required', 'integer'],
            'final_destination_point' => ['required', 'string'],
            'foreigners_count' => ['required', 'integer'],
            'registration_at' => ['required', 'date'],
            'return_at' => ['required', 'date'],
            'route_distance' => ['required', 'numeric'],
            'satelite_phone' => ['nullable', 'string'],
            'start_at' => ['required', 'date'],
            'start_point' => ['required', 'string'],
            'summary_members_count' => ['required', 'integer'],
            'tourist_agency_id' => ['required', 'string'],
            'tourist_guide_id' => ['required', 'string'],
            
        ];
    }

    /**
     * Get the validation rules that apply to the requests translatable fields.
     *
     * @return array
     */
    public function translatableRules($locale): array {
        return [
            'areas_of_rf' => ['required', 'string'],
            'charge_batteries' => ['required', 'string'],
            'children_ages' => ['nullable', 'string'],
            'dangerous_route_section' => ['nullable', 'string'],
            'date_and_method_communication_sessions' => ['required', 'string'],
            'date_and_method_informing' => ['required', 'string'],
            'difficulty_category' => ['required', 'string'],
            'emergency_exit_routest' => ['required', 'string'],
            'first_aid_equipment' => ['required', 'string'],
            'foreigners_countries' => ['nullable', 'string'],
            'insurance' => ['nullable', 'string'],
            'loding_points' => ['required', 'string'],
            'medical_professionals' => ['nullable', 'string'],
            'mobile_devices' => ['required', 'string'],
            'radio_station' => ['required', 'string'],
            
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
