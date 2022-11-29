<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\TourObject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TourObjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::query()
            ->take(10)
            ->skip(0)
            ->get();

        foreach ($users as $user) {
            TourObject::factory()->count(15)->create([
                'creator_id' => $user->id,
            ]);
        }


    }
}
