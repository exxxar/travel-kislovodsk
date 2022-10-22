<?php

namespace App\Http\Requests\Admin\TouristGroup;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IndexTouristGroup extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.tourist-group.index');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'orderBy' => 'in:areas_of_rf,charge_batteries,children_ages,children_count,dangerous_route_section,date_and_method_communication_sessions,date_and_method_informing,difficulty_category,emergency_exit_routest,final_destination_point,first_aid_equipment,foreigners_count,foreigners_countries,id,insurance,loding_points,medical_professionals,mobile_devices,radio_station,registration_at,return_at,route_distance,satelite_phone,start_at,start_point,summary_members_count,tourist_agency_id,tourist_guide_id|nullable',
            'orderDirection' => 'in:asc,desc|nullable',
            'search' => 'string|nullable',
            'page' => 'integer|nullable',
            'per_page' => 'integer|nullable',

        ];
    }
}
