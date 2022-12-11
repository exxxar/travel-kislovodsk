// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
*/
firebase.initializeApp({
    apiKey: "AIzaSyB5jiyxlOg_Q0UflGMloostLNVnDfPuNtU",
    authDomain: "travelkislovodsk.firebaseapp.com",
    projectId: "travelkislovodsk",
    storageBucket: "travelkislovodsk.appspot.com",
    messagingSenderId: "654022815611",
    appId: "1:654022815611:web:16a22d468fa0191ad997de",
    measurementId: "G-WKYLSWLTDK"
});

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();


messaging.setBackgroundMessageHandler(function (payload) {
    const title = "Hello world is awesome";
    const notificationOptions = {
        body: payload.data.body || 'У вас новое уведомление!',
        icon: payload.data.image || '/logo.png',
    };
    return self.registration.showNotification(
        title,
        notificationOptions,
    );
});
