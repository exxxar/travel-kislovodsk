<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomUserRole extends Model
{
    use HasFactory;

    protected $table = 'custom_user_roles';

    protected $fillable = [
        'role_name'
    ];

    /*public function users()
    {
        return $this->hasMany(User::class);
    }*/
}
