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
						<a href="./">
							<i class="flaticon-home">Dashboard</i>
						</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					<li class="nav-item">
						<a href="profiles.blade.php">Profile Page</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					
				</ul>
			</div>

			<!-- Add courses content -->
			<div class="col-md-12">
				<div class="container-fluid p-0">
					<div class="row">
				

						<div class="col-md-9 col-xl-10">
							<div class="tab-content">
								<div class="tab-pane fade show active" id="account" role="tabpanel">

									<div class="card">
										<div class="card-header">

											<h5 class="card-title mb-0">Profile Details</h5>
										</div>
										<div class="card-body">
											<form action="../handlers/profile.php" method="POST" enctype="multipart/form-data">
												
												<div class="row">
													<div class="col-md-8">
													
  								
 														<?php if (count($user->fetchProfileDetails())): ?>
											
										
														<?php foreach($user->fetchProfileDetails() as $users): ?>
														<div class="form-group">
															<label for="inputFirstName">First name</label>
														<input type="text" class="form-control" name="fname" value="<?php echo @$users['firstname'] ?>" placeholder="First name">
														
														</div>
														<div class="form-group">
															<label for="inputFirstName">Last name</label>
														<input type="text" class="form-control" name="lname" value="<?php echo @$users['lastname'] ?>" placeholder="Last name">
														
														</div>
														<div class="form-group">
															<label for="inputUsername">Username</label>
															<input type="text" class="form-control" value="<?php echo @$users['uname'] ?> " name="username" placeholder="Username" disabled>
																
														</div>
														
														<div class="form-group">
															<label >Email</label>
													<input type="email" class="form-control" name="email" value="<?php echo @$users['email'] ?>" placeholder="Email" disabled>
													
														</div>
														
														
													</div>
													<div class="col-md-4">
														<div class="text-center">
															<img alt="Charles Hall" id="changes" src="../<?php echo @$users['img_profile'] ?>"  class="rounded-circle img-responsive mt-2" wnameth="128" width="128" height="128" />
															<div class="mt-2">
																<input type="file" name="profile_pics" id="profile_pics" hidden>
																<p id="text"></p>
																<span class="btn btn-primary" id="clickme"><i class="fas fa-upload"></i> Upload</span>
							

															</div>
															<small>For best results, use an image at least 128px by 128px in .jpg format</small>
															<p>
															
                  												</p>
														</div>
													</div>
												</div>

													
												</div>
												<?php endforeach; ?>	
												
                                		
													<div class="row ">
														<div class="col text-center mb-3">
															<button type="submit" name="update" class="btn btn-primary">Save changes</button>
														</div>
														
													</div>
													<?php endif ?>
												
											</form>
												
										</div>
									</div>

								</div>

							
							</div>
						</div>
					</div>

				</div>
			</main>
			</div>
	</div>
</div>
										  
<script type="text/javascript">
	$(document).ready(function () {
//changes the upload functionality from the default file button to the customize button
	$('#clickme').click(function(){
		$('#profile_pics').click()
	});
	// updates the profile pics with the uploaded pics
	 $('#profile_pics').change(function () {
	 		var file = $(this).get(0).files[0];
		if (file) {
			var reader = new FileReader();
			reader.onload = function(){
				
				$('#changes').attr('src', reader.result);		
				}																			
			reader.readAsDataURL(file);
		}
	 	})	
	})
	</script>
	<?php if (false == true): ?>
	
		<span class="" role="alert" style="margin-top: 5px;color:red;margin-bottom: 5px">
		    <strong>{{ $message }}</strong>
		</span>
	
	<?php endif ?>
	 
<?php 
require 'includes/pop_up.blade.php';
require 'includes/table_scripts.blade.php';
 ?>