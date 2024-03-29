<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        'base_price',
        'discount_price',
        'short_description',
        'min_group_size',
        'max_group_size',
        'comfort_loading',

        "country",
        "need_email_notification",
        "need_sms_notification",

        'description',
        'start_city',
        'start_address',
        'start_latitude',
        'start_longitude',
        'start_comment',
        'preview_image',
        'is_hot',
        'is_active',
        'is_draft',
        'duration',
        //'rating',
        'images',
        'payment_infos',
        'prices',
        'include_services',
        'exclude_services',
        'duration_type_id',
        'movement_type_id',
        'tour_type_id',
        'payment_type_id',
        'creator_id',
        'request_verify_at',
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
        'comfort_loading' => 'boolean',

        'is_hot' => 'boolean',
        'is_active' => 'boolean',
        'is_draft' => 'boolean',
        //'rating' => 'double',
        'payment_infos' => 'array',
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

    protected $appends = ['resource_url', 'is_liked', 'rating', 'rating_statistic', 'is_once_booked'];


    public function scopeWithSort($query, $sortObject)
    {
        if (is_null($sortObject->sort_type))
            return $query->orderBy('id', 'ASC');

        $sort = Dictionary::getSortTypes()
            ->where("id", $sortObject->sort_type)
            ->first();


        $sortAssociation = [
            "popularity_sort_type" => "rating",
            "reviews_count_sort_type" => "id",
            "price_sort_type" => "base_price",
            "nearest_date_sort_type" => "id",
            "discount_sort_type" => "discount_price",
            "duration_sort_type" => "duration",
        ];

        $sortDirection = $sortObject->sort_direction == 0 ? "ASC" : "DESC";

        return $query->orderBy($sortAssociation[$sort->slug], $sortDirection);
    }

    public function scopeWithCategoryFilters($query, $category)
    {
        switch ($category) {
            default:
            case -1:
                return $query;
            case 0:
                return $query
                    ->where("is_active", true)
                    ->whereNull("deleted_at")
                    ->where("is_draft", false);

            case 1:
                return $query
                    ->where("is_active", false)
                    ->where("is_draft", false);
            case 2:
                return $query
                    ->whereNull("verified_at");
            //->whereNotNull("request_verify_at");
            case 3:
                return $query
                    ->where("is_active", false)
                    ->where("is_draft", true);

            case 4:
                return $query
                    ->withTrashed()
                    ->whereNotNull("deleted_at");


        }

    }

    public function scopeWithFilters($query, $filterObject)
    {

        if (!is_null($filterObject->price_type)) {
            $maxPrice = Tour::query()->max("base_price");
            switch ($filterObject->price_type) {
                default:
                case 0:
                    $query = $query->where("base_price", ">", $filterObject->price_range_start ?? 0)
                        ->where("base_price", "<=", $filterObject->price_range_end ?? $maxPrice);
                    break;
                case 1:
                    $query = $query->where("base_price", ">=", 0)
                        ->where("base_price", "<=", 700);
                    break;
                case 2:
                    $query = $query->where("base_price", ">", 700)
                        ->where("base_price", "<=", 2500);
                    break;
                case 3:
                    $query = $query->where("base_price", ">", 2500);
                    break;
            }

        }

        if (!is_null($filterObject->location_from)) {
            $query = $query->where("start_city", $filterObject->location_from);

        }

        if (!is_null($filterObject->location_to)) {
            $query = $query->whereHas('tourObjects', function ($q) use ($filterObject) {
                $q->where('city', $filterObject->location_to);
            });
        }

        if (!is_null($filterObject->nearest_selected_dates)) {
            switch ($filterObject->nearest_selected_dates) {
                default:
                case 0:

                    $query = $query->whereHas('schedules', function ($q) {
                        $q->whereBetween('start_at', [
                                Carbon::now()->addDay()->format('Y-m-d 00:00:00'),
                                Carbon::now()->addDay()->format('Y-m-d 23:59:59')
                            ]
                        );
                    });

                    break;

                case 1:

                    $query = $query->whereHas('schedules', function ($q) {
                        $q->whereBetween('start_at', [
                                Carbon::now()->addDay()->format('Y-m-d 00:00:00'),
                                Carbon::now()->addDays(3)->format('Y-m-d 23:59:59')
                            ]
                        );
                    });

                    break;


                case 2:

                    $query = $query->whereHas('schedules', function ($q) {
                        $q->whereBetween('start_at', [
                                Carbon::now()->nextWeekendDay()->format('Y-m-d 00:00:00'),
                                Carbon::now()->nextWeekendDay()->addDay()->format('Y-m-d 23:59:59')
                            ]
                        );
                    });
                    break;
            }
        }


        if (!is_null($filterObject->date)) {
            $date = $filterObject->date;

            $query = $query->whereHas('schedules', function ($q) use ($date) {

                $q->whereBetween('start_at', [
                        Carbon::parse($date[0])->format('Y-m-d 00:00:00'),
                        Carbon::parse($date[1])->format('Y-m-d 23:59:59')
                    ]
                );


            });

        }


        if ($filterObject->is_hot === true)
            $query = $query->where("is_hot", $filterObject->is_hot);

        if (!empty($filterObject->payment_types))
            $query = $query->whereIn("payment_type_id", $filterObject->payment_types);

        if (!empty($filterObject->tour_type))
            $query = $query->where("tour_type_id", $filterObject->tour_type);

        if (!empty($filterObject->duration_types))
            $query = $query->whereIn("duration_type_id", $filterObject->duration_types);

        if (!empty($filterObject->movement_types))
            $query = $query->whereIn("movement_type_id", $filterObject->movement_types);

        if (!empty($filterObject->tour_categories)) {
            $query = $query->whereHas('tourCategories', function ($q) use ($filterObject) {
                $q->whereIn('dictionary_id', $filterObject->tour_categories);
            });
        }

        return $query;
    }

    public function getRatingAttribute()
    {

        $reviews = $this->reviews()->get() ?? [];


        $sum = 0;

        foreach ($reviews as $review) {
            $sum += $review->rating;
        }

        if (count($reviews) === 0)
            return 1;
        return round($sum / count($reviews), 2);
    }

    public function getRatingStatisticAttribute()
    {
        $reviews = $this->reviews()->get() ?? [];

        $tmp = [0, 0, 0, 0, 0, 0];

        foreach ($reviews as $review) {
            $tmp[$review->rating]++;
        }

        return $tmp;
    }

    public function getIsLikedAttribute()
    {
        $user = Auth::user() ?? null;
        if (is_null($user))
            return false;

        return !is_null(Favorite::withoutTrashed()->where("tour_id", $this->id)
            ->where("user_id", $user->id)->first());
    }

    public function getIsOnceBookedAttribute(): bool
    {

        $status = Dictionary::getTransactionTypes()
            ->where("slug", "transaction_payed_type")
            ->first();

        if (is_null(Auth::user()) || is_null($status))
            return false;

        $bookings = $this->bookings()
            ->with(["transaction"])
            ->where("user_id", Auth::user()->id)
            ->whereHas("transaction", function ($q) use ($status) {
                $q->where("status_type_id", $status->id);
            })
            ->get();

        return count($bookings) > 0;
    }

    public function getResourceUrlAttribute()
    {
        return url('/admin/tours/' . $this->getKey());
    }

    public function tourObjects()
    {
        return $this->belongsToMany(TourObject::class, 'tour_has_tour_objects');
    }

    public function tourCategories()
    {
        return $this->belongsToMany(Dictionary::class, 'tour_has_tour_categories');
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

    public function bookings()
    {
        return $this->hasMany(Booking::class);
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

    public function schedules()
    {
        return $this->hasMany(Schedule::class)
            ->where("start_at", ">", Carbon::now()->format('Y-m-d H:m'))
            ->orderBy("start_at", "ASC");
    }
}
