import firebase from 'firebase/app'
import 'firebase/firebase-messaging'

var firebaseConfig = {
    apiKey: "AIzaSyACrIDLXDuzVHE9rTvIG6mg6qM4YMIF3MU",
    authDomain: "allot-f0cdb.firebaseapp.com",
    projectId: "allot-f0cdb",
    storageBucket: "allot-f0cdb.appspot.com",
    messagingSenderId: 'G-1MH9VQW03S',
    appId: "1:661229456156:web:b6045f61b3625b399008d9",
};

firebase.initializeApp(firebaseConfig);

export default firebase.messaging()
/*

const messaging = firebase.messaging();
messaging
    .requestPermission()
    .then(function () {
        return messaging.getToken()
    })
    .then(function (response) {
        window.$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{csrf_token()}}'
            }
        });
        window.$.ajax({
            url: '/fcm-token',
            type: 'POST',
            data: {
                token: response
            },
            dataType: 'JSON',
            success: function (response) {
                alert('Token stored.');
            },
            error: function (error) {
                alert(error);
            },
        });
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
});
*/
