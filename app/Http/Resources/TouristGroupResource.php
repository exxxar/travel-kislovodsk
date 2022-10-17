<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TouristGroupResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'registration_at' => $this->registration_at,
            'start_at' => $this->start_at,
            'return_at' => $this->return_at,
            'date_and_method_informing' => $this->date_and_method_informing,
            'date_and_method_communication_sessions' => $this->date_and_method_communication_sessions,
            'tourist_agency_id' => $this->tourist_agency_id,
            'summary_members_count' => $this->summary_members_count,
            'children_ages' => $this->children_ages,
            'children_count' => $this->children_count,
            'foreigners_count' => $this->foreigners_count,
            'foreigners_countries' => $this->foreigners_countries,
            'start_point' => $this->start_point,
            'final_destination_point' => $this->final_destination_point,
            'route_distance' => $this->route_distance,
            'areas_of_rf' => $this->areas_of_rf,
            'loding_points' => $this->loding_points,
            'emergency_exit_routest' => $this->emergency_exit_routest,
            'dangerous_route_section' => $this->dangerous_route_section,
            'difficulty_category' => $this->difficulty_category,
            'mobile_devices' => $this->mobile_devices,
            'satelite_phone' => $this->satelite_phone,
            'radio_station' => $this->radio_station,
            'charge_batteries' => $this->charge_batteries,
            'first_aid_equipment' => $this->first_aid_equipment,
            'medical_professionals' => $this->medical_professionals,
            'insurance' => $this->insurance,
            'additional_info' => $this->additional_info,
            'tourist_guide_id' => $this->tourist_guide_id,
            'softdeletes' => $this->softdeletes,
        ];
    }
}
