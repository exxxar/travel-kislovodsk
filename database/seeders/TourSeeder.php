<?php

namespace Database\Seeders;

use App\Models\Dictionary;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\Tour;
use App\Models\TourObject;
use Carbon\Carbon;
use Database\Factories\TourFactory;
use Database\Factories\TourObjectFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tmpCategories = [];
        $tours = Tour::factory()->count(15)->create();



        foreach ($tours as $tour) {
            for ($i = 0; $i < random_int(3, 15); $i++) {
                Schedule::factory()->create([
                   'tour_id'=>$tour->id,
                   'guide_id'=>1
               ]);
            }
            for ($i = 0; $i < random_int(3, 15); $i++) {
                Review::factory()->create([
                    'tour_id'=>$tour->id,
                    'user_id'=>1
                ]);
            }

            for ($i = 0; $i < random_int(3, 10); $i++) {
                $obj = TourObject::factory()->create();

                $tour->tourObjects()->attach($obj->id);
            }

            $categories = Dictionary::getTourCategoryTypes()->get()->pluck("id")->toArray();

            for ($i = 0; $i < 4; $i++) {
                $cat = $categories[random_int(0, count($categories) - 1)];
                $tour->tourCategories()->attach($cat);
            }

        }


    }
}
