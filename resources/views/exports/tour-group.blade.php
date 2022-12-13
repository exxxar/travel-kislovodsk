
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Экспорт информации о группе</title>
</head>
<body>

<h1>{{$bookings[0]->tour->title??''}}</h1>
<h5>Дата проведения тура {{\Carbon\Carbon::parse($bookings[0]->start_at)->format("Y-m-d H:m")}}</h5>
<h5>Место сбора {{$bookings[0]->tour->start_city??''}}, {{$bookings[0]->tour->start_address??''}} (ш:{{$bookings[0]->tour->start_longitude??''}} , д:{{$bookings[0]->tour->start_latitude ?? ''}})</h5>
<table>
    <tr>
        <td style="width: 100px;">№ участника</td>
        <td style="width: 100px;">Ф.И.О. участника</td>
        <td style="width: 100px;">Телефон</td>

        <td style="width: 100px;">Статус транзакции</td>
        <td style="width: 100px;">Тип документа</td>
        <td style="width: 100px;">Информация о докуменет</td>
        <td style="width: 100px;">Почта</td>

    </tr>

    @foreach($bookings as $index=>$item)

        <tr>
            <td style="width: 100px;">{{$index+1}}</td>
            <td style="width: 300px;">{{$item->tname??''}} {{$item->fname??''}} {{$item->sname??''}}</td>
            <td style="width: 100px;">{{$item->phone??''}}</td>

            <td style="width: 100px;">{{$item->transaction->statusType->title??''}}</td>
            <td style="width: 100px;">{{$item->document_type_title??'не указан'}}</td>
            <td style="width: 100px;">{{$item->document_info??'не указан'}}</td>
            <td style="width: 300px;">{{$item->email??''}}</td>

        </tr>

    @endforeach

</table>


</body>
</html>
