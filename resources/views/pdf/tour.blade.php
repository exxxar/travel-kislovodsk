<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Информация о туре</title>
</head>
<body>
<h2>Заявка верификации тура:</h2>
<p><strong>Название тура</strong> {{$tour->title??''}}</p>
<p><a href="{{config("app.url").'/tour/'.$tour->id}}" target="_blank">Открыть страницу тура</a></p>
<p><strong>Базовая цена</strong> {{$tour->base_price??0}} руб</p>
<p><strong>Цена со скидкой</strong> {{$tour->discount_price??0}} руб</p>
<p><strong>Короткое описание</strong> {{$tour->short_description??''}}</p>
<p><strong>Минимальный размер группы</strong> {{$tour->min_group_size??0}} чел</p>
<p><strong>Максимальный размер группы</strong> {{$tour->max_group_size??0}} чел</p>
<p><strong>Забирают от дома</strong> {{$tour->comfort_loading?'Да':'Нет'}}</p>
<p><strong>Описание</strong><br> {{$tour->description??''}}</p>
<p><strong>Начальный город</strong> {{$tour->start_city??''}}</p>
<p><strong>Начальный адрес</strong> {{$tour->start_address??''}}</p>
<p><strong>Широта начальной локации</strong> {{$tour->start_latitude??0}}</p>
<p><strong>Долгота начальной локации</strong> {{$tour->start_longitude??0}}</p>
<p><strong>Комментарий к стартовой локации</strong><br> {{$tour->start_comment??''}}</p>

@php
    $imgPath = explode('/',$tour->preview_image);
    $imgPath = $imgPath[count($imgPath)-1];
@endphp

<p><strong>Превью изображение к туру:</strong>

    @if (strpos($tour->preview_image, 'http')===false)
        <a href="{{config("app.url").$tour->preview_image}}">Ссылка</a><br>
    @else
        <a href="{{$tour->preview_image}}">Ссылка</a><br>
    @endif

    <img src="{{storage_path()."/app/public/user/".$tour->creator_id."/tours/".$imgPath}}" alt="">

</p>

<p><strong>Комментарий к стартовой локации</strong> {{$tour->start_comment??'Не задан'}}</p>
<p><strong>Является восстребованным(горячим)</strong> {{$tour->is_hot?'Да':'Нет'}}</p>
<p><strong>Является активным</strong> {{$tour->is_active?'Да':'Нет'}}</p>
<p><strong>Является черновиком</strong> {{$tour->is_draft?'Да':'Нет'}}</p>

<p><strong>Длительность тура</strong> {{$tour->duration??'Не задана'}}</p>

<p><strong>Изображения к туру:</strong></p>
<div style="display: flex; justify-content: center; align-items: center; width:100%;">
    @if (count($tour->images)>0)
        @foreach($tour->images as $index=>$img)

            @php
                $imgPath = explode('/',$img);
                $imgPath = $imgPath[count($imgPath)-1];
            @endphp


            @if (strpos($img, 'http')===false)
                <a href="{{config("app.url").$img}}">Ссылка {{$index+1}}</a>
            @else
                <a href="{{$img}}">Ссылка {{$index+1}}</a>
            @endif

            <img src="{{storage_path()."/app/public/user/".$tour->creator_id."/tours/".$imgPath}}" alt="">
        @endforeach
    @else
        Изображений к туру не добавлено
    @endif
</div>
<p><strong>Сервисы, которые добавлены в тур:</strong>
    @foreach($tour->include_services as $service)
        <span>{{$service}}</span>
    @endforeach

    <br>
</p>

<p><strong>Сервисы, которые исключены из тура:</strong>
    @foreach($tour->exclude_services as $service)
        <span>{{$service}}</span>
    @endforeach

    <br>
</p>

@if(!is_null($tour->duration_type_id))
    <p><strong>Тип длительности</strong> {{$tour->durationType->title??'Не указан'}}</p>
@endif

@if(!is_null($tour->movement_type_id))
    <p><strong>Тип передвижения</strong> {{$tour->movementType->title??'Не указан'}}</p>
@endif

@if(!is_null($tour->tour_type_id))
    <p><strong>Тип тура</strong> {{$tour->tourType->title??'Не указан'}}</p>
@endif

@if(!is_null($tour->payment_type_id))
    <p><strong>Тип оплаты</strong> {{$tour->paymentType->title??'Не указан'}}</p>
@endif

@if(!is_null($tour->creator_id))
    <p><strong>Идентификатор создателя тура</strong> <a href="{{config("app.url")."/guide/".$tour->creator_id}}"></a>№{{$tour->creator_id}}</p>
    <p><strong>Почта создателя тура</strong> <a href="mailto:{{$tour->creator->email??''}}">{{$tour->creator->email??''}}</a></p>
@endif

<p><strong>Дата запроса верификации тура</strong> {{$tour->request_verify_at??'Отсутствует'}}</p>
<p><strong>Дата верификации тура</strong> {{$tour->verified_at??'Отсутствует'}}</p>

@if(!empty($tour->prices))
    <h4>Цены по группам:</h4>
    <ul>


    @foreach($tour->prices  as $price)
        @php
            $price = (object)$price;
            $has_discount = $price->has_discount ?? false;
            $ticket_type = 'Не указана';

            if (isset($price->ticket_type_id)) {
                 $ticket_type = \App\Models\Dictionary::getTicketTypes()
                    ->where("id", $price->ticket_type_id )
                    ->first();

                  if (!is_null($ticket_type))
                      $ticket_type = $ticket_type->title;
            }

        @endphp

        <li><p><strong>Тип билета</strong> {{$ticket_type}}</p>
            <p><strong>Базовая цена</strong> {{$price->base_price??'не указана'}} руб</p>
            @if ($has_discount)
                <p><strong>Цена со скидкой</strong> {{$price->discount_price??'не указана'}} руб</p>
            @endif
    @endforeach
    </ul>
@endif

@if(!empty($tour->payment_infos))
    <p><strong>Информация о способах оплаты:</strong>
        @foreach($tour->payment_infos as $info)
            <span>{{$info}}</span>
        @endforeach
        <br>
    </p>
@else
    <p>Информация о способах оплаты не указана!</p>
@endif

@if(!empty($tour->schedules))
    <p><strong>Даты туров:</strong></p>
    @foreach($tour->schedules as $schd)
        <p>{{$schd->start_at}}</p>
    @endforeach
@else
    <p>Информация о расписании не указана</p>
@endif

</body>
</html>
