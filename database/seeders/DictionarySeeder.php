<?php

namespace Database\Seeders;

use App\Models\Dictionary;
use App\Models\DictionaryType;
use App\Models\CustomUserRole;
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
                    Dictionary::firstOrCreate(['title' => 'Пользователь', 'slug' => 'person_law_status_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Физическое лицо', 'slug' => 'individual_law_status_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Юридическое лицо', 'slug' => 'entity_law_status_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Самозанятый', 'slug' => 'self_employed_law_status_type', 'dictionary_type_id' => $type->id]);
                    break;

                case "service_type":
                    Dictionary::firstOrCreate(['title' => 'Страховка', 'slug' => 'insurance_service_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Трансфер', 'slug' => 'transfer_service_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Отель', 'slug' => 'hotel_service_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Такси', 'slug' => 'taxi_service_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Билеты', 'slug' => 'tickets_service_type', 'dictionary_type_id' => $type->id]);

                    break;

                case "movement_type":
                    Dictionary::firstOrCreate(['title' => 'Пешая', 'slug' => 'on_foot_movement_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Автобусная', 'slug' => 'bus_movement_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Комбинированная', 'slug' => 'combined_movement_type', 'dictionary_type_id' => $type->id]);

                    break;

                case "duration_type":
                    Dictionary::firstOrCreate(['title' => 'Один-два часа', 'slug' => 'one_two_hours_duration_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Несколько часов', 'slug' => 'couple_of_hours_duration_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Несколько дней', 'slug' => 'couple_of_days_duration_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'День', 'slug' => 'one_day_duration_type', 'dictionary_type_id' => $type->id]);
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
                    Dictionary::firstOrCreate(['title' => 'предоплата на сайте', 'slug' => 'site_pre_order_ticket_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'полная оплата онлайн', 'slug' => 'full_site_order_ticket_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'без предоплаты', 'slug' => 'no_pre_order_ticket_type', 'dictionary_type_id' => $type->id]);
                    break;


                case "ticket_type":
                    Dictionary::firstOrCreate(['title' => 'Обычный билет', 'slug' => 'standard_ticket_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Детский билет', 'slug' => 'children_ticket_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Семейный билет', 'slug' => 'family_ticket_type', 'dictionary_type_id' => $type->id]);

                    break;


                case "tour_type":
                    Dictionary::firstOrCreate(['title' => 'Группа', 'slug' => 'group_tour_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Индивидуальная', 'slug' => 'individual_tour_type', 'dictionary_type_id' => $type->id]);

                    break;

                case "tour_category_type":
                    Dictionary::firstOrCreate(['title' => 'Активные', 'slug' => 'active_tour_category_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Альпинизм', 'slug' => 'mountaineer_tour_category_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Гастрономические', 'slug' => 'food_tour_category_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Детские', 'slug' => 'children_tour_category_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Животные', 'slug' => 'animal_tour_category_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Исторические', 'slug' => 'historic_tour_category_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Мистические', 'slug' => 'mystic_tour_category_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Обзорные', 'slug' => 'survey_tour_category_type', 'dictionary_type_id' => $type->id]);

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
