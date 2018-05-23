var CACHE_NAME = 'stoneweb-cache';
var resources = [
  '/css/bootstrap.min.css',
  '/css/bootstrap.css',
  '/js/jquery-3.1.0.min.js',
  '/manifest.json',
  '/stonelink',
  
];

// Open + Cache + Verify cache
self.addEventListener('install', function(event) {
  // Perform install steps
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function(cache) {
        // console.log('Opened cache');
        return cache.addAll(resources);
      })
  );
});

// Load cache if present otherwise install
self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.match(event.request)
        .then(function(response) {
          // Cache hit - return response
          if (response) {
            return response;
          }
          return fetch(event.request);
        }
      )
    );
  });