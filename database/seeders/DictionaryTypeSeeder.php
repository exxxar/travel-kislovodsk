<?php

namespace Database\Seeders;

use App\Models\Dictionary;
use App\Models\DictionaryType;
use App\Models\CustomUserRole;
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


        DictionaryType::firstOrCreate(['title' => "Статус транзакций", "slug" => "transaction_type"]);
        DictionaryType::firstOrCreate(['title' => "Юридический статус", "slug" => "law_status_type"]);
        DictionaryType::firstOrCreate(['title' => "Тип контента в сообщении", "slug" => "message_content_type"]);
        DictionaryType::firstOrCreate(['title' => "Тип сообщения", "slug" => "message_type"]);
        DictionaryType::firstOrCreate(['title' => "Статус сообщения", "slug" => "message_status_type"]);
        DictionaryType::firstOrCreate(['title' => "Категория тура", "slug" => "tour_category_type"]);
        DictionaryType::firstOrCreate(['title' => "Тип тура", "slug" => "tour_type"]);
        DictionaryType::firstOrCreate(['title' => "Тип билета", "slug" => "ticket_type"]);
        DictionaryType::firstOrCreate(['title' => "Тип оплаты", "slug" => "payment_type"]);
        DictionaryType::firstOrCreate(['title' => "Длительность", "slug" => "duration_type"]);
        DictionaryType::firstOrCreate(['title' => "Передвижение", "slug" => "movement_type"]);
        DictionaryType::firstOrCreate(['title' => "Виды сервиса", "slug" => "service_type"]);
        DictionaryType::firstOrCreate(['title' => "Тип сортировки", "slug" => "sort_type"]);
        DictionaryType::firstOrCreate(['title' => "Другое", "slug" => "other_type"]);

    }
}
