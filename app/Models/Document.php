<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'origin_title',
        'path',
        'size',
        'user_id',
        'valid_to',
        'approved_at',
        'request_approve_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'valid_to' => 'timestamp',
        'approved_at' => 'timestamp',
        'request_approve_at' => 'timestamp',
    ];

    protected $appends = ['resource_url'];

    public function getResourceUrlAttribute()
    {
        return url('/admin/documents/' . $this->getKey());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
