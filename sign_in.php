<?php if (isset($_GET['msg'])):
 ?>
<script type="text/javascript">
	function printVisitorBadge() {
			window.open(
		    "printer/print_visitor.php?id_no="+ '<?php echo $_GET['id']; ?>',
		    "DescriptiveWindowName",
		    "width=650,height=430,resizable,scrollbars,status"
  		);
	}
	function clear_msg() {
		 window.location.assign("sign_in.php")
	}
	printVisitorBadge();
	 setInterval(clear_msg, 3000);

	
</script>

<?php unset($_GET['msg']); endif; ?>
<script type="text/javascript" src="mobile-detect.js"></script>
<style type="text/css">
.booth{
	background: #ddd;
	  border: 2px solid #ccc;
	width: 200px;
	  height: 150px;
	  background: url('images/avatar_profile.png');
	  background-size:cover ;
	  background-repeat: no-repeat;
	  background-position: 40% 40%;
	  margin: 0 auto;
}

video, #cssfilters-video, #screenshot-img,#photo {
    width: 200px;
    height: 150px;
}

</style>


<?php 
	include 'include/header.php';
	include 'include/navbar.php';
 ?>
 <!-- <script type="text/javascript" src="photoTaker/index.js"></script> -->

 <!-- Contact Us -->
    <section class="contact-us section-space">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-9 col-12">
                	<div class="row contact-form-area m-top-30">
                    <!-- Contact Form -->
	                    <div class="col-md-8 ">
	                    	<div class="">
	                        <h4 class="text-center">Visitor's Sign In</h4>
	                        <form class="form" method="post" action="handlers/sign_in.php" >
	                           
	                            <div class="row">
	                                <div class="col-lg-6 col-md-6 col-12">
	                                    <div class="form-group">
	                                        <div class="icon"><i class="fa fa-user"></i></div>
	                                        <input type="text" name="full_name" placeholder="Full Name" >
	                                    </div>
	                                </div>
	                                <div class="col-lg-6 col-md-6 col-12">
	                                    <div class="form-group">
	                                        <div class="icon"><i class="fa fa-envelope"></i></div>
	                                        <input type="email" class="form-control" name="email" placeholder="Type Email" >
	                                    </div>
	                                </div>
	                                <div class="col-lg-6 col-md-6 col-12">
	                                    <div class="form-group">
	                                        <div class="icon"><i class="fa fa-phone"></i></div>
	                                        <input type="text" class="form-control" name="phone" placeholder="Phone Number" minlength="11" maxlength="15" >
	                                    </div>
	                                </div>
	                                <div class="col-lg-6 col-md-6 col-12">
	                                    <div class="form-group ">
	                                        <div class="icon"><i class="fa fa-tag"></i></div>
	                                        <input type="text" class="form-control" name="address" placeholder="Address">
	                                    </div>
	                                </div>

	                                <div class="col-12 col-md-12 col-lg-12">
	                                    <div class="form-group textarea">
	                                        <div class="icon"><i class="fa fa-pencil"></i></div>
	                                        <textarea type="textarea" class="form-control" name="message" rows="5" placeholder="Enter Reason For Visitation"></textarea>
	                                    </div>
	                                </div>

	                                
	                            </div>
	                       
	                    	</div>
	                	</div>
	             

	                    <div class="col-md-4 ">
	                    	<div class="text-center" id="basic" style="margin-top:60px">
	                    		<!-- This Logic will only work when it is a Desktop or Laptop Device that access our Application -->
	                    		<div class="booth" >
	                    			<!-- the video element start playing when the start camera button is clicked -->
									<video class="videostream" autoplay=""></video>
									  <!-- <audio class="audiostream" autoplay=""></audio> -->
									  <canvas id="canvas" width="400" height="300" class="hidden"></canvas>
								 <!-- When the user click on the Capture Button the video element is hidden and the img element is diplayed. then the camera is stopped -->
								 <!-- If the Device that access our app is a mobile we will triger the input[file] button with jquery -->
								 	<input type="file" name="profile_pics" id="profile_pics" class="hidden">
								    <img id="photo" class="img img-rounded" src="" style="display: none" alt="to put default image holder later" >
								</div>

								
								<div class="m-top-30">
									
									<p id="text"></p>
									<span id="clickme" class="btn btn-primary capture-button" style="display: inline-block;" ><i class="fa fa-camera"></i> Start Camera </span>
									<span class="btn btn-danger" id="stop-button" style="display:none;"><i class="fa fa-upload"></i> Capture Visitor</span>
									<span class="btn btn-danger" id="retake-button" style="display:none;"><i class="fa fa-upload"></i> Retake Image</span>
								</div>
	
								
															
								<p>
								<?php if (isset($errors)): ?>
                                <span class="" role="alert" style="margin-top: 5px;color:red;margin-bottom: 5px">
                                    <strong><?php echo $errors ?></strong>
                                </span>
              					<?php endif ?> 
              					</p>
              					<!-- this input form holds the image name generated when the image was taken -->
              					<input type="hidden"  name="image" class="form-control"  id="visitors">
							</div>
	                    </div>
	                    <div class="col-12 col-md-12 col-lg-12">
                            <div class="form-group button">
                                <button type="submit" name="sign_in" class="bizwheel-btn theme-2">Sign In Visitors</button>
                            </div>
                           
															
															
													
	              <script type="text/javascript">
                            	var md = new MobileDetect(window.navigator.userAgent);
                            	console.log( md.mobile() );
                            	//alert('Mobile:'+ md.mobile());
                            	//alert('Safari:'+ md.userAgent());
        //                     	console.log('Mobile:'+ md.mobile() );          // 'Sony'
								// console.log('Phone:'+ md.phone() );           // 'Sony'
								// console.log('Tablet:'+ md.tablet() );          // null
								// console.log('Safari:'+ md.userAgent() );       // 'Safari'
								// console.log('AndroidOS:'+ md.os() );              // 'AndroidOS'
								// console.log('IPhone:'+ md.is('iPhone') );      // false
								// console.log('Bot:'+ md.is('bot') );         // false
								// console.log('Webkit:'+ md.version('Webkit') );         // 534.3
								// console.log('Build:'+ md.versionStr('Build') );       // '4.1.A.0.562'
								// console.log('xbox:'+ md.match('playstation|xbox') ); // false

								if (md.mobile() != null ) {
									
									$(document).ready(function () {
								//changes the upload functionality from the default file button to the customize button
									$('#clickme').text('Take Photo');
									$('#clickme').click(function(){
										$('#profile_pics').click()
									});
									// updates the profile pics with the uploaded pics
									 $('#profile_pics').change(function () {
									 		var file = $(this).get(0).files[0];
										if (file) {
											var reader = new FileReader();
											reader.onload = function(){
												$('#basic video').css('display', 'none');
												$('#photo').attr('src', reader.result);		
												$('#photo').css('display', 'block');	
												// alert(reader.result);
												$('#visitors').val(reader.result);
												}																			
											reader.readAsDataURL(file);
										}
									 	})	
									})
              
								}else{
									
									document.write('<script type="text/javascript" src="js/M4_image_taker.js"></' + 'script>');

								 }
                            </script>
								
                           
                        </div>
	                    </form>

                    </div>
                </div>
                    
                    <!--/ End contact Form -->
                </div>
                
                </div> 
            </div>
        </div>
    </section>
    <!--/ End Contact Us -->



 <?php 

include 'include/footer.php'; 

include 'include/scripts.php'; 

include 'include/pop_up.php'; 

  ?>
