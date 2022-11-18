<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'short_description',
        'min_group_size',
        'max_group_size',
        'comfort_loading',

        'description',
        'start_place',
        'start_latitude',
        'start_longitude',
        'start_comment',
        'tour_object_id',
        'preview_image',
        'is_hot',
        'is_active',
        'is_draft',
        'duration',
        'rating',
        'images',
        'prices',
        'include_services',
        'exclude_services',
        'duration_type_id',
        'movement_type_id',
        'tour_type_id',
        'payment_type_id',
        'creator_id',
        'verified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'start_latitude' => 'double',
        'start_longitude' => 'double',
        'tour_object_id' => 'integer',
        'is_hot' => 'boolean',
        'is_active' => 'boolean',
        'is_draft' => 'boolean',
        'rating' => 'double',
        'images' => 'array',
        'prices' => 'array',
        'include_services' => 'array',
        'exclude_services' => 'array',
        'duration_type_id' => 'integer',
        'movement_type_id' => 'integer',
        'tour_type_id' => 'integer',
        'payment_type_id' => 'integer',
        'creator_id' => 'integer',
        'verified_at' => 'timestamp',
    ];

    protected $appends = ['resource_url'];

    public function scopeWithSort($query, $sortObject)
    {
        return $query->orderBy($sortObject->sort_type,
            $sortObject->sort_diraction);
    }

    public function scopeWithFilters($query, $filterObject)
    {
        //todo: сделать фильтры
     /*   $filterObject = (object)[
            'from_place' => $request->from_place ?? null,
            'from_date' => $request->from_date ?? null,
            'to_place' => $request->to_place ?? null,

            'price_types' => $filters->price_types ?? [],
            'price_range_start' => $filters->price_range_start ?? null,
            'price_range_end' => $filters->price_range_end ?? null,

            'tour_categories' => $filters->tour_categories ?? [],
            'include_services' => $filters->include_services ?? [],
            'exclude_services' => $filters->exclude_services ?? [],
        ];*/

        if (!is_null($filterObject->is_hot))
            $query->where("is_hot", $filterObject->is_hot);

        if (!is_null($filterObject->payment_types))
            $query->whereIn("payment_type_id", $filterObject->payment_types);

        if (!is_null($filterObject->tour_types))
            $query->whereIn("tour_type_id", $filterObject->tour_types);

        if (!is_null($filterObject->duration_types))
            $query->whereIn("duration_type_id", $filterObject->duration_types);

        if (!is_null($filterObject->movement_types))
            $query->whereIn("movement_type_id", $filterObject->movement_types);


        return $query;
    }


    public function getResourceUrlAttribute()
    {
        return url('/admin/tours/' . $this->getKey());
    }

    public function tourObjects()
    {
        return $this->belongsToMany(TourObject::class);
    }

    public function durationType()
    {
        return $this->belongsTo(Dictionary::class);
    }

    public function movementType()
    {
        return $this->belongsTo(Dictionary::class);
    }

    public function tourType()
    {
        return $this->belongsTo(Dictionary::class);
    }

    public function paymentType()
    {
        return $this->belongsTo(Dictionary::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
