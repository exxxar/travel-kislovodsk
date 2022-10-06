<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $fillable = [
        'permission_name'
    ];

    public function permissionRoles()
    {
        return $this->hasMany(UserRolePermission::class);
    }
}
