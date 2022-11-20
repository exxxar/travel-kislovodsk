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


        $dt = DictionaryType::query()->get();

        foreach ($dt as $type) {
            switch ($type->slug) {

                default:
                case "other_type":

                    break;
                case "law_status_type":
                    Dictionary::firstOrCreate(['title' => 'Физическое лицо', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Юридическое лицо', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Самозанятый', 'dictionary_type_id' => $type->id]);
                    break;

                case "service_type":
                    Dictionary::firstOrCreate(['title' => 'Страховка', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Трансфер', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Отель', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Такси', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Билеты', 'dictionary_type_id' => $type->id]);

                    break;

                case "movement_type":
                    Dictionary::firstOrCreate(['title' => 'Пешая', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Автобусная', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Комбинированная', 'dictionary_type_id' => $type->id]);

                    break;

                case "duration_type":
                    Dictionary::firstOrCreate(['title' => 'Один-два часа', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Несколько часов', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Несколько дней', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'День', 'dictionary_type_id' => $type->id]);
                    break;

                case "sort_type":
                    Dictionary::firstOrCreate(['title' => 'популярности', 'slug' => 'popularity_sort_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'кол-ву отзывов', 'slug' => 'reviews_count_sort_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'цене', 'slug' => 'price_sort_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'ближайшей дате', 'slug' => 'nearest_date_sort_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'скидке', 'slug' => 'discount_sort_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'длительности', 'slug' => 'duration_sort_type', 'dictionary_type_id' => $type->id]);
                    break;


                case "payment_type":
                    Dictionary::firstOrCreate(['title' => 'предоплата на сайте', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'полная оплата онлайн', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'без предоплаты', 'dictionary_type_id' => $type->id]);
                    break;


                case "ticket_type":
                    Dictionary::firstOrCreate(['title' => 'Обычный билет', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Детский билет', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Семейный билет', 'dictionary_type_id' => $type->id]);

                    break;


                case "tour_type":
                    Dictionary::firstOrCreate(['title' => 'Группа', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Индивидуальная', 'dictionary_type_id' => $type->id]);

                    break;

                case "tour_category_type":
                    Dictionary::firstOrCreate(['title' => 'Активные', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Альпинизм', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Гастрономические', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Детские', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Животные', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Исторические', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Мистические', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Обзорные', 'dictionary_type_id' => $type->id]);

                    break;

                case "message_status_type":
                    Dictionary::firstOrCreate(['title' => 'Не доставлено','slug' => 'message_status_not_delivered_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Доставлено', 'slug' => 'message_status_delivered_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Прочитано', 'slug' => 'message_status_read_type','dictionary_type_id' => $type->id]);

                    break;

                case "message_type":
                    Dictionary::firstOrCreate(['title' => 'Сообщение', 'slug' => 'message_text_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Оповещение', 'slug' => 'message_notification_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Транзакция', 'slug' => 'message_transaction_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Файл', 'slug' => 'message_file_type', 'dictionary_type_id' => $type->id]);
                    break;

                case "transaction_type":
                    Dictionary::firstOrCreate(['title' => 'В ожидании', 'slug' => 'transaction_in_progress_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Отклоненные', 'slug' => 'transaction_discard_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Оплаченные', 'slug' => 'transaction_payed_type','dictionary_type_id' => $type->id]);

                    break;

            }
        }


    }
}
