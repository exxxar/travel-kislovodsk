importScripts('https://www.gstatic.com/firebasejs/8.3.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.0/firebase-messaging.js');

firebase.initializeApp({
    apiKey: "AIzaSyACrIDLXDuzVHE9rTvIG6mg6qM4YMIF3MU",
    authDomain: "allot-f0cdb.firebaseapp.com",
    projectId: "allot-f0cdb",
    storageBucket: "allot-f0cdb.appspot.com",
    messagingSenderId: "661229456156",
    appId: "1:661229456156:web:b6045f61b3625b399008d9",
    measurementId: 'G-1MH9VQW03S'
});

const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );

    const notificationTitle = payload.data.title;
    const notificationOptions = {
        body: payload.data.body,
        icon: payload.data.image,
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});
