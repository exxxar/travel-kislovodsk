<?php


namespace App\Classes\PogodaKlimat;


use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use KubAT\PhpSimple\HtmlDomParser;

class PogodaIKlimatAPI
{


    private function prepare($str)
    {
        return trim(strip_tags($str));
    }

    private function parser($dom, $day_index)
    {

        $time_sections = ["03:00", "09:00", "15:00", "21:00"];


        $table = $dom->find('.forecast-table table')[0];
        $day_part_index = 0;

        $month = [];
        $day = [];

        $needClose = false;

        $day_index = 0;
        $index = 0;
        foreach ($table->find('tr') as $tr) {

            $index++;

            if ($index === 1)
                continue;

            $elements = $tr->find('td');


            if ($day_part_index <= 3) {
                $wind = explode("<br>",$elements[5]->innertext);
                array_push($day, (object)[
                    "time" => $time_sections[$day_part_index],
                    "section" => [
                        "date" => $elements[0]->innertext,
                        "time" => $elements[1]->innertext,
                        "weather_type" => $elements[2]->find("img")[0]->getAttribute("title"),
                        "weather_type_img_url" => $elements[2]->find("img")[0]->getAttribute("src"),
                        "temperature" => $elements[3]->innertext,
                        "pressure" => $elements[4]->innertext,
                        "wind" => ($wind[0]??'').", ".($wind[1]??''),
                        "precipitation" => $elements[6]->innertext,
                        "effective_temperature" => $elements[7]->innertext,
                        "effective_temperature_on_sun" => $elements[8]->innertext,
                        "comfort" => $elements[9]->innertext,
                    ]
                ]);

                $day_part_index++;
                $needClose = true;
                if ($day_part_index == 4) {
                    $needClose = false;

                    array_push($month, (object)[
                        "index" => $day_index,
                        "day" => $day
                    ]);

                    $day_index++;
                    $day = [];
                    $day_part_index = 0;
                }

            }


        }

        if ($needClose) {
            array_push($month, (object)[
                "index" => $day_index,
                "day" => $day
            ]);
        }

        return $month;

    }

    public function getFullDescription()
    {
        return (object)[
            "wind" => (object)[
                "type" => "Направление ветра",
                "speed" => "м\с",
                "full_description" => "Ветер - указаны скорость ветра в м/с - средняя за 10 мин, порывы в срок и между сроками (в фигурных скобках) и направление, откуда дует ветер: С - северный,
СВ - северо-восточный, В - восточный, ЮВ - юго-восточный, Ю - южный, ЮЗ - юго-западный, З - западный, СЗ - северо-западный."
            ],
            "visibility" => (object)[
                "type" => "Размерность расстояния видимости",
                "value" => "Значение расстояния видимости",
                "full_description" => "Видимость - горизонтальная дальность видимости в метрах или километрах. При видимости от 1 до 10 км при отсутствии осадков обычно наблюдается дымка, при ухудшении видимости до 1 км и менее - туман. В сухую погоду видимость может ухудшаться дымом, пылью или мглою."
            ],

            "weather_condition" => "Явления  - указаны атмосферные явления, наблюдавшиеся в срок или в последний час перед сроком; фигурными скобками обозначены явления, наблюдавшиеся между сроками (за 1-3 часа до срока); квадратными скобками обозначены град или гололедные отложения с указанием их диаметра в мм."
            ,
            "cloudy" => "Облачность - указаны через наклонную черту общая и нижняя облачность в баллах и высота нижней границы облаков в метрах; квадратными скобками обозначены формы облаков: Ci - перистые, Cs - перисто-слоистые, Cc - перисто-кучевые, Ac - высококучевые, As - высокослоистые, Sc - слоисто-кучевые, Ns - слоисто-дождевые, Cu - кучевые, Cb - кучево-дождевые."

            ,
            "relative_humidity" => "%, Относительная влажность воздуха - влажноcть воздуха, измеренная на высоте 2 м над землей."
            ,
            "temperature" => (object)[
                "air" => "С, Температура воздуха - температура, измеренная на высоте 2 м над землей."
                ,
                "dew_point" => "С, Температура точки росы - температура, при понижении до которой содержащийся в воздухе водяной пар достигнет насыщения."
                ,
                "effective_in_shade" => "С, Эффективная температура - температура, которую ощущает одетый по сезону человек в тени. Характеристика душности погоды. При расчете учитывается влияние влажности воздуха и скорости ветра на теплоощущения человека."
                ,
                "effective_on_sun" => "С, Эффективная температура на солнце - температура, которую ощущает человек, с поправкой на солнечный нагрев. Характеристика знойности погоды. Зависит от высоты солнца над горизонтом, облачности и скорости ветра. Ночью, в пасмурную погоду, а также при ветре 12 м/с и более поправка равна нулю."
                ,
                "min" => "С, Минимальная температура - минимум температуры воздуха на высоте 2 м над землей."
                ,
                "max" => "С, Максимальная температура - максимум температуры воздуха на высоте 2 м над землей."
                ,
            ],
            "comfort" => "Комфортность для человека"
            ,
            "pressure" => (object)[
                "sea_level_atmospheric" => "гПа, Атмосферное давление - приведенное к уровню моря атмосферное давление."
                ,
                "meteorological_station_level_atmospheric" => "гПа, Атмосферное давление - измеренное на уровне метеостанции атмосферное давление."
                ,
            ],
            "precipitation" => (object)[
                "r" => "мм, Количество осадков - Количество выпавших осадков за период времени, мм. При наведении курсора мыши на число - период времени, за который выпало указанное количество осадков."
                ,
                "r24" => "мм, Количество осадков - Количество выпавших осадков за 24 часа, мм."
                ,
                "s" => "см, Снежный покров - Высота снежного покрова, см. При наведении курсора мыши на число - состояние снежного покрова и степень покрытия местности в баллах."

            ]

        ];
    }

    public function getPogodaByRegionId($regionId)
    {
        $dom = HtmlDomParser::file_get_html("http://www.pogodaiklimat.ru/forecast/" . $regionId . "_14.htm");
        $month = $this->parser($dom, 0);
        return $month;
    }

    public function findLocation($location)
    {
        $response = Http::asForm()->post('http://www.pogodaiklimat.ru/forecast.php', [
            's_name' => $location
        ]);
        $dom = HtmlDomParser::str_get_html($response->body());
        $table = $dom->find('.left-content__item .list-city-country .big-blue-billet__list');
        $arr = [];
        foreach ($table as $item) {
            $element = $item->find('.big-blue-billet__list_link a[href]');
            foreach ($element as $el) {
                $href = $el->getAttribute("href");

                $pattern = "/forecast\/([a-zA-Z0-9]+).htm/i";
                $match = [];
                preg_match($pattern, $href, $match); // Outputs 1

                if (count($match) > 0)
                    array_push($arr, (object)[
                        "title" => $el->text(),
                        "id" => $match[1],
                        "href" => $match[0],
                    ]);
            }
        }
        return $arr;
    }

    //27962
    public function getMonthAPI($region, $year, $month)
    {
        $daysInMonth = Carbon::create($year, $month)->daysInMonth;
        $currentMonth = Carbon::now()->month;
        $currentDay = Carbon::now()->day;
        $daysInMonth = $month == $currentMonth ? $currentDay : $daysInMonth;
        $dom = HtmlDomParser::file_get_html("http://www.pogodaiklimat.ru/weather.php?id=$region&bday=1&fday=$daysInMonth&amonth=$month&ayear=$year&bot=2", false, null, 0);

        $month = $this->parser($dom, 0);
        return $month;

    }
}
