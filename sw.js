let cacheName = 'josnem_v1';
let cacheUrls = [
	'index.php',
	'location.php',
	'bootstrap/css/bootstrap.min.css',
	'bootstrap/css',
	'results.php'
]
self.addEventListener('install',(e)=>{
	console.log('Installing');
	e.waitUntil(
		caches.open(cacheName)
		.then(cache=>{
			return cache.addAll(cacheUrls);
		})
		.catch(err=> console.log(err))
	)
	
});
self.addEventListener('activate',(e)=>{
	//delete old caches
	e.waitUntil(
		caches.keys().then(cacheNames=>{
			return Promise.all(
				cacheNames.filter(cacheName=>true)
				.map(cacheName=>caches.delete(cacheName))
				)
		})
	)
});

//add to caches

self.addEventListener('fetch',(e)=>{

	e.respondWith(
fetch(e.request).then(resp=>{
	//add to caches
	// caches.open(cacheName).then(cache=>{
	// 	cache.put(e.request,resp.clone());
	// });
	//return response
	return resp;
}).catch(err=>{
	console.log('Misssed network. Now fetching from the cache')
	const response = caches.match(e.request);
	return response;
})
)
})
