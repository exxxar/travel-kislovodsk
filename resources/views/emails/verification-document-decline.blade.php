@extends("emails.layouts.main")


@section("header")
    <h1>Письмо верификации документа</h1>
@endsection

@section("content")
    <p>
        Данные документа для верификации:
    </p>
    <h6>Данные документа:</h6>
    <p>{{$document->title}}</p>
    <p><a href="{{config("app.url").$document->path}}" target="_blank">Открыть документ</a></p>
    <p>Размер документа {{$document->size}} байт</p>

    <p>Ваш документ отклонен по причине:</p>
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

