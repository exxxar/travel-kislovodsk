<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'photo',
        'inn',
        'ogrn',
        'law_address',
        'approve_at',
        'request_approve_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    protected $appends = ['resource_url'];

    public function getResourceUrlAttribute()
    {
        return url('/admin/companies/' . $this->getKey());
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function scopeWithSearchFilter($query, $search)
    {
        if (is_null($search))
            return $query;

        $query = $query->where("title", "like", "%$search%")
            ->orWhere("inn", "like", "%$search%")
            ->orWhere("description", "like", "%$search%")
            ->orWhere("law_address", "like", "%$search%")
            ->orWhere("ogrn", "like", "%$search%");

        return $query;
    }
}
