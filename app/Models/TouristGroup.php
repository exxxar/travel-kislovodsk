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
        'route_distance',
        'areas_of_rf',
        'loding_points',
        'emergency_exit_routest',
        'dangerous_route_section',
        'difficulty_category',
        'mobile_devices',
        'satelite_phone',
        'radio_station',
        'charge_batteries',
        'first_aid_equipment',
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
        'registration_at' => 'timestamp',
        'start_at' => 'timestamp',
        'return_at' => 'timestamp',
        'date_and_method_informing' => 'array',
        'date_and_method_communication_sessions' => 'array',
        'tourist_agency_id' => 'integer',
        'children_ages' => 'array',
        'foreigners_countries' => 'array',
        'route_distance' => 'double',
        'areas_of_rf' => 'array',
        'loding_points' => 'array',
        'emergency_exit_routest' => 'array',
        'dangerous_route_section' => 'array',
        'difficulty_category' => 'array',
        'mobile_devices' => 'array',
        'radio_station' => 'array',
        'charge_batteries' => 'array',
        'first_aid_equipment' => 'array',
        'medical_professionals' => 'array',
        'insurance' => 'array',
        'tourist_guide_id' => 'integer',
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
