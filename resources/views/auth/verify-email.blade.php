
@extends("layouts.app")

@section("content")
    <header-component></header-component>

    <div class="container" style="padding-top:30px;">
        <div class="row">
            <div class="col-12 d-flex justify-content-center flex-column align-items-center">

                <img src="/images/common/icons/general/content-loader.gif" alt="" style="width:300px; object-fit: cover;">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        Обновленная ссылка верификации успешно отправлена на вашу почту!
                    </div>
                @endif

                <p> Before proceeding, please check your email for a verification link. If you did not receive the
                    email,
                </p>
                <form action="{{ route('verification.send') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">
                        Получить еще одну ссылку верификации
                    </button>
                    .
                </form>

                <hr>

            </div>
            <div class="col-12 d-flex justify-content-center">
                <a href="/logout" class="btn btn-primary">Выйти из текущего аккаунта</a>
            </div>
        </div>
    </div>

    <footer-component></footer-component>
@endsection
