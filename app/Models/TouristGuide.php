<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TouristGuide extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'tname',
        'sname',
        'relative_contact_information',
        'mobile_phone',
        'office_phone',
        'home_phone',
        'address',
        'birthday',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'relative_contact_information' => 'array',
        'birthday' => 'date',
    ];

    protected $appends = ['resource_url'];

    public function getResourceUrlAttribute()
    {
        return url('/admin/tourist-guides/' . $this->getKey());
    }

    public function touristGroups()
    {
        return $this->hasMany(TouristGroup::class);
    }
}
