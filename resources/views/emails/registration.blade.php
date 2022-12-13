@extends("emails.layouts.main")


@section("header")
    <h1>Регистрационное письмо</h1>
@endsection

@section("content")
    <h2>Приветствуем,{{$name}} </h2>

    <p>
        Вы зарегестрировались на туристическом портале Кислододска.
    </p>
    <h6>Ваши данные:</h6>
    <p>{{$name}}</p>
    <p>{{$email}}</p>
    <p>{{$phone}}</p>

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

