<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Resources\ProfileResource;
use App\Mail\RegistrationMail;
use App\Mail\VerificationEmail;
use App\Notifications\EmailNotification;
use Carbon\Carbon;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\HasApiTokens;
use TCG\Voyager\Models\Role;

class User extends \TCG\Voyager\Models\User implements MustVerifyEmail
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
        'blocked_at',
        'device_key'
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

    protected $appends = [ 'rating_statistic','rating'];

    public function reviews()
    {
        return $this->hasMany(Review::class,'tour_guide_id','id');
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

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function bookings()
    {
        return $this->belongsTo(Booking::class);
    }

    public function favorites()
    {
        return $this->belongsTo(Favorite::class);
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

    public static function self(): string
    {
        return User::query()
            ->with(["profile", "role", "bookings", "favorites", "company"])
            ->find(Auth::user()->id)
            ->toJson();
    }

    public static function selfStatistic(): string
    {
        return json_encode((object)[
            "unread_chats_count"=>Chat::unreadChatsCount(),
            "favorites_count"=>Favorite::favoriteToursCount(),
            "watched_count"=>UserWatchTours::watchedToursCount(),
            "booked_count"=>Booking::bookedToursCount(),
        ]);
    }



    public static function createUser(array $data)
    {
        $validator = Validator::make($data, [
            'username' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'patronymic' => 'nullable|max:255',
            'phone' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'law_status' => 'required',
            'photo' => 'nullable',
            'company' => 'nullable',
            'company.title' => 'nullable|max:255',
            'company.logo' => 'nullable|max:255',
            'company.description' => 'nullable|max:255',
            'company.inn' => 'nullable|max:50',
            'company.ogrn' => 'nullable|max:50',
            'company.law_address' => 'nullable|max:255',
        ]);

        if ($validator->fails()) {
            return new ValidationException($validator);
        }

        $validated = (object)$validator->validated();
        $company = null;

        $law_statuses = [
            "person_law_status_type",
            "individual_law_status_type",
            "entity_law_status_type",
            "self_employed_law_status_type"];

        $dictType = Dictionary::query()
            ->where("slug", $law_statuses[$validated->law_status])
            ->first();

        if ($validated->law_status > 0) {
            $vc = (object)$validated->company;
            $company = Company::query()->create([
                'title' => $vc->title ?? null,
                'description' => $vc->description ?? null,
                'photo' => $vc->logo ?? null,
                'inn' => $vc->inn ?? null,
                'ogrn' => $vc->ogrn ?? null,
                'law_address' => $vc->law_address ?? null,
            ]);

            $userRole = Role::where('name', 'guide')->first();
        } else
            $userRole = Role::where('name', 'user')->first();

        $profile = Profile::create([
            'fname' => $validated->first_name ?? null,
            'sname' => $validated->patronymic ?? null,
            'tname' => $validated->last_name ?? null,
            'photo' => $validated->photo ?? null,
        ]);

        if (strpos($validated->phone, "@") === -1)
            $ph_number = preg_replace("/[^0-9]/", "", $validated->phone);

        $user = User::query()->create([
            'name' => $validated->username,
            'email' => $validated->email,
            'password' => bcrypt($validated->password),
            'role_id' => $userRole->id,
            'phone' => $ph_number ?? $validated->phone,
            'company_id' => !is_null($company) ? $company->id : null,
            'user_law_status_id' => $dictType->id ?? 0,
            'profile_id' => $profile->id,
            'verified_at' => null,
        ]);

        try {
            if (!is_null($user->email))
                Mail::to($user->email)
                    ->send(new RegistrationMail(
                        $user
                    ));
        } catch (\Exception $e) {

        }

        return $user;
    }

    public static function loginUser(array $data)
    {
        $validator = Validator::make($data, [
            'phone' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $validated = (object)$validator->validated();

        if (!strpos($validated->phone, "@") )
            $ph_number = preg_replace("/[^0-9]/", "", $validated->phone);


        $user = User::query()
            ->with(["profile", "role"])
            ->where("phone", $ph_number ?? $validated->phone)
            ->orWhere("email", $validated->phone)
            ->first();

        if (!is_null($user)) {
            $hasher = app('hash');
            if (!$hasher->check($validated->password, $user->password))
                throw new AuthenticationException("Ошибка пароля");

            Auth::login($user, true);
            return $user;
        }

        throw new AuthenticationException("Пользователь не найден!");

    }

   /* public function sendEmailVerificationNotification()
    {
        $this->notify(new EmailNotification());
    }*/

    public function getRatingStatisticAttribute()
    {
        $reviews = $this->reviews()->get() ?? [];

        $tmp = [0, 0, 0, 0, 0, 0];

        foreach ($reviews as $review) {
            $tmp[$review->rating]++;
        }

        return $tmp;
    }

}
