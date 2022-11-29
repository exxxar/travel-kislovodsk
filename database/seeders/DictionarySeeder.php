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
                    Dictionary::firstOrCreate(['title' => 'Трансфер', 'slug' => 'transfer_service_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Отель', 'slug' => 'hotel_service_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Такси', 'slug' => 'taxi_service_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Билеты', 'slug' => 'tickets_service_type','dictionary_type_id' => $type->id]);

                    break;

                case "movement_type":
                    Dictionary::firstOrCreate(['title' => 'Пешая', 'slug' => 'walking_movement_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Автобусная', 'slug' => 'bus_movement_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Комбинированная', 'slug' => 'combine_movement_type','dictionary_type_id' => $type->id]);

                    break;

                case "duration_type":
                    Dictionary::firstOrCreate(['title' => 'Один-два часа', 'slug' => 'set_1_movement_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Несколько часов', 'slug' => 'set_2_movement_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Несколько дней', 'slug' => 'set_3_movement_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'День', 'slug' => 'set_4_movement_type','dictionary_type_id' => $type->id]);
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
                    Dictionary::firstOrCreate(['title' => 'предоплата на сайте',  'slug' => 'prepayment_payment_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'полная оплата онлайн',  'slug' => 'full_online_payment_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'без предоплаты',  'slug' => 'without_prepayment_payment_type', 'dictionary_type_id' => $type->id]);
                    break;


                case "ticket_type":
                    Dictionary::firstOrCreate(['title' => 'Обычный билет',  'slug' => 'base_ticket_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Детский билет',  'slug' => 'child_ticket_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Семейный билет',  'slug' => 'family_ticket_type', 'dictionary_type_id' => $type->id]);

                    break;


                case "tour_type":
                    Dictionary::firstOrCreate(['title' => 'Группа', 'slug' => 'group_tour_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Индивидуальная', 'slug' => 'individual_tour_type','dictionary_type_id' => $type->id]);

                    break;

                case "tour_category_type":
                    Dictionary::firstOrCreate(['title' => 'Активные', 'slug' => 'active_tour_category_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Альпинизм', 'slug' => 'alpine_tour_category_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Гастрономические', 'slug' => 'gastronomic_tour_category_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Детские', 'slug' => 'child_tour_category_type', 'dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Животные', 'slug' => 'animals_tour_category_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Исторические', 'slug' => 'historical_tour_category_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Мистические', 'slug' => 'mystical_tour_category_type','dictionary_type_id' => $type->id]);
                    Dictionary::firstOrCreate(['title' => 'Обзорные', 'slug' => 'review_tour_category_type','dictionary_type_id' => $type->id]);

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
