<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
</head>
<body>
<table>
    <tr>
        <td style="width: 100px;">Идентификатор</td>
        <td style="width: 1000px;">Название</td>
    </tr>


    @foreach($dicionary as $item)

        <tr>
            <td style="width: 100px; text-align: left;">{{$item->id}}</td>
            <td style="width: 1000px;">
                {{$item->title??"Отсутствует"}}
            </td>
        </tr>

    @endforeach

</table>


</body>
</html>
