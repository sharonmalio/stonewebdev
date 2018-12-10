
if ('serviceWorker' in navigator) {
    window.addEventListener('load', function () {
        navigator.serviceWorker.register('/worker.js').then(function (registration) {
             console.log("Registration was successful");
        }, function (err) {
             console.log("registration failed :(", err);
        });
    });
}
//navigator.serviceWorker && navigator.serviceWorker.register('/worker.js').then(function(registration) {
//	  console.log('Excellent, registered with scope: ', registration.scope);
//	});