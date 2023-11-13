var CACHE_NAME = "cachev-2";


self.addEventListener('install', function(event) {
  event.waitUntil(


    caches.open(CACHE_NAME)
    .then(function(cache) {
      
        return cache.addAll([
            "manifest.json"
        ]);
      
    })


  );
});

self.addEventListener('push', (event) => {
    console.log('【SW】Push : メッセージを受信した', event, event.data.json());
    event.waitUntil(self.registration.showNotification('Message From Service Worker', {
      body: 'Service Worker からのメッセージです',
      requireInteraction: true,  // ユーザが操作するまで閉じなくなる
      actions: [  // 選択肢を表示する。Mac Chrome の場合、「オプション」の中に格納されている
        { action: 'Action 1', title: 'Action Title 1' },
        { action: 'Action 2', title: 'Action Title 2' }
      ],
      data: event.data.json()
    }));
  });

self.addEventListener('activate', function(event) {  
    event.waitUntil(
      
      caches.keys().then(function(cache) {
        cache.map(function(name) {
          if(CACHE_NAME !== name) caches.delete(name);
        })
      })
      
    );
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
      
      caches.match(event.request).then(function(res) {
          if(res) return res;
        
          return fetch(event.request);
      })
      
    );
});