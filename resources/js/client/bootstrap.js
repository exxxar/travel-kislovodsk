import _ from 'lodash';


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

window.statistic = document.head.querySelector('meta[name="statistic"]') != null ?
    document.head.querySelector('meta[name="statistic"]').content : null;

if (window.statistic) {
    window.statistic = JSON.parse(window.statistic)
}

if (window.user) {
    window.user = JSON.parse(window.user)

    window.user.is_guide = window.user.role.name === "guide"
    window.user.is_user = window.user.role.name === "user"
    window.user.is_guest = false
    window.user.is_admin = window.user.role.name === "admin"
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
    window.user.is_admin = false
    //todo: добавить роль на клиент
 /*   window.user.is_transporter = false;
    window.user.is_customer = false
    window.user.is_admin = false
    */

}


setInterval(()=>{
    let online = navigator.onLine;

    if (!online)
        window.location.reload()
}, 60000)

