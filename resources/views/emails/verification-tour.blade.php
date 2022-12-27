@extends("emails.layouts.main")


@section("header")
    <h1>Письмо верификации тура</h1>
@endsection

@section("content")
    <h6>Данные тура для верификации:</h6>
    <p>{{$tour->title??''}}</p>
    <p><a href="{{config("app.url").'/tour/'.$tour->id}}" target="_blank">Открыть страницу тура</a></p>
    <p>Базовая цена {{$tour->base_price??0}} руб</p>
    <p>Цена со скидкой {{$tour->discount_price??0}} руб</p>
    <p>Короткое описание {{$tour->short_description??''}}</p>
    <p>Минимальный размер группы {{$tour->min_group_size??0}}</p>
    <p>Максимальный размер группы {{$tour->max_group_size??0}}</p>
    <p>Забирают от дома {{$tour->comfort_loading?'Да':'Нет'}}</p>
    <p>Описание {{$tour->description??''}}</p>
    <p>Начальный город {{$tour->start_city??''}}</p>
    <p>Начальный адрес {{$tour->start_address??''}}</p>
    <p>Широта начальной локации {{$tour->start_latitude??0}}</p>
    <p>Долгота начальной локации {{$tour->start_longitude??0}}</p>
    <p>Комментарий к стартовой локации {{$tour->start_comment??''}}</p>

    <p>Превью изображение к туру:</p>
    <div style="display: flex; justify-content: center; align-items: center; width:100%;">
        @if (strpos($tour->preview_image, 'http')===false)
            <img src="{{config("app.url").$tour->preview_image}}" alt="" style="width: 500px; object-fit: cover;">
        @else
            <img src="{{$tour->preview_image}}" alt="" style="width: 500px; object-fit: cover;">
        @endif
    </div>

    <p>Комментарий к стартовой локации {{$tour->start_comment??''}}</p>
    <p>Является горчим {{$tour->is_hot?'Да':'Нет'}}</p>
    <p>Является активным {{$tour->is_active?'Да':'Нет'}}</p>
    <p>Является черновиком {{$tour->is_draft?'Да':'Нет'}}</p>

    <p>Длительность тура {{$tour->duration??''}}</p>

    <p>Изображения к туру:</p>
    <div style="display: flex; justify-content: center; align-items: center; width:100%;">

        @if (count($tour->images)>0)
            @foreach($tour->images as $img)
                @if (strpos($img, 'http')===false)
                    <img src="{{config("app.url").$img}}" alt="" style="width: 500px; object-fit: cover;">
                @else
                    <img src="{{$img}}" alt="" style="width: 500px; object-fit: cover;">
                @endif

            @endforeach
        @else
            Изображений к туру не добавлено
        @endif
    </div>
    <p>Сервисы, которые добавлены в тур:
        @foreach($tour->include_services as $service)
            <span>{{$service}}</span>
        @endforeach
    </p>

    <p>Сервисы, которые исключены из тура:
        @foreach($tour->exclude_services as $service)
            <span>{{$service}}</span>
        @endforeach
    </p>

    @if(!is_null($tour->duration_type_id))
        <p>Тип длительности {{$tour->duration_type->title??''}}</p>
    @endif

    @if(!is_null($tour->movement_type_id))
        <p>Тип передвижения {{$tour->movement_type->title??''}}</p>
    @endif

    @if(!is_null($tour->tour_type_id))
        <p>Тип тура {{$tour->tour_type->title??''}}</p>
    @endif

    @if(!is_null($tour->payment_type_id))
        <p>Тип оплаты {{$tour->payment_type->title??''}}</p>
    @endif

    @if(!is_null($tour->creator_id))
        <p>Идентификатор создателя тура {{$tour->creator_id}}</p>
        <p>Почта создателя тура {{$tour->creator->email??''}}</p>
    @endif

    <p>Дата запроса верификации тура {{$tour->request_verify_at??'Отсутствует'}}</p>
    <p>Дата верификации тура {{$tour->verified_at??'Отсутствует'}}</p>

    @if(!empty($tour->prices))
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

            <p>Тип билета {{$ticket_type}}</p>
            <p>Базовая цена {{$price->base_price??'не указана'}}</p>
            <p>Цена со скидкой {{$price->discount_price??'не указана'}}</p>
            <p>Скидка задана {{$has_discount?'Да':'Нет'}}</p>
        @endforeach
    @endif

    @if(!empty($tour->payment_infos))
        <p>Информация о способах оплаты:
            @foreach($tour->payment_infos as $info)
                <span>{{$info}}</span>
            @endforeach
        </p>
    @else
        <p>Информация о способах оплаты не указана!</p>
    @endif

    @if(!is_null($tour->schedules))
        <p>Даты туров: </p>
        @foreach($tour->schedules as $schd)
            <p>{{$schd->start_at}}</p>
        @endforeach
    @else
        <p>Информация о расписании не указана</p>
    @endif


    <table>
        <tr>
            <td align="center" style="padding: 20px;">
                <a href="{{config("app.url")."/admin/accept-tour/".$tour->id}}" class="button">Подтвердить</a>
            </td>
        </tr>
        <tr>
            <td align="center" style="padding: 20px;">
                <a href="{{config("app.url")."/admin/decline-tour/".$tour->id}}" class="button">Отклонить</a>
            </td>
        </tr>
        <tr>
            <td align="center" style="padding: 20px;">
                <a href="{{env('APP_URL')}}" class="button">Перейти на сайт</a>
            </td>
        </tr>
    </table>

@endsection

