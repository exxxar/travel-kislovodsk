@extends("emails.layouts.main")


@section("header")
    <h1>Письмо верификации профиля</h1>
@endsection

@section("content")
    <h2>Ваш аккаунт успешно верифицирован</h2>
    <p>
        Данные компании для верификации:
    </p>
    <p>Название компании: {{$company->title}}</p>
    <p>Описание компании: {{$company->description}}</p>
    <p>ИНН: {{$company->inn}}</p>
    <p>ОГРН: {{$company->ogrn}}</p>
    <p>Юридический адрес: {{$company->law_address}}</p>

    <div style="display: flex; justify-content: center; align-items: center; width:100%;">
        @if (strpos($company->photo, 'http')===false)
            <img src="{{config("app.url").$company->photo}}" alt="" style="width: 500px; object-fit: cover;">
        @else
            <img src="{{$company->photo}}" alt="" style="width: 500px; object-fit: cover;">
        @endif
    </div>

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

