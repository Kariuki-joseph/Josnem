let cacheName = 'josnem_v1';
let cacheUrls = [
	'index.php',
	'location.php',
	'contacts.php',
	'departments.php',
	'results.php'
]
self.addEventListener('install',(e)=>{
	console.log('Installing');
});
self.addEventListener('activate',(e)=>{
	e.waitUntil(
		caches.open(cacheName)
		.then(cache=>{
			return cache.addAll(cacheUrls);
		})
		.catch(err=> console.log(err))
	)
});

//add to caches
self.addEventListener('fetch',(e)=>{
	e.respondWith(
fetch(e.request).then(resp=>{
	//add to caches
	caches.open(cacheName).then(cache=>{
		cache.put(e.request,resp.clone());
	});
	//return response
	return response;
}).catch(err=>{
return caches.match(e.request)
.then(response=>response);
})
)
})