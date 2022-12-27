@extends("emails.layouts.main")


@section("header")
    <h1>Письмо верификации профиля</h1>
@endsection

@section("content")
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
            <td align="center" style="padding: 20px;">
                <a href="{{config("app.url")."/admin/accept-profile/".$company->id}}" class="button">Подтвердить</a>
            </td>
        </tr>
        <tr>
            <td align="center" style="padding: 20px;">
                <a href="{{config("app.url")."/admin/decline-profile/".$company->id}}" class="button">Отклонить</a>
            </td>
        </tr>
        <tr>
            <td align="center" style="padding: 20px;">
                <a href="{{env('APP_URL')}}" class="button">Перейти на сайт</a>
            </td>
        </tr>
    </table>

@endsection

