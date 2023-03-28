<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Заявка от туристической группы</title>

</head>
<body>

<h1>Информация об агенстве</h1>

<table>
    <tr>
        <td>Название</td>
        <td>{{$agency->title??'-'}}</td>
    </tr>

    <tr>
        <td>Адрес</td>
        <td>{{$agency->address??'-'}}</td>
    </tr>

    <tr>
        <td>Телефон</td>
        <td>{{$agency->phone??'-'}}</td>
    </tr>
</table>

<h1>Информация о гиде</h1>

<table>
    <tr>
        <td>Имя</td>
        <td>{{$guide->name??'-'}}</td>

    </tr>

    <tr>
        <td>Фамилия</td>
        <td>{{$guide->tname??'-'}} </td>
    </tr>

    <tr>
        <td>Отчество</td>
        <td>{{$guide->sname??'-'}} </td>
    </tr>

    <tr>
        <td>Контактная информация<br>о родственнике</td>
        <td>{{$guide->relative_contact_information??'-'}} </td>
    </tr>

    <tr>
        <td>Мобильный телефон</td>
        <td>{{$guide->mobile_phone??'-'}}</td>
    </tr>

    <tr>
        <td>Рабочий телефон</td>
        <td>{{$guide->office_phone??'-'}}</td>
    </tr>

    <tr>
        <td>Домашний телефон</td>
        <td>{{$guide->home_phone??'-'}}</td>
    </tr>

    <tr>
        <td>Адрес проживания</td>
        <td>{{$guide->address??'-'}}</td>
    </tr>

    <tr>
        <td>Дата рождения</td>
        <td>{{$guide->birthday??'-'}}</td>
    </tr>
</table>

<h1>Информация об участниках группы</h1>


@foreach($members as $index=>$member)
    <table>
        @php
            $member = (object)$member;
        @endphp

        <tr>
            <td>№ участника</td>
            <td>{{$index+1}}</td>
        </tr>

        <tr>
            <td>№ Тур. группы</td>
            <td>{{$member->tourist_group_id}}</td>
        </tr>

        <tr>
            <td>Полное имя</td>
            <td>{{$member->full_name??'-'}}</td>
        </tr>

        <tr>
            <td>Дата рождения</td>
            <td>{{$member->birthday??'-'}}</td>
        </tr>

        <tr>
            <td>Телефон</td>
            <td>{{$member->phone??'-'}}</td>
        </tr>

        <tr style="margin-bottom: 20px;">
            <td>Адрес проживания</td>
            <td>{{$member->address??'-'}}</td>
        </tr>
    </table>
    <hr>
@endforeach


<h1>Информация о туристической группе</h1>

<table>
    <tr>
        <td>Номер туристического<br>агенства в системе</td>
        <td>{{$group->tourist_agency_id??'-'}}</td>
    </tr>

    <tr>
        <td>Номер туристического<br>гида в системе</td>
        <td>{{$group->tourist_guide_id??'-'}}</td>
    </tr>

    <tr>
        <td>Суммарное число<br>участников похода</td>
        <td>{{$group->summary_members_count??'-'}}</td>
    </tr>

    <tr>
        <td>Дата регистрации<br>группы</td>
        <td>{{$group->registration_at??'-'}}</td>
    </tr>

    <tr>
        <td>Дата старта</td>
        <td>{{$group->start_at??'-'}}</td>
    </tr>

    <tr>
        <td>Дата возвращения</td>
        <td>{{$group->return_at??'-'}}</td>
    </tr>

    <tr>
        <td>Точка отправления</td>
        <td>{{$group->start_point??'-'}}</td>
    </tr>

    <tr>
        <td>Точка завершения<br>маршрута</td>
        <td>{{$group->final_destination_point??'-'}}</td>
    </tr>

    <tr>
        <td>Длина маршрута, км</td>
        <td>{{$group->route_distance??'-'}}</td>
    </tr>

    <tr>
        <td>Категория сложности маршрута</td>
        <td>{{$group->difficulty_category??'-'}}</td>
    </tr>

    <tr>
        <td>Дата и метод информирования<br>по возвращению</td>
        <td>
            <p>Дата: {{json_decode($group->date_and_method_informing)->date ?? '-'}}</p>
            <p>Метод: {{json_decode($group->date_and_method_informing)->method?? '-'}}</p>
        </td>
    </tr>

    <tr>
        <td>Дата и метод организации<br>комуникации на маршруте</td>
        <td>

            @foreach(json_decode($group->date_and_method_communication_sessions)  as $item)
                <p>Дата: {{$item->date ?? '-'}}</p>
                <p>Метод: {{$item->method?? '-'}}</p>
            @endforeach


        </td>
    </tr>

    <tr>
        <td>Колличество детей в походе</td>
        <td>{{$group->children_count??'-'}}</td>
    </tr>

    <tr>
        <td>Возраст детей в походе</td>
        <td>
            @foreach(json_decode($group->children_ages)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>

    <tr>

        <td>Колличество иностранцев в походе</td>
        <td>{{$group->children_count??'-'}}</td>
    </tr>

    <tr>
        <td>Страны туристов</td>
        <td>
            @foreach(json_decode($group->foreigners_countries)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>

    <tr>
        <td>Субъекты РФ,<br>через которые<br>проходит маршрут</td>
        <td>
            @foreach(json_decode($group->areas_of_rf)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>

    <tr>
        <td>Предполагаемые места<br>ночлега и отдыха</td>
        <td>
            @foreach(json_decode($group->lodging_points)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>

    <tr>

        <td> Маршруты аварийных выходов<br>(для маршрутов, имеющих<br>категории
            сложности)
        </td>
        <td>
            @foreach(json_decode($group->emergency_exit_routes)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>

    <tr>

        <td>Наличие опасных участков<br>на маршруте (речные пороги<br>, водопады,
            ледники,<br>
            переходы по льду и иные участки)
        </td>
        <td>
            @foreach(json_decode($group->dangerous_route_sections)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>

    <tr>
        <td>Способ передвижения на маршруте</td>
        <td>{{$group->travel_type??'-'}}</td>
    </tr>

    <tr>
        <td>Средства передвижения на маршруте</td>
        <td>{{$group->type_of_transport??'-'}}</td>
    </tr>

    <tr>
        <td>Мобильный телефон (с указанием<br>нескольких абонентов)</td>
        <td>
            @foreach(json_decode($group->mobile_phones)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>

    <tr>
        <td>Спутниковый телефон</td>
        <td>
            @foreach(json_decode($group->satellite_phones)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>

    <tr>
        <td>Радиостанция (с указанием частот)</td>
        <td>
            @foreach(json_decode($group->radio_stations)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>

    <tr>
        <td>Наличие заряженных запасных<br>элементов питания к
            средствам<br>
            связи, а также сигнальных средств
        </td>
        <td>
            @foreach(json_decode($group->charge_batteries)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>

    <tr>
        <td>Наличие средств оказания первой помощи</td>
        <td>
            @foreach(json_decode($group->first_aid_equipments)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>

    <tr>
        <td>Наличие медицинских работников</td>
        <td>
            @foreach(json_decode($group->medical_professionals)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>

    <tr>
        <td>Наличие страхового полиса<br>на маршруте (название
            страхового<br>
            агенства, контактный телефон)
        </td>
        <td>{{$group->insurance??'-'}}</td>
    </tr>

    <tr>
        <td>Дополнительная информация,<br>которую желает сообщить<br>
            ответственный испольнитель / турист
        </td>
        <td>
            @foreach(json_decode($group->additional_info)  as $item)
                <span>{{$item}},</span>
            @endforeach
        </td>
    </tr>
</table>

</body>
</html>
