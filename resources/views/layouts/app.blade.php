<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @if (Auth::check())
        <meta name="user" content="{{ \App\Models\User::self() }}"/>
    @endif

    @vite(['resources/css/app.css'])

    <link rel="stylesheet" href="/css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
</head>
<body>
<div id="app">
    @yield("content")
</div>


@vite(['resources/js/client/app.js'])

<script>
    /*if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/firebase-messaging-sw.js')
            .then(reg => {
                console.log(`Service Worker Registration (Scope: ${reg.scope})`);
            })
            .catch(error => {
                const msg = `Service Worker Error (${error})`;
                console.error(msg);
            });
    } else {
        // happens when the app isn't served over HTTPS or if the browser doesn't support service workers
        console.warn('Service Worker not available');
    }*/
</script>
</body>
</html>
