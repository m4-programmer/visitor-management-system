<?php
	
	require 'includes/admin_header.blade.php';
	require 'includes/admin_navbar.blade.php';
	require 'includes/admin_sidebar.blade.php';
	require 'includes/admin_scripts.blade.php';
  ?>

<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
					
				<ul class="breadcrumbs">
					<li class="nav-home">
						<a href="#">
							<i class="flaticon-home"></i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="./">Dashboard</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="visitors.blade.php">View Visitor's</a>
					</li>
				</ul>
			</div>


			<!-- to call up error log from modal using an alert box -->
					<!-- Table content Start-->
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">Site Settings</h4>
										
									</div>
								</div>
								<div class="card-body">
									<form action="" method="post">
										<div class="row">
														
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Site Title</label>
																	<input id="addEmail" name="fname" type="text" class="form-control" value="" placeholder="Enter First Name">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Company Logo</label>
																	<input id="logo" name="lname"  type="file" class="form-control" placeholder="">
																</div>
															</div>
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>Email</label>
																	<input id="addEmail" name="email" type="text" class="form-control" value="" placeholder="Enter User Email">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Username</label>
																	<input id="addUsername" name="uname" value="" type="text" class="form-control" placeholder="Enter User Username">
																</div>
															</div>
															<div class="col-sm-12">
																<div class="form-group form-group-default">
																	<label>Password</label>
																	<input id="addPassword" name="pword" type="text" class="form-control"  placeholder="Enter User Password">
																</div>
															</div>
														</div>
									</form>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
		</div>



  <?php 
require 'includes/pop_up.blade.php';
require 'includes/table_scripts.blade.php';
 ?>