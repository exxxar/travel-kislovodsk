<?php

namespace Database\Factories;

use App\Models\Dictionary;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $services = ["Трансфер до дома",
            "Транспорт (комфортный внедорожник или минивэн)",
            "Услуги профессионального водителя-гида на всём маршруте",
            "Питание",
            "Проживание в хостеле",
            "Медицинская страховка",
            "Специальное оборудование",
            "Специальная одежда",
            "Профессиональный фотограф",
            "Профессиональный видеограф",
            "Питание в кафе",
            "Экологический сбор в заповедник",
            "Экологический сбор",
            "Сувениры",
            "Мороженное детям"
        ];
        $include_services = [];

        $tmp_numbers = [];

        for ($i = 0; $i < 5; $i++) {
            $index = random_int(0, count($services) - 1);
            if (!in_array($index, $tmp_numbers)) {
                array_push($tmp_numbers, $index);
                array_push($include_services, $services[$index]);
            }

        }
        $exclude_services = array_diff($services, $include_services);

        $tmp = Dictionary::getDurationTypes()->get()->pluck("id")->toArray();
        $duration_type_id = $tmp[random_int(0, count($tmp) - 1)];

        $tmp = Dictionary::getMovementTypes()->get()->pluck("id")->toArray();
        $movement_type_id = $tmp[random_int(0, count($tmp) - 1)];

        $tmp = Dictionary::getTourTypes()->get()->pluck("id")->toArray();
        $tour_type_id = $tmp[random_int(0, count($tmp) - 1)];

        $tmp = Dictionary::getPaymentTypes()->get()->pluck("id")->toArray();
        $payment_type_id = $tmp[random_int(0, count($tmp) - 1)];

        $images = [];
        for ($i = 0; $i < random_int(1, 8); $i++)
            array_push($images, "/img/tours/"
                . (random_int(1, 8)) . "/img/"
                . (random_int(1, 8)) . ".jpg");
        return [
            'title' => fake("ru_RU")->text(50),
            'short_description' => fake("ru_RU")->text(255),
            'description' => fake("ru_RU")->text(255),
            'base_price' => random_int(500, 10000),
            'discount_price' => random_int(500, 10000),
            'start_address' => fake("ru_RU")->address(),
            'start_city' => fake("ru_RU")->city(),
            'comfort_loading' => true,
            'start_latitude' => fake()->latitude(-30,30),
            'start_longitude' => fake()->longitude(-30,30),
            'start_comment' => fake("ru_RU")->text(255),
            'preview_image' => "/img/tours/"
                . (random_int(1, 8)) . "/img/"
                . (random_int(1, 8)) . ".jpg",
            'is_hot' => fake()->boolean,
            'is_active' => fake()->boolean,
            'is_draft' => fake()->boolean,
            'duration' => (random_int(1, 9)) . " ч.",
            'min_group_size' => 1,
            'max_group_size' => (random_int(1, 30)),
            //'rating' => (random_int(1, 5)),
            'images' => $images,
            'payment_infos' => [
                "Онлайн картой (МИР, Visa, MasterCard).",
                "Онлайн электронными деньгами (ЮMoney).",
                "Оффлайн в офисе по адресу: Ставрополь, ул. Ленина, д.100, оф. 84.",
            ],
            'prices' => [
                (object)[
                    "slug" => "standard",
                    "title" => "Стандарт",
                    "price" => random_int(500, 10000)
                ],
                (object)[
                    "slug" => "children",
                    "title" => "Детский",
                    "price" => random_int(500, 10000)
                ],
                (object)[
                    "slug" => "family",
                    "title" => "Семейный",
                    "price" => random_int(500, 10000)
                ]

            ],
            'include_services' => $include_services,
            'exclude_services' => $exclude_services,
            'duration_type_id' => $duration_type_id,
            'movement_type_id' => $movement_type_id,
            'tour_type_id' => $tour_type_id,
            'payment_type_id' => $payment_type_id,
            'creator_id' => 1,
            'verified_at' => Carbon::now()
        ];
    }


}
