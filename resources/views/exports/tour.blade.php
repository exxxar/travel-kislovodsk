<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Экспорт информации о турах гида</title>
</head>
<body>

<table>
    <tr>
        <td style="width: 50px;">№ тура</td>
        <td style="width: 300px;">Название тура</td>
        <td style="width: 100px;">Базовая цена</td>
        <td style="width: 100px;">Цена со скидкой</td>
        <td style="width: 300px;">Короткое описание тура</td>
        <td style="width: 100px;">Минимальный размер группы</td>
        <td style="width: 100px;">Максимальный размер группы</td>
        <td style="width: 50px;">Забираем у дома</td>
        <td style="width: 500px;">Большое описание тура</td>
        <td style="width: 100px;">Город отправления</td>
        <td style="width: 500px;">Адрес отправления</td>
        <td style="width: 100px;">Широта стартой локации</td>
        <td style="width: 100px;">Долгота стартовой локации</td>
        <td style="width: 500px;">Комментарий к стартовой локации</td>
        <td style="width: 100px;">Ссылка на превью изображение</td>
        <td style="width: 100px;">Длительность тура(текстом)</td>
        <td style="width: 500px;">Что включено</td>
        <td style="width: 500px;">Что не включено</td>
        <td style="width: 500px;">Информация о способах оплаты</td>
        <td style="width: 500px;">Расписание</td>
        <td style="width: 500px;">Категории тура</td>
        <td style="width: 50px;">Тип длительности (справочник)</td>
        <td style="width: 50px;">Тип передвижения (справочник)</td>
        <td style="width: 50px;">Тип тура (справочник)</td>
        <td style="width: 50px;">Тип оплаты (справочник)</td>
        <td style="width: 100px;">Ссылка на картинку 1</td>
        <td style="width: 100px;">Ссылка на картинку 2</td>
        <td style="width: 100px;">Ссылка на картинку 3</td>
        <td style="width: 100px;">Ссылка на картинку 4</td>
        <td style="width: 100px;">Ссылка на картинку 5</td>
        <td style="width: 100px;">Ссылка на картинку 6</td>
        <td style="width: 100px;">Ссылка на картинку 7</td>
        <td style="width: 100px;">Ссылка на картинку 8</td>
        <td style="width: 100px;">Ссылка на картинку 9</td>
        <td style="width: 100px;">Ссылка на картинку 10</td>
    </tr>

    @if (count($tours)>0)
        @foreach($tours as $index=>$item)

            <tr>
                <td style="width: 50px;">{{$index+1}}</td>
                <td style="width: 300px;">{{$item->title??''}}</td>
                <td style="width: 100px;">{{$item->base_price??0}}</td>
                <td style="width: 100px;">{{$item->discount_price??0}}</td>
                <td style="width: 300px;">{{$item->short_description??''}}</td>
                <td style="width: 100px;">{{$item->min_group_size??0}}</td>
                <td style="width: 100px;">{{$item->max_group_size??0}}</td>
                <td style="width: 50px;">{{$item->comfort_loading??0}}</td>
                <td style="width: 500px;">{{$item->description??''}}</td>
                <td style="width: 100px;">{{$item->start_city??''}}</td>
                <td style="width: 500px;">{{$item->start_address??''}}</td>
                <td style="width: 100px;">{{$item->start_latitude??''}}</td>
                <td style="width: 100px;">{{$item->start_longitude??''}}</td>
                <td style="width: 500px;">{{$item->start_comment??''}}</td>
                <td style="width: 100px;">
                    @if (!strpos($item->preview_image, "http"))
                        {{env("APP_URL").$item->preview_image}}
                    @else
                        {{$item->preview_image}}
                    @endif
                </td>
                <td style="width: 100px;">{{$item->duration??''}}</td>
                <td style="width: 500px;">
                    @foreach($item->include_services as $service)
                        @if(strlen(trim($service))>0)
                            {{$service}};
                        @endif
                    @endforeach
                </td>
                <td style="width: 500px;">
                    @foreach($item->exclude_services as $service)
                        @if(strlen(trim($service))>0)
                        {{$service}};
                        @endif
                    @endforeach
                </td>


                <td style="width: 500px;">
                    @foreach($item->payment_infos as $payment)
                        @if(strlen(trim($payment))>0)
                            {{$payment}};
                        @endif
                    @endforeach
                </td>

                <td style="width: 500px;">
                    @foreach($item->schedules as $schedule)
                        {{$schedule->start_at}};
                    @endforeach
                </td>

                <td style="width: 500px;">
                    @foreach($item->tourCategories as $category)
                        {{$category->id}};
                    @endforeach
                </td>



                <td style="width: 50px;">{{$item->duration_type_id??''}}</td>
                <td style="width: 50px;">{{$item->movement_type_id??''}}</td>
                <td style="width: 50px;">{{$item->tour_type_id??''}}</td>
                <td style="width: 50px;">{{$item->payment_type_id??''}}</td>

                @for($i= 0; $i < min(10, count($item->images)); $i++)
                    <td style="width: 100px;">
                        @if (!strpos($item->images[$i], "http"))
                            {{env("APP_URL").$item->images[$i]}}
                        @else
                            {{$item->images[$i]}}
                        @endif
                    </td>
                @endfor

                @if ( count($item->images)<10 )
                    @for($index = count($item->images)-1; $i < 10; $i++)
                        <td style="width: 100px;"></td>
                    @endfor
                @endif
            </tr>
        @endforeach
    @endif
</table>


</body>
</html>
