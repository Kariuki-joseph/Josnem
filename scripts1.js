//caching
if('serviceWorker' in navigator){
window.addEventListener('load',()=>{
	navigator.serviceWorker.register('sw.js')
	.then(register=>{
		console.log('Registering service worker')
	})
	.catch(err=>console.log(err));
});
}else{
	console.log('Service worker not supported by your browser!');
}