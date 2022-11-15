<?php

namespace Database\Seeders;

use App\Models\Dictionary;
use App\Models\DictionaryType;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
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
