<?php

namespace Database\Factories;

use App\Models\Dictionary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $services = Dictionary::getServiceTypes()->get()->pluck("title");

        return [
            'additional_services' => $services,
            'fname' => fake()->firstName(),
            'sname' => fake()->title(),
            'tname' => fake()->lastName(),
            'phone' => "7".random_int(10000, 99999).random_int(10000, 99999),
            'email' => fake()->email(),
        ];
    }
}
