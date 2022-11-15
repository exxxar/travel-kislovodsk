<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Dictionary;
use App\Models\DictionaryType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $dictType = DictionaryType::query()->where("title","Юридический статус")->first();

        Dictionary::firstOrCreate(
            ['title' => 'Физическое лицо' , 'dictionary_type_id'=>$dictType->id]

        );

        Dictionary::firstOrCreate(
            ['title' => 'Юридическое лицо' , 'dictionary_type_id'=>$dictType->id]
        );

    }
}
