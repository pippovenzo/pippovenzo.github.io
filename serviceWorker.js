self.addEventListener("install", function(event) {
    event.waitUntil(preLoad());
  });
  
  var preLoad = function(){
    console.log("Installing web app");
    return caches.open("offline").then(function(cache) {
      console.log("caching index and important routes");
      return cache.addAll(["cinema.png", "index.php", "attori.php","images","parameters.php", "sale.php"]);
    });
  };
  
  self.addEventListener("fetch", function(event) {
    event.respondWith(checkResponse(event.request).catch(function() {
      //return returnFromCache(event.request);
    }));
    event.waitUntil(addToCache(event.request));
  });

  var checkResponse = function(request){
    return new Promise(function(fulfill, reject) {
      fetch(request).then(function(response){
        if(response.status !== 404) {
          fulfill(response);
        } else {
          reject();
        }
      }, reject);
    });
  };
  
  var addToCache = function(request){
    return caches.open("offline").then(function (cache) {
      return fetch(request).then(function (response) {
        console.log(response.url + " was cached");
        return cache.put(request, response);
      });
    });
  };  
