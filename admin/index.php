
<?php
	session_start();
	require 'includes/admin_header.blade.php';
	
	require 'includes/admin_scripts.blade.php';
  ?>
  <div class="container-fluid" style="background-image: url('../images/slider/bg2.jpg');height: 100%; background-repeat: no-repeat;
    background-position: 50% 0;
    background-size: cover;">
  	
  
  <div class="container ">
  	
				
			<div class="row d-flex justify-content-center ">
				
				
					
				
				<div class="col-md-5 card p-5 mt-5 " style="opacity: 1;background: #ddd;margin-top: 150px!important;">
					<?php if (!isset($_SESSION['uname'])): ?>
					<h3 class="text-center">Login</h3>
					<form action="../handlers/log_in.php " method="post">
						
					<div class="form-group">
						<label >Username</label>
						<input type="text" class="form-control" name="uname"  placeholder="Enter Username">
										 
					</div>
					
					<div class="form-group">
						<label >Password</label>
						<input type="password" class="form-control" name="pword"  placeholder="Enter Password">
						
					</div>
					
					<div class="col text-center ">
					<button type="submit" name="login" class="btn btn-success">Login</button>
				</div>
				</form>
				  <?php else: ?>
				  	<h3 class="text-center text-danger">Welcome <?php echo $_SESSION['uname'] ?> Please click the Button below to proceed to your Dashboard</h3>
				<div class="col text-center mb-5">
					<a href="dashboard.blade.php"  class="btn btn-success">GO to Dashboard</a>
				</div>
			<?php endif ?>
				</div>
			
			</div>
		</div>
	</div>

	<?php 
require 'includes/pop_up.blade.php';
require 'includes/table_scripts.blade.php';
 ?>