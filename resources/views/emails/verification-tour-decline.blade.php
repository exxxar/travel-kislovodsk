@extends("emails.layouts.main")


@section("header")
    <h1>Письмо верификации тура</h1>
@endsection

@section("content")
    <h6>Ваш тур отклонен администратором:</h6>
    <p>{{$tour->title??''}}</p>
    <p><a href="{{config("app.url").'/tour/'.$tour->id}}" target="_blank">Открыть страницу тура</a></p>

    <p>Короткое описание {{$tour->short_description??''}}</p>

    <p>Превью изображение к туру:</p>
    <div style="display: flex; justify-content: center; align-items: center; width:100%;">
        @if (strpos($tour->preview_image, 'http')===false)
            <img src="{{config("app.url").$tour->preview_image}}" alt="" style="width: 500px; object-fit: cover;">
        @else
            <img src="{{$tour->preview_image}}" alt="" style="width: 500px; object-fit: cover;">
        @endif
    </div>>

    <p>Ваш тур отклонен по причине:</p>
    @isset($messages)
        @foreach($messages as $message)
            <p>{{$message}}</p>
        @endforeach
    @endisset

    <table>
        <tr>
            <td align="center">
                <p>
                    <a href="{{env('APP_URL')}}" class="button">Перейти на сайт</a>
                </p>
            </td>
        </tr>
    </table>

@endsection

