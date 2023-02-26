<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class   Dictionary extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'dictionary_type_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'dictionary_type_id' => 'integer',
    ];

    protected $appends = ['resource_url'];

    public function getResourceUrlAttribute()
    {
        return url('/admin/dictionaries/' . $this->getKey());
    }

    public function dictionaryType()
    {
        return $this->belongsTo(DictionaryType::class);
    }

    public static function getAllDictionariesGroupedByType()
    {
        return Dictionary::query()
            ->with(["dictionaryType"])
            ->get();
    }

    private static function getDictionaryByTypes($slug)
    {
        $dt = DictionaryType::query()->where("slug", $slug)->first();

        if (is_null($dt))
            return null;

        return Dictionary::query()->with(["dictionaryType"])->where("dictionary_type_id", $dt->id);
    }

    public static function getDurationTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("duration_type");
    }

    public static function getMovementTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("movement_type");
    }

    public static function getTourCategoryTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("tour_category_type");
    }

    public static function getSortTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("sort_type");
    }


    public static function getTourTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("tour_type");
    }

    public static function getPaymentTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("payment_type");
    }

    public static function getTransactionTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("transaction_type");
    }

    public static function getLawStatusTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("law_status_type");
    }

    public static function getMessageContentTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("message_content_type");
    }

    public static function getMessageTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("message_type");
    }

    public static function getMessageStatusTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("message_status_type");
    }


    public static function getTicketTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("ticket_type");
    }

    public static function getServiceTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("service_type");
    }

    public static function getLocations($type = 0, $ask = null)
    {
        $from = [];
        $to = [];

        if ($type == 0) {
            $tours = Tour::query()
                ->select('start_city')
                ->whereNotNull("start_city")
                ->groupBy('start_city')
                ->get()
                ->pluck("start_city");

            $tourObjects = TourObject::query()
                ->select('city')
                ->whereNotNull("city")
                ->groupBy('city')
                ->get()
                ->pluck("city");

            $from = $tours->toArray();
            $to = $tourObjects->toArray();
        }

        if ($type == 1) {
            $tours = Tour::query()
                ->with(["tourObjects" => function ($query) {
                    $query->select('city')
                        ->whereNotNull("city");
                }])
                ->whereNotNull("start_city")
                ->where("start_city", $ask)
                ->get();


            foreach ($tours as $tour) {
                if (!in_array("$tour->start_city", $from))
                    array_push($from, $tour->start_city);
                foreach ($tour->tourObjects as $obj)
                    if (!in_array("$obj->city", $to))
                        array_push($to, $obj->city);
            }
        }

        if ($type == 2) {
            $tours = Tour::query()
                ->with(["tourObjects" => function ($query) use ($ask) {
                    $query->select('city')
                        ->whereNotNull("city")
                        ->where("city", $ask);
                }])
                ->whereNotNull("start_city")
                ->get();


            foreach ($tours as $tour) {
                if (count($tour->tourObjects)!=0) {
                    if (!in_array("$tour->start_city", $from))
                        array_push($from, $tour->start_city);
                    foreach ($tour->tourObjects as $obj)
                        if (!in_array("$obj->city", $to))
                            array_push($to, $obj->city);
                }
            }

        }

        return [
            "from" => $from,
            "to" => $to
        ];
    }

    public static function getTourDates($self = false)
    {

        $schd = Schedule::query()
            ->where("start_at", ">", Carbon::now()
                ->format('Y-m-d H:m'));

        if (!$self)
            $schd = $schd
                ->where("start_at", "<", Carbon::now()
                    ->addMonth()
                    ->format('Y-m-d H:m'));

        if ($self)
            $schd = $schd->where("guide_id", Auth::user()->id);

        $schd = $schd->distinct("start_at")
            ->pluck("start_at")
            ->toArray();

        return array_values($schd);
    }


}
