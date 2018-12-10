'use strict';
var CACHE_NAME = 'stoneweb-cache';
var resources = [
  '/css/bootstrap.min.css',
  '/css/bootstrap.css',
  '/js/jquery-3.1.0.min.js',
  '/manifest.json',
];
self.addEventListener('install', function(event) {
	  // Perform install steps
	  event.waitUntil(
	    caches.open(CACHE_NAME)
	      .then(function(cache) {
	        return cache.addAll(resources);
	      })
	  );
	});

	self.addEventListener('activate', function(event) {
	  console.log('Finally active. Ready to start serving content!');
	});
	
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
