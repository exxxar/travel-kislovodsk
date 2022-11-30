<?php

namespace Database\Seeders;

use App\Models\Dictionary;
use App\Models\Tour;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RusToursSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $durationTypes = Dictionary::getDurationTypes()->get()->pluck("id")->toArray();
        $movementTypes = Dictionary::getMovementTypes()->get()->pluck("id")->toArray();
        $tourTypes = Dictionary::getTourTypes()->get()->pluck("id")->toArray();
        $paymentTypes = Dictionary::getPaymentTypes()->get()->pluck("id")->toArray();

        Tour::firstOrCreate([
            'title' => 'Путешествие в Северное Приэльбрусье: ущелье Джилы-Су и водопады',
            'short_description' => 'Дорога в Джилы-Су — одна из самых красивых в России, и мы приглашаем вас
                    провести день в этих невероятных местах! Нас ждёт путь через ущелья и перевалы, остановки в Долине
                    нарзанов, у водопадов и Зубов дракона. Вы попробуете нарзан из источника, а также горячие хычины и
                    другие блюда местной кухни, и всё это — в местах с захватывающими дух видами.',
            'base_price' => 4000,
            'discount_price' => 3000,
            'description' => 'Панорамы Эльбруса и нарзан из источника
                    Мы с вами выезжаем ранним утром, чтобы оказаться на плато Шаджатмаз в лучшее для обзора время. В ясную погоду отсюда открывается незабываемый вид на Эльбрус и Кавказский хребет.
                    Отсюда по серпантину отправимся в Долину нарзанов с источниками, бьющими прямо из-под земли. Вы попробуете целебную воду, насыщенную минералами, и с новыми силами мы поедем дальше.
                    Ещё одна смотровая площадка с видом на Эльбрус — при спуске в ущелье Харбаз. От вида на крутые спуски по серпантину и горные вершины у вас захватит дух!
                    Места силы в окрестностях Джилы-Су
                    На территории Джилы-Су у вас будет время проникнуться духом величественной природы и зарядиться её энергией. Мы с вами осмотрим водопады Каракая, Султан-Су и Кызыл-Су.',
            'preview_image' => '/img/tours/1/img/1.jpg',
            'images' => [
                '/img/tours/1/img/1.jpg',
                '/img/tours/1/img/2.jpg',
                '/img/tours/1/img/3.jpg',
                '/img/tours/1/img/4.jpg',
                '/img/tours/1/img/5.jpg',
                '/img/tours/1/img/6.jpg',
                '/img/tours/1/img/7.jpg'
            ],
            'comfort_loading' => true,
            'start_address' => fake("ru_RU")->address(),
            'start_city' => fake("ru_RU")->city(),
            'duration' => '3 ч.',
            'is_hot' => fake()->boolean,
            'is_active' => true,
            'is_draft' => fake()->boolean,
            'start_latitude' => fake()->latitude(0,0),
            'start_longitude' => fake()->longitude(0,0),
            'start_comment' => fake("ru_RU")->text(255),
            'min_group_size' => 1,
            'max_group_size' => 7,
            'payment_infos' => [
                "Онлайн картой (МИР, Visa, MasterCard).",
                "Онлайн электронными деньгами (ЮMoney).",
                "Оффлайн в офисе по адресу: Ставрополь, ул. Ленина, д.100, оф. 84.",
            ],
            'include_services' => [
                'Трансфер до дома',
                'Транспорт (комфортный внедорожник или минивэн)',
                'Услуги профессионального водителя-гида на всём маршруте'
            ],
            'exclude_services' => [
                'Питание в кафе (от 300 руб./чел.), рекомендуем взять с собой небольшой перекус и воду',
                'Экологический сбор в заповедник (100 руб./чел., оплачивается на въезде в Джылы-Су)',
                'Экологический сбор (100 руб./чел., оплачивается на въезде в Долину нарзанов',
                'Сувениры'
            ],
            'prices' => [
                [
                    "slug" => "standard",
                    "title" => "Стандарт",
                    "price" => 3000
                ],
                [
                    "slug" => "children",
                    "title" => "Детский",
                    "price" => 3000
                ],
                [
                    "slug" => "family",
                    "title" => "Семейный",
                    "price" => 3000
                ]

            ],
            'duration_type_id' => $durationTypes[random_int(0, count($durationTypes) - 1)],
            'movement_type_id' => $movementTypes[random_int(0, count($movementTypes) - 1)],
            'tour_type_id' => $tourTypes[random_int(0, count($tourTypes) - 1)],
            'payment_type_id' => $paymentTypes[random_int(0, count($paymentTypes) - 1)],
            'creator_id' => 1,
            'verified_at' => Carbon::now()
        ]);

        Tour::firstOrCreate([
            'title' => 'Домбай — природа и легенды Карачаево-Черкессии',
            'short_description' => 'Насладитесь красотой природы Домбая. На экскурсии вы поднимитесь на канатной дороге до склона горы Мусса-Ачитара, попробуете воду из кристально-чистой реки Улу-Муруджу и, конечно же, узнаете историю этих мест, услышите много нового о быте и традициях местных жителей. А также сделаете невероятные фотографии пейзажей Кавказа.',
            'base_price' => 1700,
            'discount_price' => 1700,
            'description' => 'На Северном Кавказе есть удивительное место, в котором каждый сможет как следует отдохнуть, подышать свежим воздухом и полюбоваться местными горными красотами.
                Горнолыжный курорт и музей природы
                Здесь каждый найдет занятие для души. Если вы любите кататься на лыжах, то Домбай идеально для этого подходит — ведь это довольно известный горнолыжный курорт. Но если вам больше нравится посещать живописные места и любоваться природой, то обязательно отправляйтесь на нашу экскурсию.
                Домбай — это открытый музей природы, здесь вы сможете познакомиться с уникальной флорой и фауной. Мы покажем вам древнейшие храмы и озеро Кара-Кель. Также у вас будет возможность попробовать вкуснейшую кристально-чистую воду из реки Улу-Муруджу и, конечно же, вместе мы обязательно поднимемся по канатной дороге на склон горы Мусса-Ачитара, высотой 3200 метров. 
                Во время экскурсии гид расскажет вам легенды Карачаево-Черкесии, поведает о том, какие традиции соблюдаются в этих краях, о быте и культуре народов Кавказа.
                Насладитесь великолепной круговой панорамой со множеством вершин и ледников, вдохните ароматы хвои и цветущих альпийских лугов и зарядитесь бодростью и энергией на новые свершения.',
            'preview_image' => '/img/tours/2/img/1.jpg',
            'images' => [
                '/img/tours/2/img/1.jpg',
                '/img/tours/2/img/2.jpg',
                '/img/tours/2/img/3.jpg',
                '/img/tours/2/img/4.jpg',
                '/img/tours/2/img/5.jpg',
                '/img/tours/2/img/6.jpg',
                '/img/tours/2/img/7.jpg',
                '/img/tours/2/img/8.jpg',
                '/img/tours/2/img/9.jpg',
                '/img/tours/2/img/10.jpg',
                '/img/tours/2/img/11.jpg',
                '/img/tours/2/img/12.jpg',
                '/img/tours/2/img/13.jpg',
                '/img/tours/2/img/14.jpg'
            ],
            'comfort_loading' => true,
            'start_address' => fake("ru_RU")->address(),
            'start_city' => 'Пятигорск',
            'duration' => '12 ч.',
            'is_hot' => fake()->boolean,
            'is_active' => true,
            'is_draft' => fake()->boolean,
            'start_latitude' => fake()->latitude(0,0),
            'start_longitude' => fake()->longitude(0,0),
            'start_comment' => fake("ru_RU")->text(255),
            'min_group_size' => 1,
            'max_group_size' => 30,
            'payment_infos' => [
                "Онлайн картой (МИР, Visa, MasterCard).",
                "Онлайн электронными деньгами (ЮMoney).",
                "Оффлайн в офисе по адресу: Ставрополь, ул. Ленина, д.100, оф. 84.",
            ],
            'include_services' => [
                'Услуги гида',
                'Транспорт'
            ],
            'exclude_services' => [
                'Канатная дорога (1600 руб)',
                'Питание (обычно делается 2 остановки для возможности пообедать)',
                'Личные расходы (сувениры и др.)'
            ],
            'prices' => [
                [
                    "slug" => "standard",
                    "title" => "Стандарт",
                    "price" => 1700
                ],
                [
                    "slug" => "children",
                    "title" => "Детский",
                    "price" => 1700
                ],
                [
                    "slug" => "family",
                    "title" => "Семейный",
                    "price" => 1700
                ]

            ],
            'duration_type_id' => $durationTypes[random_int(0, count($durationTypes) - 1)],
            'movement_type_id' => $movementTypes[random_int(0, count($movementTypes) - 1)],
            'tour_type_id' => $tourTypes[random_int(0, count($tourTypes) - 1)],
            'payment_type_id' => $paymentTypes[random_int(0, count($paymentTypes) - 1)],
            'creator_id' => 1,
            'verified_at' => Carbon::now()
        ]);

        Tour::firstOrCreate([
            'title' => 'Экскурсия в Приэльбрусье',
            'short_description' => 'Отправляйтесь к самой высокой точке Европы — горе Эльбрус. Вас ожидает удивительная поездка вдоль Баксанского ущелья до селению Азау, откуда начнётся наш подъём на Эльбрус. Подниматься будем на канатной дороге до станции Мир (3500 м) и до лагеря акклиматизации альпинистов (3900 м). А потом отправимся на гору Чегет, на высоту 4200 м над уровнем моря. Вы увидите невероятные пейзажи Кавказа, подышите горным воздухом, а наш опытный гид расскажет историю этих мест.',
            'base_price' => 1600,
            'discount_price' => 1600,
            'description' => 'Вы отправитесь в горный край Приэльбрусье. Отсюда открывается великолепный вид на заснеженный горб Эльбруса, который завораживает и манит своей недоступностью. Здесь чистый воздух, яркое солнце, а вокруг простираются живописные леса с прозрачными реками и озёрами.',
            'preview_image' => '/img/tours/3/img/1.jpg',
            'images' => [
                '/img/tours/3/img/1.jpg',
                '/img/tours/3/img/2.jpg',
                '/img/tours/3/img/3.jpg',
                '/img/tours/3/img/4.jpg',
                '/img/tours/3/img/5.jpg',
                '/img/tours/3/img/6.jpg',
                '/img/tours/3/img/7.jpg',
                '/img/tours/3/img/8.jpg',
                '/img/tours/3/img/9.jpg',
                '/img/tours/3/img/10.jpg',
                '/img/tours/3/img/11.jpg',
                '/img/tours/3/img/12.jpg',
                '/img/tours/3/img/13.jpg'
            ],
            'comfort_loading' => true,
            'start_address' => fake("ru_RU")->address(),
            'start_city' => 'Пятигорск',
            'duration' => '12 ч.',
            'is_hot' => fake()->boolean,
            'is_active' => true,
            'is_draft' => fake()->boolean,
            'start_latitude' => fake()->latitude(0,0),
            'start_longitude' => fake()->longitude(0,0),
            'start_comment' => fake("ru_RU")->text(255),
            'min_group_size' => 1,
            'max_group_size' => 30,
            'payment_infos' => [
                "Онлайн картой (МИР, Visa, MasterCard).",
                "Онлайн электронными деньгами (ЮMoney).",
                "Оффлайн в офисе по адресу: Ставрополь, ул. Ленина, д.100, оф. 84.",
            ],
            'include_services' => [
                'Услуги гида',
                'Транспорт'
            ],
            'exclude_services' => [
                'Личные расходы',
                'Канатные дороги: Чегет — 900 руб.; Эльбрус — 1400 руб.; залог — 100 руб. за один подъем туда и обратно, эко сбор 200 руб.',
                'Питание в кафе, по месту за дополнительную плату или можно взять с собой'
            ],
            'prices' => [
                [
                    "slug" => "standard",
                    "title" => "Стандарт",
                    "price" => 1600
                ],
                [
                    "slug" => "children",
                    "title" => "Детский",
                    "price" => 1600
                ],
                [
                    "slug" => "family",
                    "title" => "Семейный",
                    "price" => 1600
                ]

            ],
            'duration_type_id' => $durationTypes[random_int(0, count($durationTypes) - 1)],
            'movement_type_id' => $movementTypes[random_int(0, count($movementTypes) - 1)],
            'tour_type_id' => $tourTypes[random_int(0, count($tourTypes) - 1)],
            'payment_type_id' => $paymentTypes[random_int(0, count($paymentTypes) - 1)],
            'creator_id' => 1,
            'verified_at' => Carbon::now()
        ]);

        Tour::firstOrCreate([
            'title' => 'Путешествие к Эльбрусу и озеру Гижгит в мини-группе из Пятигорска',
            'short_description' => 'В Приэльбрусье мы отправимся через невероятно живописные места: Кавказские горы, Баксанское ущелье, селение Азау и горнолыжный курорт «Приэльбрусье». По пути гид расскажет вам местные легенды, а также историю о том, как был покорён Эльбрус. Мы также заедем на озеро Гижгит с бирюзовой водой. Летом холмы вокруг него пестрят разноцветными цветами, что делает этот пейзаж поистине сказочным!',
            'base_price' => 3500,
            'discount_price' => 3500,
            'description' => 'В Приэльбрусье мы отправимся через невероятно живописные места: Кавказские горы, Баксанское ущелье, селение Азау и горнолыжный курорт «Приэльбрусье». По пути гид расскажет вам местные легенды, а также историю о том, как был покорён Эльбрус.
                    Мы также заедем на озеро Гижгит с бирюзовой водой. Летом холмы вокруг него пестрят разноцветными цветами, что делает этот пейзаж поистине сказочным!',
            'preview_image' => '/img/tours/4/img/1.jpg',
            'images' => [
                '/img/tours/4/img/1.jpg',
                '/img/tours/4/img/2.jpg',
                '/img/tours/4/img/3.jpg',
                '/img/tours/4/img/4.jpg',
                '/img/tours/4/img/5.jpg',
                '/img/tours/4/img/6.jpg',
                '/img/tours/4/img/7.jpg'
            ],
            'comfort_loading' => true,
            'start_address' => fake("ru_RU")->address(),
            'start_city' => 'Пятигорск',
            'duration' => '12 ч.',
            'is_hot' => fake()->boolean,
            'is_active' => true,
            'is_draft' => fake()->boolean,
            'start_latitude' => fake()->latitude(0,0),
            'start_longitude' => fake()->longitude(0,0),
            'start_comment' => fake("ru_RU")->text(255),
            'min_group_size' => 1,
            'max_group_size' => 7,
            'payment_infos' => [
                "Онлайн картой (МИР, Visa, MasterCard).",
                "Онлайн электронными деньгами (ЮMoney).",
                "Оффлайн в офисе по адресу: Ставрополь, ул. Ленина, д.100, оф. 84.",
            ],
            'include_services' => [
                'Услуги гида',
                'Транспортное сопровождение'
            ],
            'exclude_services' => [
                'Питание средний чек 500-700 рублей',
                'Входные билеты',
                'Канатная дорога 1000-1600 рублей'
            ],
            'prices' => [
                [
                    "slug" => "standard",
                    "title" => "Стандарт",
                    "price" => 3500
                ],
                [
                    "slug" => "children",
                    "title" => "Детский",
                    "price" => 3500
                ],
                [
                    "slug" => "family",
                    "title" => "Семейный",
                    "price" => 3500
                ]

            ],
            'duration_type_id' => $durationTypes[random_int(0, count($durationTypes) - 1)],
            'movement_type_id' => $movementTypes[random_int(0, count($movementTypes) - 1)],
            'tour_type_id' => $tourTypes[random_int(0, count($tourTypes) - 1)],
            'payment_type_id' => $paymentTypes[random_int(0, count($paymentTypes) - 1)],
            'creator_id' => 1,
            'verified_at' => Carbon::now()
        ]);

        Tour::firstOrCreate([
            'title' => 'Плато Бермамыт на рассвете, днем или на закате',
            'short_description' => 'А давайте встретим рассвет или закат на вершине плато Бермамыт? Плато Бермамыт — идеальное место для снимков и видов на Эльбрус. Именно здесь прочувствуем всю мощь Кавказских гор и отдохнем от городской жизни.',
            'base_price' => 5000,
            'discount_price' => 3000,
            'description' => 'С высоты 2592 метров открываются самые лучшие виды на Эльбрус. Он всего лишь в 30 километрах. Но кажется, что знаменитый пятитысячник находится совсем близко.
                    Мы посетим несколько смотровых площадок, чтобы прочувствовать всю мощь природы. Вы увидите горы Бештау и Машук, скалы Монахи и ущелья.
                    За дополнительную плату возможен дополнительный заезд в парк Долина нарзанов, на Медовые водопады или гору Шапка, увидеть шикарный вид на Эшкаконское водохранилище, Гришкина балка.',
            'preview_image' => '/img/tours/5/img/1.jpg',
            'images' => [
                '/img/tours/5/img/1.jpg',
                '/img/tours/5/img/2.jpg',
                '/img/tours/5/img/3.jpg',
                '/img/tours/5/img/4.jpg',
                '/img/tours/5/img/5.jpg',
                '/img/tours/5/img/6.jpg',
                '/img/tours/5/img/7.jpg',
                '/img/tours/5/img/8.jpg'
            ],
            'comfort_loading' => true,
            'start_address' => fake("ru_RU")->address(),
            'start_city' => fake("ru_RU")->city(),
            'duration' => '7 ч.',
            'is_hot' => fake()->boolean,
            'is_active' => true,
            'is_draft' => fake()->boolean,
            'start_latitude' => fake()->latitude(0,0),
            'start_longitude' => fake()->longitude(0,0),
            'start_comment' => fake("ru_RU")->text(255),
            'min_group_size' => 1,
            'max_group_size' => 7,
            'payment_infos' => [
                "Онлайн картой (МИР, Visa, MasterCard).",
                "Онлайн электронными деньгами (ЮMoney).",
                "Оффлайн в офисе по адресу: Ставрополь, ул. Ленина, д.100, оф. 84.",
            ],
            'include_services' => [
                'Трансфер до дома',
                'Транспорт (комфортный внедорожник или минивэн)',
                'Услуги профессионального водителя-гида на всём маршруте'
            ],
            'exclude_services' => [
                'Питание в кафе с кавказской кухней (≈ 400р/чел). Можно взять небольшой перекус и воду с собой',
                'Заезд на Медовые водопады и в чайный домик (по согласованию с гидом и с группой, ≈ 500р/чел)',
                'Заезд на г. Шапка с видом на Эшкаконское водохранилище и на карстовые пещеры Гришкиной балки (по согласованию с гидом и с группой, ≈ 500р/чел)',
                'Входной билет на Медовые водопады (60р/чел - оплачивается на въезде на водопады)'
            ],
            'prices' => [
                [
                    "slug" => "standard",
                    "title" => "Стандарт",
                    "price" => 3000
                ],
                [
                    "slug" => "children",
                    "title" => "Детский",
                    "price" => 3000
                ],
                [
                    "slug" => "family",
                    "title" => "Семейный",
                    "price" => 3000
                ]

            ],
            'duration_type_id' => $durationTypes[random_int(0, count($durationTypes) - 1)],
            'movement_type_id' => $movementTypes[random_int(0, count($movementTypes) - 1)],
            'tour_type_id' => $tourTypes[random_int(0, count($tourTypes) - 1)],
            'payment_type_id' => $paymentTypes[random_int(0, count($paymentTypes) - 1)],
            'creator_id' => 1,
            'verified_at' => Carbon::now()
        ]);

        Tour::firstOrCreate([
            'title' => 'Чегемское ущелье, перевал Актопрак и озеро Гижгит в мини-группе',
            'short_description' => 'Как всем известно, все главные красоты Кавказа находятся за пределами города. На один день мы уедем из Пятигорска и отправимся в путешествие к Чегемским водопадам и озеру Гижгит. Эта экскурсия проводится в мини-группе до 8 человек — со мной нет спешки и огромных толп.',
            'base_price' => 6000,
            'discount_price' => 4000,
            'description' => 'Наше путешествие стартует в Пятигорске, за пару часов мы доберемся до Кабардино-Балкарии. Здесь и начнется наше исследование кавказских красот.
                Первой нашей остановкой станут Чегемские водопады. Здесь я расскажу вам местную легенду, как появились знаменитые водопады. Кстати, водопады на замерзают даже зимой, они покрываются лишь ледяным панцирем. 
                Далее мы отправимся в аул Эль-Тюбю. Здесь археологи находят артефакты, которым более 15 тысяч лет. А еще в ауле есть удивительная стена, на которой увековечены стихи поэта Кайсына Кулиева. 
                Наш маршрут к озеру Гижгит пройдет через перевал Актопрак. Это древнейший перевал, через который общались жители Чегемского и Баксанского ущелий. Всего ничего и мы уже на берегу озера Гижгит, которое поражает своим бирюзовым цветом.',
            'preview_image' => '/img/tours/6/img/1.jpg',
            'images' => [
                '/img/tours/6/img/1.jpg',
                '/img/tours/6/img/2.jpg',
                '/img/tours/6/img/3.jpg',
                '/img/tours/6/img/4.jpg',
                '/img/tours/6/img/5.jpg',
                '/img/tours/6/img/6.jpg',
                '/img/tours/6/img/7.jpg',
                '/img/tours/6/img/8.jpg',
                '/img/tours/6/img/9.jpg',
                '/img/tours/6/img/10.jpg',
                '/img/tours/6/img/11.jpg',
                '/img/tours/6/img/12.jpg',
                '/img/tours/6/img/13.jpg',
                '/img/tours/6/img/14.jpg',
                '/img/tours/6/img/15.jpg',
                '/img/tours/6/img/16.jpg',
                '/img/tours/6/img/17.jpg',
                '/img/tours/6/img/18.jpg',
                '/img/tours/6/img/19.jpg'
            ],
            'comfort_loading' => true,
            'start_address' => fake("ru_RU")->address(),
            'start_city' => fake("ru_RU")->city(),
            'duration' => '11 ч.',
            'is_hot' => fake()->boolean,
            'is_active' => true,
            'is_draft' => fake()->boolean,
            'start_latitude' => fake()->latitude(0,0),
            'start_longitude' => fake()->longitude(0,0),
            'start_comment' => fake("ru_RU")->text(255),
            'min_group_size' => 1,
            'max_group_size' => 8,
            'payment_infos' => [
                "Онлайн картой (МИР, Visa, MasterCard).",
                "Онлайн электронными деньгами (ЮMoney).",
                "Оффлайн в офисе по адресу: Ставрополь, ул. Ленина, д.100, оф. 84.",
            ],
            'include_services' => [
                'Тур в мини-группе до 6-8 человек',
                'Все перемещения по маршруту на комфортном минивэне/внедорожнике',
                'Сопровождение профессионального гида-водителя на всём маршруте'
            ],
            'exclude_services' => [
                'Питание в кафе с кавказской кухней (≈ 300р/чел). Также рекомендуем взять небольшой перекус и воду с собой.'
            ],
            'prices' => [
                [
                    "slug" => "standard",
                    "title" => "Стандарт",
                    "price" => 4000
                ],
                [
                    "slug" => "children",
                    "title" => "Детский",
                    "price" => 3000
                ],
                [
                    "slug" => "family",
                    "title" => "Семейный",
                    "price" => 5000
                ]

            ],
            'duration_type_id' => $durationTypes[random_int(0, count($durationTypes) - 1)],
            'movement_type_id' => $movementTypes[random_int(0, count($movementTypes) - 1)],
            'tour_type_id' => $tourTypes[random_int(0, count($tourTypes) - 1)],
            'payment_type_id' => $paymentTypes[random_int(0, count($paymentTypes) - 1)],
            'creator_id' => 1,
            'verified_at' => Carbon::now()
        ]);

        Tour::firstOrCreate([
            'title' => 'Безенгийский Язык Тролля + Верхняя Балкария + замок Шато-Эркен',
            'short_description' => 'Немногие знают, что в Верхней Балкарии есть скалистый выступ, напоминающий норвежский Язык Тролля. Мы с вами поднимемся к нему, а по пути нас ждут остановки у карстовых озёр и старинных башен, на смотровых площадках с видом на глубокие ущелья, древние легенды и тайны, сокрытые среди гор.',
            'base_price' => 4000,
            'discount_price' => 4000,
            'description' => 'Балкарский Язык Тролля и изумрудные озера
                Нас с вами ждёт невероятно зрелищный маршрут с посещением самых живописных мест Верхней Балкарии. Начнём с Языка Тролля в ущелье Безенги, откуда перед нами раскинутся головокружительные панорамы вершин-пятитысячников и Безенгийской стены.
                Затем отправимся в Верхнюю Балкарию, к Голубому озеру, известному как Церик-Кёль. Вы увидите карстовое озеро в окружении альпийских лугов и полюбуетесь его прозрачной водой, меняющей цвет в зависимости от времени года и погоды. Я расскажу вам о тайнах балкарских озёр, глубина одного из которых достигает 300 метров.
                Скалистое ущелье и древние башни
                После этого нас ждёт путь по Черекской теснине — дороге с нависающими над ней скалами. Вы услышите печальные истории тех, кто следовал по узким дорогам вдоль реки Черек до того, как в скалах прорубили тоннели.
                Отсюда поедем дальше в аул Кюнлюм и осмотрим сторожевую родовую башню Абай-кала XVII-XVIII века.
                Термальные источники или рыцарский замок на выбор участников тура
                После такой насыщенной программы вам наверняка захочется отдохнуть, поэтому мы поедем на термальные источники в Аушигер. Вы искупаетесь в бассейнах с водой, температура которой составляет от +40 до +50°C.
                Или мы заедем в необыкновенное место. Замок Шато-Эркен был построен совсем недавно, но по красоте он не уступает рыцарским средневековым цитаделям. Особенное очарование ему придаёт то, что расположен он посреди озера, окружённого лесом, а в ясную погоду отсюда хорошо виден Эльбрус.',
            'preview_image' => '/img/tours/7/img/1.jpg',
            'images' => [
                '/img/tours/7/img/1.jpg',
                '/img/tours/7/img/2.jpg',
                '/img/tours/7/img/3.jpg',
                '/img/tours/7/img/4.jpg',
                '/img/tours/7/img/5.jpg',
                '/img/tours/7/img/6.jpg',
                '/img/tours/7/img/7.jpg',
                '/img/tours/7/img/8.jpg',
                '/img/tours/7/img/9.jpg'
            ],
            'comfort_loading' => true,
            'start_address' => fake("ru_RU")->address(),
            'start_city' => fake("ru_RU")->city(),
            'duration' => '12 ч.',
            'is_hot' => fake()->boolean,
            'is_active' => true,
            'is_draft' => fake()->boolean,
            'start_latitude' => fake()->latitude(0,0),
            'start_longitude' => fake()->longitude(0,0),
            'start_comment' => fake("ru_RU")->text(255),
            'min_group_size' => 1,
            'max_group_size' => 6,
            'payment_infos' => [
                "Онлайн картой (МИР, Visa, MasterCard).",
                "Онлайн электронными деньгами (ЮMoney).",
                "Оффлайн в офисе по адресу: Ставрополь, ул. Ленина, д.100, оф. 84.",
            ],
            'include_services' => [
                'Трансфер до дома',
                'Проезд в мини группе в комфортных внедорожниках',
                'Сопровождение профессионального гида-водителя на всём маршруте'
            ],
            'exclude_services' => [
                'Питание в кафе (ок 500 на чел)',
                'Рекомендуем взять с собой воду',
                'Вход на территорию замка Шато-Эркен 50 руб',
                'Вход в термальные источники 200 р',
                'Сувениры'
            ],
            'prices' => [
                [
                    "slug" => "standard",
                    "title" => "Стандарт",
                    "price" => 4000
                ],
                [
                    "slug" => "children",
                    "title" => "Детский",
                    "price" => 4000
                ],
                [
                    "slug" => "family",
                    "title" => "Семейный",
                    "price" => 4000
                ]

            ],
            'duration_type_id' => $durationTypes[random_int(0, count($durationTypes) - 1)],
            'movement_type_id' => $movementTypes[random_int(0, count($movementTypes) - 1)],
            'tour_type_id' => $tourTypes[random_int(0, count($tourTypes) - 1)],
            'payment_type_id' => $paymentTypes[random_int(0, count($paymentTypes) - 1)],
            'creator_id' => 1,
            'verified_at' => Carbon::now()
        ]);

        Tour::firstOrCreate([
            'title' => 'Северная Осетия: Кармадон, Даргавс, Монастырь, Лавочка счастья',
            'short_description' => 'Бурные водопады и древние крепости среди альпийских лугов и горных вершин — всё это ждёт вас во время нашего джип-тура! Мы проедем через ущелья с отвесными скалами и поднимемся на перевалы с завораживающими видами, а ещё у вас будет возможность покататься на качелях на краю света и сфотографироваться у удивительных арт-объектов среди облаков.',
            'base_price' => 4500,
            'discount_price' => 4500,
            'description' => 'Ворота в Закавказье и «Лавочка любви»
                Начало нашего пути пройдёт через Алагирское ущелье, где вы увидите фигуру исполина Уастырджи, словно вылетающего на коне из гигантской скалы. Я расскажу вам об святом покровителе осетинов и об этом необычном монументе, и мы поедем дальше, в Куратинское ущелье, по которому бежит река Фиагдон.
                Следующей остановкой будет Архонский перевал. На высоте 2600 метров над уровнем моря вы сможете сфотографироваться на знаменитой «Лавочке любви».
                Самый высокогорный монастырь и скальные крепости
                Затем мы поедем в Аланский Свято-успенский мужской монастырь — самую высокогорную обитель в России. Вы осмотрите сооружение среди гор с боевыми башнями и каменными стенами, а отсюда мы отправимся в Кадаргаванский каньон, также известный как теснина Песочные часы.
                Далее нас ждёт Дзивгисская наскальная крепость XIII века с оборонительными сооружениями либо село Цмити с историческими боевыми и жилыми башнями.
                После посещения башни Курта и Тага отправимся на Фиагдонские качели и к арт-объекту «Æ», посвящённому первой букве осетинского алфавита.
                Горные водопады и Город мёртвых
                Можно будет включить в программу посещение Мидаграбинских водопадов, входящих в список «Семь чудес Кавказа», а также заехать на живописную Гизельдонскую ГЭС и в Даргавс — некрополь с сотней фамильных склепов. Мы также сможем побывать в печально знаменитом Кармадонском ущелье. ',
            'preview_image' => '/img/tours/8/img/1.jpg',
            'images' => [
                '/img/tours/8/img/1.jpg',
                '/img/tours/8/img/2.jpg',
                '/img/tours/8/img/3.jpg',
                '/img/tours/8/img/4.jpg',
                '/img/tours/8/img/5.jpg',
                '/img/tours/8/img/6.jpg',
                '/img/tours/8/img/7.jpg',
                '/img/tours/8/img/7.jpg',
                '/img/tours/8/img/8.jpg'
            ],
            'comfort_loading' => true,
            'start_address' => fake("ru_RU")->address(),
            'start_city' => fake("ru_RU")->city(),
            'duration' => '15 ч.',
            'is_hot' => fake()->boolean,
            'is_active' => true,
            'is_draft' => fake()->boolean,
            'start_latitude' => fake()->latitude(0,0),
            'start_longitude' => fake()->longitude(0,0),
            'start_comment' => fake("ru_RU")->text(255),
            'min_group_size' => 1,
            'max_group_size' => 7,
            'payment_infos' => [
                "Онлайн картой (МИР, Visa, MasterCard).",
                "Онлайн электронными деньгами (ЮMoney).",
                "Оффлайн в офисе по адресу: Ставрополь, ул. Ленина, д.100, оф. 84.",
            ],
            'include_services' => [
                'Трансфер до дома',
                'Проезд в мини группе в комфортных внедорожниках',
                'Сопровождение профессионального гида-водителя на всём маршруте'
            ],
            'exclude_services' => [
                'Вход в Даргавс — 100 рублей',
                'Обед (в кафе) — около 500 рублей',
                'С собой иметь паспорт, теплую одежду'
            ],
            'prices' => [
                [
                    "slug" => "standard",
                    "title" => "Стандарт",
                    "price" => 4500
                ],
                [
                    "slug" => "children",
                    "title" => "Детский",
                    "price" => 4500
                ],
                [
                    "slug" => "family",
                    "title" => "Семейный",
                    "price" => 4500
                ]

            ],
            'duration_type_id' => $durationTypes[random_int(0, count($durationTypes) - 1)],
            'movement_type_id' => $movementTypes[random_int(0, count($movementTypes) - 1)],
            'tour_type_id' => $tourTypes[random_int(0, count($tourTypes) - 1)],
            'payment_type_id' => $paymentTypes[random_int(0, count($paymentTypes) - 1)],
            'creator_id' => 1,
            'verified_at' => Carbon::now()
        ]);
    }
}
