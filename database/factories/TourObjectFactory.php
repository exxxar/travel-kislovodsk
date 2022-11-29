<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TourObjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $images = [];
        for ($i = 0; $i < random_int(0, 20); $i++)
            array_push($images, "/img/tours/"
                . (random_int(1, 8)) . "/img/"
                . (random_int(1, 8)) . ".jpg");

        return [
            'title' => fake("ru_RU")->text(50),
            'description' => fake("ru_RU")->text(1000),
            'city' => fake("ru_RU")->city(),
            'address' => fake("ru_RU")->address(),
            'latitude' => fake()->latitude(-30,30),
            'longitude' => fake()->longitude(-30,30),
            'comment' => fake("ru_RU")->text(255),
            'creator_id' => 1,
            'photos' => $images,

        ];
    }


}
