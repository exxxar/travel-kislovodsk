<?php

namespace Database\Seeders;

use App\Models\Dictionary;
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
        $tours = Tour::factory()->count(100)->create();

        foreach ($tours as $tour){
            for($i=0;$i<random_int(3,10);$i++) {
                $obj = TourObject::factory()->create();

                $tour->tourObjects()->attach($obj->id);
            }

            $categories = Dictionary::getTourCategoryTypes()->get()->pluck("id")->toArray();

            $cat = $categories[random_int(0, count($categories)-1)];
            $tour->tourCategories()->attach($cat);
        }


    }
}
