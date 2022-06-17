<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.booth{
			width: 400px;
			background-color: #ccc;
			border: 10px solid #ddd;
			margin: 0 auto;
			height: 128px;
		}
		#canvas{
			display: none;
		}
		img{
			border-radius: 45%;
			height: 128px;
			width: 128px;
		}
	</style>
</head>
<body>
	<div class="booth">
		<video  id="video" width="228" height="228" style="border-radius:50%"></video>
		
		<canvas id="canvas" width="400" height="300"></canvas>
		<a href="#" id="takephoto">Take Photo</a href="#">
		<img id="photo" src="" alt="to put default image holder later" >
	</div>

	<script src="js/photo.js" ></script>

</body>
</html>
