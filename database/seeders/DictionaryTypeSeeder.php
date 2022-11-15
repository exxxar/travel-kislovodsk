<?php

namespace Database\Seeders;

use App\Models\Dictionary;
use App\Models\DictionaryType;
use App\Models\UserRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DictionaryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dict_types = [
            "Статус транзакций",
            "Юридический статус",
            "Тип контента в сообщении",
            "Тип сообщения",
            "Статус сообщения",
            "Категория тура",
            "Тип тура",
            "Тип билета",
            "Тип оплаты",
            "Длительность",
            "Передвижение",
            "Виды сервиса",
        ];

        foreach ($dict_types as $dict)
            DictionaryType::firstOrCreate(
                ['title' => $dict]
            );


    }
}
