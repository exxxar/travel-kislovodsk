<?php

namespace Database\Factories;

use App\Models\Dictionary;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status_types = Dictionary::getTransactionTypes()->get();

        $status_id = $status_types[random_int(0,count($status_types)-1)]->id;
        return [
            'status_type_id'=>$status_id,
            'amount'=>random_int(1000, 20000),
            'description'=>fake()->text()
        ];
    }
}
