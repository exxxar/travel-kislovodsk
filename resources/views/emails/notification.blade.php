@extends("emails.layouts.main")


@section("header")
    <h1>Письмо-оповещение</h1>
@endsection

@section("content")
   <h1>Оповещаем вас о следующем:</h1>
   <p>{{$text ?? 'Текст оповещения не добавлен'}}</p>
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

