<?php

namespace Database\Seeders;

use App\Models\UserRole;
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


        UserRole::firstOrCreate(
            ['role_name' => 'admin']
        );
        UserRole::firstOrCreate(
            ['role_name' => 'user']
        );
        UserRole::firstOrCreate(
            ['role_name' => 'guide']
        );
    }
}
