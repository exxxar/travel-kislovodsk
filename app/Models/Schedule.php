<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tour_id',
        'guide_id',
        'start_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tour_id' => 'integer',
        'guide_id' => 'integer',
       // 'start_at' => '',
    ];

    protected $appends = ['resource_url'];

    public function getResourceUrlAttribute()
    {
        return url('/admin/schedules/' . $this->getKey());
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function guide()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWithFilters($query, $filterObject)
    {

        if ($filterObject->filter_type == 1)
            $query->whereBetween("start_at", [
                Carbon::now()->format("Y-m-d")." 00:00:00",
                Carbon::now()->addDay()->format("Y-m-d")." 23:59:59",
            ]);

        if ($filterObject->filter_type == 2)
            $query->whereBetween("start_at", [
                Carbon::now()->format("Y-m-d")." 00:00:00",
                Carbon::now()->addWeek()->format("Y-m-d")." 23:59:59",
            ]);

        if ($filterObject->filter_type == 0) {
            $date  = (object)$filterObject->date;

            $query->whereBetween("start_at", [
                Carbon::parse($date->start_date)->format("Y-m-d")." 00:00:00",
                Carbon::parse($date->end_date)->format("Y-m-d")." 23:59:59",
            ]);
        }



        return $query;
    }
}
