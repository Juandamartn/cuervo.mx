self.addEventListener('push', function (event) {
    console.log('[Service Worker] Push Received.');
    //console.log(`[Service Worker] Push had this data: "${event.data.text()}"`);

    const title = 'Cuervo Nutrition';
    const options = {
        body: 'Nuevo cliente registrado',
        icon: '../img/cuervo-logo-min.png',
        badge: '../img/cuervo-logo-min.png'
    };

    event.waitUntil(self.registration.showNotification(title, options));
});

self.addEventListener('notificationclick', function (event) {
    console.log('[Service Worker] Notification click Received.');

    event.notification.close();

    event.waitUntil(
        clients.openWindow('https://cuervonutrition.com/admin.php')
    );
});
