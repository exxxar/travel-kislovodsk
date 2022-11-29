<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dictionary;
use App\Models\DictionaryType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            DataTypesTableSeeder::class,
            DataRowsTableSeeder::class,
            MenusTableSeeder::class,
            MenuItemsTableSeeder::class,
            RolesTableSeeder::class,
            RoleSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            SettingsTableSeeder::class,
            DictionaryTypeSeeder::class,
            DictionarySeeder::class,
            UserSeeder::class,
            TourObjectSeeder::class,
            TourSeeder::class,
            ScheduleSeeder::class,
            MessageSeeder::class
        ]);

    }
}
