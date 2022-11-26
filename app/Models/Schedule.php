<?php

namespace App\Models;

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
}
