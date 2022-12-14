<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tour_id',
        'tour_guide_id',
        'comment',
        'images',
        'rating',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'tour_id' => 'integer',
        'tour_guide_id' => 'integer',
        'images' => 'array',
        'rating' => 'double',
    ];

    /*    protected $with = ["user","user.profile"];*/

    protected $appends = ['resource_url'];

    public function scopeWithSort($query, $sortObject)
    {
        if (is_null($sortObject))
            return $query->orderBy('id', 'ASC');

        if ($sortObject->sort === "date")
            return $query->orderBy("created_at", $sortObject->direction);

        if ($sortObject->sort === "rating")
            return $query->orderBy("rating", $sortObject->direction);

        return $query;
    }

    public function getResourceUrlAttribute()
    {
        return url('/admin/reviews/' . $this->getKey());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function tourGuide()
    {
        return $this->belongsTo(User::class);
    }
}
