<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MCHSFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "registration_date" => "required",
            "start_date" => "required",
            "return_date" => "required",
            "company.title" => "required",
            "company.address" => "required",
            "company.phone" => "required",
            "guide.last_name" => "required",
            "guide.second_name" => "required",
            "guide.first_name" => "required",
            "guide.date_of_birth" => "required",
            "guide.home_address" => "required",
            "guide.home_phone" => "required",
            "guide.office_phone" => "required",
            "guide.mobile_phone" => "required",
            "guide.relative_contact_information" => "required",
            "tour_group_members.*" => "required",
            "tour_group_members.*.full_name" => "required",
            "tour_group_members.*.date_of_birth" => "required",
            "tour_group_members.*.home_address" => "required",
            "tour_group_members.*.phone_number" => "required",
            "group_info.members_count" => "required",
            "group_info.children.*.count" => "required",
            "group_info.children.*.age" => "required",
            "group_info.foreign_citizens.*.count" => "required",
            "group_info.foreign_citizens.*.country" => "required",
            "route_info.start_point" => "required",
            "route_info.final_point" => "required",
            "route_info.route_distance" => "required",
            "route_info.federation_areas.*" => "required",
            "route_info.lodging_points.*" => "required",
            "route_info.emergency_exit_routes.*" => "required",
            "route_info.dangerous_route_sections.*" => "required",
            "route_info.difficulty_category" => "required",
            "route_info.travel_type" => "required",
            "route_info.type_of_transport" => "required",
            "date_and_method_informing_on_finish.date" => "required",
            "date_and_method_informing_on_finish.method" => "required",
            "date_and_method_communication_sessions.*.date" => "required",
            "date_and_method_communication_sessions.*.method" => "required",
            "communications.mobile_phones.*" => "required",
            "communications.satellite_phones.*" => "required",
            "communications.radio_stations.*" => "required",
            "charge_batteries.*" => "required",
            "first_aid_equipments.*" => "required",
            "medical_professionals.*" => "required",
            //"insurance" => "required",
            "additional_info.*" => "required",
            "approve_info" => "required",
            "accept_rules" => "required",
        ];
    }
}
