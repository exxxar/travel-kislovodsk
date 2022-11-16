<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dictionary extends Model
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

    public static function getAllDictionariesGroupedByType(){
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

    public static function getTourCategoryTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("tour_category_type");
    }

    public static function getTicketTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("ticket_type");
    }

    public static function getServiceTypes(): Builder
    {
        return Dictionary::getDictionaryByTypes("service_type");
    }




}
