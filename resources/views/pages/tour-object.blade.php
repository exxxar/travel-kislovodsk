@extends("layouts.app")

@section("content")
    <modals-component></modals-component>
    <notifications-component></notifications-component>
    <header-component class="position-absolute dt-page-header--bg-none-image"></header-component>
    <tour-object-page :object="{{$object}}"></tour-object-page>
    <footer-component></footer-component>
@endsection
