<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $images = [];
        for ($i = 0; $i < random_int(1, 8); $i++)
            array_push($images, "/img/tours/"
                . (random_int(1, 8)) . "/img/"
                . (random_int(1, 8)) . ".jpg");

        return [
            'comment'=>fake()->realText(),
            'images'=>$images,
            'rating'=>random_int(1,5),
        ];
    }


}
