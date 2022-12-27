<?php

namespace App\Http\Controllers;

use App\Http\Requests\MCHSFormRequest;
use App\Models\TouristAgency;
use App\Models\TouristGroup;
use App\Models\TouristGuide;
use App\Models\TouristMember;
use Illuminate\Http\Request;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

class TourGroupController extends Controller
{
    //

    public function sendMCHSForm(MCHSFormRequest $request)
    {

        $company = (object)$request->company;

        $tmpTouristAgency = [
            'title' => $company->title,
            'address' => $company->address,
            'phone' => $company->phone,
        ];

        $touristAgency = TouristAgency::query()->create($tmpTouristAgency);

        $guide = (object)$request->guide;

        $tmpTouristGuide = [
            'name' => $guide->first_name,
            'tname' => $guide->last_name,
            'sname' => $guide->second_name,
            'relative_contact_information' => $guide->relative_contact_information,
            'mobile_phone' => $guide->mobile_phone,
            'office_phone' => $guide->office_phone,
            'home_phone' => $guide->home_phone,
            'address' => $guide->home_address,
            'birthday' => $guide->date_of_birth,
        ];

        $touristGuide = TouristGuide::query()->create($tmpTouristGuide);

        $children_ages = [];
        $children_count = 0;
        $foreign_citizen_count = 0;
        $foreign_citizen_countries = [];

        $group_info = (object)$request->group_info;

        foreach ($group_info->children as $child) {
            $child = (object)$child;
            $children_count += $child->count;
            array_push($children_ages, $child->age);
        }


        foreach ($group_info->foreign_citizens as $citizen) {
            $citizen = (object)$citizen;
            $foreign_citizen_count += $citizen->count;
            array_push($foreign_citizen_countries, $citizen->country);
        }

        $route_info = (object)$request->route_info;
        $communications = (object)$request->communications;


        $tmpTouristGroup = [
            'registration_at' => $request->registration_date,
            'start_at' => $request->start_date,
            'return_at' => $request->return_date,
            'date_and_method_informing' => json_encode($request->date_and_method_informing_on_finish ?? []),
            'date_and_method_communication_sessions' => json_encode($request->date_and_method_communication_sessions ?? []),
            'tourist_agency_id' => $touristAgency->id,
            'summary_members_count' => $group_info->members_count,
            'children_ages' => json_encode($children_ages ?? []),
            'children_count' => $children_count,
            'foreigners_count' => $foreign_citizen_count,
            'foreigners_countries' => json_encode($foreign_citizen_countries ?? []),
            'start_point' => $route_info->start_point,
            'final_destination_point' => $route_info->final_point,
            'route_distance' => $route_info->route_distance,
            'areas_of_rf' => json_encode($route_info->federation_areas ?? []),
            'lodging_points' => json_encode($route_info->lodging_points ?? []),
            'emergency_exit_routes' => json_encode($route_info->emergency_exit_routes ?? []),
            'dangerous_route_sections' => json_encode($route_info->dangerous_route_sections ?? []),
            'difficulty_category' => $route_info->difficulty_category,
            'travel_type' => $route_info->travel_type,
            'type_of_transport' => $route_info->type_of_transport,
            'mobile_phones' => json_encode($communications->mobile_phones ?? []),
            'satellite_phones' => json_encode($communications->satellite_phones ?? []),
            'radio_stations' => json_encode($communications->radio_stations ?? []),
            'charge_batteries' => json_encode($request->charge_batteries ?? []),
            'first_aid_equipments' => json_encode($request->first_aid_equipments ?? []),
            'medical_professionals' => json_encode($request->medical_professionals ?? []),
            'insurance' => $request->insurance,
            'additional_info' => json_encode($request->additional_info ?? []),
            'tourist_guide_id' => $touristGuide->id
        ];

        $touristGroup = TouristGroup::query()->create($tmpTouristGroup);

        $tmpTouristMembers = [];

        foreach ($request->tour_group_members as $member) {
            $member = (object)$member;

            $tmpTouristMember = [
                'full_name' => $member->full_name,
                'birthday' => $member->date_of_birth,
                'address' => $member->home_address,
                'phone' => $member->phone_number,
                'tourist_group_id' => $touristGroup->id,
            ];

            array_push($tmpTouristMembers, $tmpTouristMember);

            TouristMember::query()->create($tmpTouristMember);
        }

        try {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(
            view("pdf.group",
                [
                    "agency" => (object)$tmpTouristAgency,
                    "group" => (object)$tmpTouristGroup,
                    "guide" => (object)$tmpTouristGuide,
                    "members" => (object)$tmpTouristMembers,
                ]
            )
        );
        }catch (\Exception $e){
            dd($e->getMessage());
        }
        $data = $mpdf->Output("group.pdf", "S");

        $response = Telegram::sendDocument([
            'chat_id' => env("ADMIN_TELEGRAM_CHANNEL"),
            "document" => InputFile::createFromContents($data, "group-#".$touristGroup->id.".pdf"),
            "caption" => "#мчс, #заявкамчс, #туристическаягруппамчс",
            "parse_mode" => "HTML"
        ]);

        return response()->noContent();
    }
}
