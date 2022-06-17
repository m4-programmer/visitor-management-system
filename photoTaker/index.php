<?php 
  include '../include/header.php';
  include '../include/navbar.php';
 ?>
  <link rel="stylesheet" type="text/css" href="index.css">


<div id="basic" style="text-align:center;">
  <video class="videostream" autoplay="" ></video>
  <!-- <audio class="audiostream" autoplay=""></audio> -->
  <canvas id="canvas" width="400" height="300" class="hidden"></canvas>
 
    <img id="photo" class="img img-rounded" src="" style="display: none" alt="to put default image holder later" >
    <div class="row mt-2">
  <p>
    
    <button class="capture-button btn btn-primary ">Capture Visitor</button>
    <button id="stop-button" class="btn btn-danger " style="display: none;">Take Photo</button>
    <!-- <form method="POST" action="../WEBCAM FOLDER/show.php">
      
      <input type="text" name="image" value="enter" id="visitors">
      <button class="btn btn-success">Submit</button>
    </form >
     -->

    
  </p>
   </div>
</div>
<script type="text/javascript" src="index.js"></script>
</body>
</html>
