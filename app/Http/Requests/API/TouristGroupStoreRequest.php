<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TouristGroupStoreRequest extends FormRequest
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
            'registration_at' => ['required'],
            'start_at' => ['required'],
            'return_at' => ['required'],
            'date_and_method_informing' => ['required', 'json'],
            'date_and_method_communication_sessions' => ['required', 'json'],
            'tourist_agency_id' => ['required', 'integer', 'exists:tourist_agencies,id'],
            'summary_members_count' => ['required', 'integer'],
            'children_ages' => ['json'],
            'children_count' => ['required', 'integer'],
            'foreigners_count' => ['required', 'integer'],
            'foreigners_countries' => ['json'],
            'start_point' => ['required', 'string', 'max:255'],
            'final_destination_point' => ['required', 'string', 'max:255'],
            'route_distance' => ['required', 'numeric'],
            'areas_of_rf' => ['required', 'json'],
            'loding_points' => ['required', 'json'],
            'emergency_exit_routest' => ['required', 'json'],
            'dangerous_route_section' => ['json'],
            'difficulty_category' => ['required', 'json'],
            'mobile_devices' => ['required', 'json'],
            'satelite_phone' => ['string', 'max:255'],
            'radio_station' => ['required', 'json'],
            'charge_batteries' => ['required', 'json'],
            'first_aid_equipment' => ['required', 'json'],
            'medical_professionals' => ['json'],
            'insurance' => ['json'],
            'additional_info' => ['string'],
            'tourist_guide_id' => ['required', 'integer', 'exists:tourist_guides,id'],
            'softdeletes' => ['required'],
        ];
    }
}
