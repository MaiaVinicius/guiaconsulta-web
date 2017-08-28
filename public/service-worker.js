var cacheName = 'guiaconsultaPWA-1';
var filesToCache = ['css/app.css', 'bootstrap.min.css', 'images/logo.png'];

self.addEventListener('install', function (e) {
    console.log('[ServiceWorker] Install');
    e.waitUntil(
        caches.open(cacheName).then(function (cache) {
            console.log('[ServiceWorker] Caching app shell');
            return cache.addAll(filesToCache);
        })
    );
});