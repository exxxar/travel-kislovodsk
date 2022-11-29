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
            RoleSeeder::class,
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
