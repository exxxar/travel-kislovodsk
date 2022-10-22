<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone',
        'old_password',
        'company_id',
        'user_law_status_id',
        'profile_id',
        'sms_code',
        'sms_notification',
        'email_notification',
        'verified_at',
        'blocked_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(UserRole::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }

    public function userLawStatus()
    {
        return $this->belongsTo(Dictionary::class);
    }

    public function getPermissions()
    {
        $role_id = self::role()->first()->id;
        $permissions = UserPermission::join('user_role_permissions', 'user_permissions.id', '=', 'user_role_permissions.permission_id')
            ->where('user_role_permissions.role_id', $role_id)
            ->pluck('permission_name')
            ->all();
        return $permissions;
    }
}
