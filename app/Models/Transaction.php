<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status_type_id',
        'amount',
        'user_id',
        'tour_id',
        'description',
        'payment_method',
        'payment_instrument',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'status_type_id' => 'integer',
        'amount' => 'double',
        'user_id' => 'integer',
        'tour_id' => 'integer',
    ];

    protected $appends = ['resource_url'];

    public function scopeWithFilters($query, $transactionTypeId)
    {
        if (is_null($transactionTypeId))
            return $query;

        if ($transactionTypeId===0)
            return $query;

        if ($transactionTypeId===-1)
            $query = $query
                ->whereNotNull("deleted_at");

        $query = $query->where("status_type_id",$transactionTypeId)
            ->whereNull("deleted_at");

        return $query;
    }

    public function getResourceUrlAttribute()
    {
        return url('/admin/transactions/' . $this->getKey());
    }

    public function statusType()
    {
        return $this->belongsTo(Dictionary::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
