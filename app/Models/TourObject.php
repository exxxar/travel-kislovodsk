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
        'city',
        'address',
        'latitude',
        'longitude',
        'comment',
        'creator_id',
        'photos',
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
    ];

    protected $appends = ['resource_url'];

    public function getResourceUrlAttribute()
    {
        return url('/admin/tour-objects/' . $this->getKey());
    }

    public function tours(){
        return $this->belongsToMany(Tour::class);
    }


    public function creator()
    {
        return $this->belongsTo(User::class);
    }
}
