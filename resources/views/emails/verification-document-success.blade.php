@extends("emails.layouts.main")


@section("header")
    <h1>Письмо верификации документа</h1>
@endsection

@section("content")
    <h2>Верификация успешно прошла!</h2>
    <p>
        Данные документа для верификации:
    </p>
    <h6>Данные документа:</h6>
    <p>{{$document->title}}</p>
    <p><a href="{{config("app.url").$document->path}}" target="_blank">Открыть документ</a></p>
    <p>Размер документа {{$document->size}} байт</p>

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

