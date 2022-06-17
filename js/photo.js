(function() {
	var video = document.getElementById('video');
	canvas = document.getElementById('canvas');
	context = canvas.getContext('2d');
	photo = document.getElementById('photo');

	vendorUrl = window.URL || window.webkitURL;

	navigator.getMedia = navigator.getUserMedia||
	 navigator.webkitGetUserMedia
	||navigator.mozGetUserMedia||
	navigator.mskitGetUserMedia;

	navigator.getMedia({
		video: true,
		audio: false
	}, function(stream){
		video.srcObject=stream;
video.play();

	},function(error){
		//an error occured
	});

	document.getElementById('takephoto').
	addEventListener('click',function(){
		context.drawImage(video, 0,0,400,300);
		photo.setAttribute('src', canvas.toDataURL('visitor/jpg'));
		stream.getTracks().forEach(function(track) {
		  track.stop();
		});
		
	})

})();


   // "scripts": {
    //     "post-autoload-dump": [
    //         "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
    //         "@php artisan package:discover --ansi"
    //     ],
    //     "post-update-cmd": [
    //         "@php artisan vendor:publish --tag=laravel-assets --ansi --force"
    //     ],
    //     "post-root-package-install": [
    //         "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
    //     ],
    //     "post-create-project-cmd": [
    //         "@php artisan key:generate --ansi"
    //     ]
    // },