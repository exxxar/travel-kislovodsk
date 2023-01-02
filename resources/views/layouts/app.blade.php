<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/logo.png"/>
    <title>{{ config('app.name', 'Туризм') }}</title>

    @if (Auth::check())
        <meta name="user" content="{{ \App\Models\User::self() }}"/>
        <meta name="statistic" content="{{ \App\Models\User::selfStatistic() }}"/>
    @endif

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    @vite('resources/css/app.css')
    @vite('resources/js/client/app.css')

    <link rel="stylesheet" href="/css/main.css">

</head>
<body>
<div id="app">
    @yield("content")
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<!--@customVite(resources/js/client/app.js)-->
@vite('resources/js/client/app.js')

@auth()

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyB5jiyxlOg_Q0UflGMloostLNVnDfPuNtU",
            authDomain: "travelkislovodsk.firebaseapp.com",
            projectId: "travelkislovodsk",
            storageBucket: "travelkislovodsk.appspot.com",
            messagingSenderId: "654022815611",
            appId: "1:654022815611:web:16a22d468fa0191ad997de",
            measurementId: "G-WKYLSWLTDK"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function startFCM() {
            messaging
                .requestPermission()
                .then(function () {
                    return messaging.getToken()
                })
                .then(function (response) {
                    let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    let formData = new FormData
                    formData.append("token", response)

                    fetch('{{ route("store.token") }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrf,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                        },
                        body: JSON.stringify({token: response})
                    }).then(response => {
                        return response.text()
                    }).then(text => {

                    }).catch(error => {

                    })

                }).catch(function (error) {

            });
        }

        function sendMessage() {
            let csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content')

            let formData = new FormData
            formData.append("title", "test")
            formData.append("body", "Test")

            fetch('{{ route("send.web-notification") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrf,
                    'Content-Type': 'application/json'
                },
                body: formData
            }).then(response => {
                return response.text()
            }).then(text => {
                console.log("text", text)
            }).catch(error => {
                console.log("error", error)
            })
        }

        messaging.onMessage(function (payload) {
            console.log("messaging.onMessage", payload)
            if (Notification.permission !== 'granted')
                Notification.requestPermission();
            else {
                const title = payload.notification.title;
                const options = {
                    body: payload.notification.body,
                    icon: payload.notification.icon,
                };
                new Notification(title, options);

                window.eventBus.emit("fcm_message_notification",JSON.parse(payload.notification.body))
            }
        });

        startFCM();
        //sendMessage();
    </script>
@endauth
</body>
</html>
