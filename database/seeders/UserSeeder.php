<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Dictionary;
use App\Models\Profile;
use App\Models\User;
use App\Models\UserRole;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $lawStatusType = Dictionary::getLawStatusTypes()
            ->where('title' , 'Юридическое лицо')
            ->first();

        $guideRole = UserRole::query()->where("role_name","guide")->first();

        $company = Company::query()->create([
            'title'=>"Туризм Кисловодств",
            'description'=>"Туризм Кисловодств",
            'photo'=>null,
            'inn'=>null,
            'ogrn'=>null,
            'law_address'=>null,
        ]);

        $profile = Profile::create([
            'fname' => "Туризм",
            'sname' => "Туризмович",
            'tname' => "Кислововодск",
            'photo' =>  null,
        ]);

        User::query()->create([
            'name'=>"Туры Кисловодска",
            'email'=>"traveler@kislivodsk-travel.ru",
            'password'=>bcrypt("travel_test"),
            'role_id'=>$guideRole->id,
            'phone'=>"+70000000000",
            'company_id'=>$company->id,
            'user_law_status_id'=>$lawStatusType->id,
            'profile_id'=>$profile->id,
            'verified_at'=>Carbon::now(),
        ]);
    }
}