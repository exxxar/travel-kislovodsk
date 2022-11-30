<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Dictionary;
use App\Models\Profile;
use App\Models\User;
use App\Models\CustomUserRole;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::query()->where("phone", "79490000000")->first();

        if (is_null($user)) {

            $user = User::createUser([
                'username' => "travelKislovodsk",
                'first_name' => "Туризм",
                'last_name' => "Кисловодск",
                'patronymic' => "Олегович",
                'phone' => '79490000000',
                'email' => 'travel@kislivodsk.ru',
                'password' => "test_travel",
                'law_status' => 1,
                'photo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Flag_of_Kislovodsk_%28Stavropol_krai%29_%282012%29.svg/1599px-Flag_of_Kislovodsk_%28Stavropol_krai%29_%282012%29.svg.png',
                'company'=> [
                    "title"=>"Туризм Кисловодск",
                    "logo"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Flag_of_Kislovodsk_%28Stavropol_krai%29_%282012%29.svg/1599px-Flag_of_Kislovodsk_%28Stavropol_krai%29_%282012%29.svg.png",
                    "description"=>"Туризм Кисловодск",
                    "inn"=>"3333000999",
                    "ogrn"=>"1234567890123",
                    "law_address"=>"г. Кисловодск, ул. Ленина, 23, офис 5",
                ]

            ]);

            /*---------------Admin---------------*/
            $user = User::createUser([
                'username' => "Admin",
                'first_name' => "Туризм",
                'last_name' => "Кисловодск",
                'patronymic' => "Олегович",
                'phone' => '79491234567',
                'email' => 'admin@admin.com',
                'password' => "admin",
                'law_status' => 1,
                'photo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Flag_of_Kislovodsk_%28Stavropol_krai%29_%282012%29.svg/1599px-Flag_of_Kislovodsk_%28Stavropol_krai%29_%282012%29.svg.png',
                'company'=> [
                    "title"=>"Туризм Кисловодск",
                    "logo"=>"https://upload.wikimedia.org/wikipedia/commons/thumb/d/db/Flag_of_Kislovodsk_%28Stavropol_krai%29_%282012%29.svg/1599px-Flag_of_Kislovodsk_%28Stavropol_krai%29_%282012%29.svg.png",
                    "description"=>"Туризм Кисловодск",
                    "inn"=>"3333000999",
                    "ogrn"=>"1234567890123",
                    "law_address"=>"г. Кисловодск, ул. Ленина, 23, офис 5",
                ]

            ]);

            $adminRole = Role::query()->where("name", "admin")->first();

            $user->role_id = $adminRole->id;
            $user->save();


        }
        /*---------------------------------*/

        for ($i = 0; $i < 10; $i++) {
            $lawStatusType = Dictionary::getLawStatusTypes()
                ->where('slug', 'person_law_status_type')
                ->first();

            $userRole = Role::query()->where("name", "user")->first();

            $profile = Profile::factory()->create();

            User::factory()->create([
                'role_id' => $userRole->id,
                'user_law_status_id' => $lawStatusType->id,
                'profile_id' => $profile->id,
            ]);
        }
    }
}
