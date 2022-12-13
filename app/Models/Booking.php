<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tour_id',
        'user_id',
        'group_chat_id',
        'transaction_id',
        'schedule_id',
        'selected_prices',
        'additional_services',
        'fname',
        'sname',
        'tname',
        'age',
        'document_info',
        'document_type_title',
        'phone',
        'email',
        'start_at',
        'payed_at'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tour_id' => 'integer',
        'user_id' => 'integer',
        'age' => 'integer',
        'selected_prices' => 'array',
        'additional_services' => 'array',
        'start_at' => 'timestamp',
        'payed_at' => 'timestamp'
    ];

    protected $appends = ['resource_url'];

    public function getResourceUrlAttribute()
    {
        return url('/admin/bookings/' . $this->getKey());
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function bookedToursCount()
    {
        return Booking::query()->where("user_id", Auth::user()->id)->count() ?? 0;
    }
}
