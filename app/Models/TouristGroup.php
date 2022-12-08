<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TouristGroup extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'registration_at',
        'start_at',
        'return_at',
        'date_and_method_informing',
        'date_and_method_communication_sessions',
        'tourist_agency_id',
        'summary_members_count',
        'children_ages',
        'children_count',
        'foreigners_count',
        'foreigners_countries',
        'start_point',
        'final_destination_point',
        'dangerous_route_sections',
        'route_distance',
        'areas_of_rf',
        'lodging_points',
        'emergency_exit_routes',
        'dangerous_route_section',
        'difficulty_category',
        'travel_type',
        'type_of_transport',
        'mobile_phones',
        'satellite_phones',
        'radio_stations',
        'charge_batteries',
        'first_aid_equipments',
        'medical_professionals',
        'insurance',
        'additional_info',
        'tourist_guide_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',

        'registration_at'=> 'date',
        'start_at'=> 'datetime',
        'return_at'=> 'datetime',

        'date_and_method_informing'=> 'array',
        'date_and_method_communication_sessions'=> 'array',

        'tourist_agency_id'=> 'integer',
        'summary_members_count'=> 'integer',
        'children_ages'=> 'array',

        'children_count'=> 'integer',
        'foreigners_count'=> 'integer',
        'foreigners_countries'=> 'array',

        'route_distance'=> 'integer',
        'areas_of_rf'=> 'array',
        'lodging_points'=> 'array',
        'emergency_exit_routes'=> 'array',
        'dangerous_route_sections'=> 'array',

        'mobile_phones'=> 'array',
        'satellite_phones'=> 'array',
        'radio_stations'=> 'array',
        'charge_batteries'=> 'array',
        'first_aid_equipments'=> 'array',
        'medical_professionals'=> 'array',

        'additional_info'=> 'array',
        'tourist_guide_id'=> 'integer',
    ];

    protected $appends = ['resource_url'];

    public function getResourceUrlAttribute()
    {
        return url('/admin/tourist-groups/' . $this->getKey());
    }

    public function touristAgency()
    {
        return $this->belongsTo(TouristAgency::class);
    }

    public function touristGuide()
    {
        return $this->belongsTo(TouristGuide::class);
    }

    public function touristMembers()
    {
        return $this->hasMany(TouristMember::class);
    }
}
