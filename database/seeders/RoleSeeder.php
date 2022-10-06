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
        $role = UserRole::firstOrCreate(
            ['role_name' => 'admin']
        );
        $role = UserRole::firstOrCreate(
            ['role_name' => 'user']
        );
    }
}
