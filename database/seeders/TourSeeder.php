<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Dictionary;
use App\Models\Review;
use App\Models\Schedule;
use App\Models\Tour;
use App\Models\TourObject;
use App\Models\Transaction;
use App\Models\User;
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

        $users = User::query()
            ->take(10)
            ->skip(0)
            ->get();


        foreach ($users as $user) {
            Tour::factory()->count(15)->create([
                'creator_id'=>$user->id,
            ]);

        }


        $tours = Tour::query()
            ->take(10)
            ->skip(0)
            ->get();

        foreach ($tours as $tour) {

            $schedule = null;
            for ($i = 0; $i < random_int(3, 15); $i++) {
                $schedule = Schedule::factory()->create([
                    'tour_id' => $tour->id,
                    'guide_id' => 1
                ]);
            }
            for ($i = 0; $i < random_int(3, 15); $i++) {
                Review::factory()->create([
                    'tour_id' => $tour->id,
                    'user_id' => 1
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

            foreach ($users as $user) {
                $payedAt = Carbon::now();
                $booking = Booking::factory()->create([
                    'tour_id' => $tour->id,
                    'user_id' => $user->id,
                    'selected_prices' => $tour->prices,

                    'start_at' => $schedule->start_at,
                    'payed_at' => $payedAt
                ]);


                Transaction::factory()->create([
                    'user_id' => $user->id,
                    'tour_id' => $tour->id,
                    'booking_id' => $booking->id,
                ]);
            }

        }


    }
}
