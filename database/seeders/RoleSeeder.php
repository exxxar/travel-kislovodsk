<?php

namespace Database\Seeders;

use App\Models\CustomUserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        Role::firstOrCreate(
            [
                'name' => 'guide',
                "display_name" => "Гид \ Тур фирма"
            ]
        );
    }
}
