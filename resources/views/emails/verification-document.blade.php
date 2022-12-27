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


    <table>
        <tr>
            <td align="center" style="padding: 20px;">

                <a href="{{config("app.url")."/admin/accept-document/".$document->id}}" class="button">Подтвердить</a>

            </td>
        </tr>
        <tr>
            <td align="center" style="padding: 20px;">

                <a href="{{config("app.url")."/admin/decline-document/".$document->id}}" class="button">Отклонить</a>

            </td>
        </tr>
        <tr>
            <td align="center" style="padding: 20px;">
                    <a href="{{env('APP_URL')}}" class="button">Перейти на сайт</a>
            </td>
        </tr>
    </table>

@endsection

