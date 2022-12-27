@extends("layouts.app")

@section("content")
    <modals-component></modals-component>
    <notifications-component></notifications-component>
    <header-component></header-component>
    <div class="container pt-5 pb-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-8">
                <img src="/img/404.svg" style="mix-blend-mode: darken;" class="h-100 w-100" alt="">
            </div>
            <div class="col-8">
                <h1 class="text-center">Данная страница не найдена</h1>
            </div>
        </div>
    </div>
    <footer-component></footer-component>
@endsection
