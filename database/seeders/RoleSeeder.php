<?php

namespace Database\Seeders;

use App\Models\CustomUserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        CustomUserRole::firstOrCreate(
            ['role_name' => 'admin']
        );
        CustomUserRole::firstOrCreate(
            ['role_name' => 'user']
        );
        CustomUserRole::firstOrCreate(
            ['role_name' => 'guide']
        );
    }
}
