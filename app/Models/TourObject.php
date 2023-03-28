<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourObject extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'country',
        'city',
        'address',
        'latitude',
        'longitude',
        'comment',
        'creator_id',
        'photos',
        'pogoda_klimat_id',

        "is_global_template",
        "is_verified",
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'latitude' => 'double',
        'longitude' => 'double',
        'tour_guide_id' => 'integer',
        'creator_id' => 'integer',
        'photos' => 'array',
        "is_global_template"=>"bool",
        "is_verified"=>"bool",
    ];

    protected $appends = ['resource_url'];

    public function getResourceUrlAttribute()
    {
        return url('/admin/tour-objects/' . $this->getKey());
    }

    public function tours()
    {
        return $this->belongsTo(Tour::class);
    }


    public function creator()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeWithFilters($query, $filterObject)
    {
        if ($filterObject->need_not_verified){
            return $query->where("is_verified", false)
                ->whereNull("deleted_at");
        }

        if ($filterObject->need_verified){
            return $query->where("is_verified", true)
                ->whereNull("deleted_at");
        }

        if ($filterObject->need_template){
            return $query->where("is_global_template", true)
                ->whereNull("deleted_at");
        }

        if ($filterObject->need_removed){
            return $query->whereNotNull("deleted_at");
        }


        if ($filterObject->need_active){
            return $query
                ->where("is_verified", true)
                ->whereNull("deleted_at");
        }


        return $query;
    }
}
