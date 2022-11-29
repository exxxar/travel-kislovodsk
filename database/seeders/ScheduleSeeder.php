<?php

namespace Database\Seeders;

use App\Models\Schedule;
use App\Models\Tour;
use App\Models\TourObject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::query()->take(10)->skip(0)->get();
        $tours = Tour::query()->take(10)->skip(0)->get();

        foreach ($users as $user) {
            foreach ($tours as $tour)
            {
                $schedule = Schedule::factory()->create([
                    'tour_id' => $tour->id,
                    'guide_id' => $user->id
                ]);
            }

        }


    }
}
