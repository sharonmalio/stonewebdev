'use strict';
var CACHE_NAME = 'stoneweb-cache';
const version = '<?php echo $this->getVersion() ?>';
const offlinePage = '<?php echo $this->getOfflinePageUrl() ?>';
const urlBlacklist ='<?php echo json_encode($this->getOfflineUrlBlacklist()) ?>';
var resources = [
  '/css/bootstrap.min.css',
  '/css/bootstrap.css',
  '/js/jquery-3.1.0.min.js',
  '/manifest.json',
];


function updateStaticCache() {
    return caches.open(version)
        .then(cache => {
            return cache.addAll([
                offlinePage
            ]);
        });
}

function clearOldCaches() {
    return caches.keys().then(keys => {
        return Promise.all(
            keys
                .filter(key => key.indexOf(version) !== 0)
                .map(key => caches.delete(key))
        );
    });
}

function isHtmlRequest(request) {
    return request.headers.get('Accept').indexOf('text/html') !== -1;
}


function isBlacklisted(url) {
    return urlBlacklist.filter(bl => url.indexOf(bl) == 0).length > 0;
}


function isCachableResponse(response) {
    return response && response.ok;
}


self.addEventListener('install', event => {
    event.waitUntil(
        updateStaticCache()
            .then(() => self.skipWaiting())
    );
});


self.addEventListener('activate', event => {
    event.waitUntil(
        clearOldCaches()
            .then(() => self.clients.claim())
    );
});


self.addEventListener('fetch', event => {
    let request = event.request;

    if (request.method !== 'GET') {
        
        if (!navigator.onLine && isHtmlRequest(request)) {
            return event.respondWith(caches.match(offlinePage));
        }
        return;
    }

    if (isHtmlRequest(request)) {
        
        event.respondWith(
            fetch(request)
                .then(response => {
                    if (isCachableResponse(response) && !isBlacklisted(response.url)) {
                        let copy = response.clone();
                        caches.open(version).then(cache => cache.put(request, copy));
                    }
                    return response;
                })
                .catch(() => {
                    return caches.match(request)
                        .then(response => {
                            if (!response && request.mode == 'navigate') {
                                return caches.match(offlinePage);
                            }
                            return response;
                        });
                })
        );
    } else {
if (event.request.cache === 'only-if-cached' && event.request.mode !== 'same-origin')
      return
        event.respondWith(
            caches.match(request)
                .then(response => {
                    return response || fetch(request)
                            .then(response => {
                                if (isCachableResponse(response)) {
                                    let copy = response.clone();
                                    caches.open(version).then(cache => cache.put(request, copy));
                                }
                                return response;
                            })
                })
        );
    }
});