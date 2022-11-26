import _ from 'lodash';
/*import firebase from "firebase";

var firebaseConfig = {
    apiKey: "AIzaSyACrIDLXDuzVHE9rTvIG6mg6qM4YMIF3MU",
    authDomain: "allot-f0cdb.firebaseapp.com",
    projectId: "allot-f0cdb",
    storageBucket: "allot-f0cdb.appspot.com",
    messagingSenderId: 'G-1MH9VQW03S',
    appId: "1:661229456156:web:b6045f61b3625b399008d9",
};

firebase.initializeApp(firebaseConfig);

const messaging = firebase.messaging();
messaging
    .requestPermission()
    .then(function () {
        return messaging.getToken()
    })
    .then(function (response) {
       alert("Test")
    }).catch(function (error) {
    alert(error);
});
messaging.onMessage(function (payload) {
    const title = payload.notification.title;
    const options = {
        body: payload.notification.body,
        icon: payload.notification.icon,
    };
    new Notification(title, options);
});*/


window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

window.user = document.head.querySelector('meta[name="user"]') != null ?
    document.head.querySelector('meta[name="user"]').content : null;

if (window.user) {
    window.user = JSON.parse(window.user)
    console.log(window.user)
    window.user.is_guide = false
    window.user.is_user = true
    window.user.is_guest = false
    //todo: добавить роль на клиент
   /* window.user.is_transporter = window.user.roles.filter(item => item.name === "transporter").length > 0 || false;
    window.user.is_customer = window.user.roles.filter(item => item.name === "customer").length > 0 || false;
    window.user.is_admin = window.user.roles.filter(item => item.name === "admin").length > 0 || false;
    window.user.is_guest = false*/
} else {
    window.user = {}
    window.user.is_guest = true
    window.user.is_guide = false
    window.user.is_user = false
    //todo: добавить роль на клиент
 /*   window.user.is_transporter = false;
    window.user.is_customer = false
    window.user.is_admin = false
    */

}
