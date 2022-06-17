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
						<a href="visitor_view.blade.php">View Visitor</a>
					</li>
					<li class="separator">
						<i class="flaticon-right-arrow"></i>
					</li>
					
				</ul>
			</div>
			<?php if (isset($_GET['id_no'])): ?>
				
			
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
														<?php $id_no = $_GET['id_no']; ?>
  								
 														<?php if (count($user->GetVisitors($id_no ))): ?>
											
										
														<?php foreach($user->GetVisitors($id_no) as $users): ?>
														<div class="form-group">
															<label for="inputFirstName">Full name</label>
														<input type="text" class="form-control" name="fname" value="<?php echo $users['full_name'] ?>" placeholder="First name">
														
														</div>
														<div class="form-group">
															<label for="inputFirstName">Phone Number</label>
														<input type="text" class="form-control" name="phone" value="<?php echo @$users['phone'] ?>" placeholder="Last name">
														
														</div>
														<div class="form-group">
															<label for="inputUsername">Username</label>
															<input type="text" class="form-control" value="<?php echo @$users['address'] ?> " name="address" placeholder="Address" disabled>
																
														</div>
														
														<div class="form-group">
															<label >Email</label>
													<input type="email" class="form-control" name="email" value="<?php echo @$users['email'] ?>" placeholder="Email" disabled>
													
														</div>
														<div class="form-group">
															<label >Reasons</label>
													<input type="email" class="form-control" name="email" value="<?php echo @$users['reasons'] ?>" placeholder="Reasons" disabled>
													
														</div>
														<div class="form-group">
															<label>Sign in Time</label>
															<a class="btn btn-success form-control text-light">
															<span class="btn-label">
																
																<?php echo @$users['sign_in_time'] ?>
															</span>
															
														</a>
														</div>
														<div class="form-group">
															<label>Sign Out Time</label>
															<a class="btn btn-primary form-control text-light">
															<span class="btn-label">
																<?php if ($users['sign_out_time'] == ''): ?>
																	Visitor Not Signed out
																<?php else: echo $users['sign_out_time'] ?>

																<?php endif ?>
																
																
															</span>
															
														</a>
														</div>
														
														
														
													</div>
													<div class="col-md-4">
														<div class="text-center">
															<img alt="Charles Hall" id="changes" src="../<?php echo @$users['image'] ?>"  class="rounded-circle img-responsive mt-2" wnameth="128" width="128" height="128" />
															<!-- <div class="mt-2">
																<input type="file" name="profile_pics" id="profile_pics" hidden>
																<p id="text"></p>
																<span class="btn btn-primary" id="clickme"><i class="fas fa-upload"></i> Upload</span>
							

															</div> -->
															
															<p>
															
                  												</p>
														</div>
													</div>
												</div>

													
												</div>
												<?php endforeach; ?>	
												
                                		
													<div class="row ">
														<div class="col text-center mb-3">
															<a href="visitors.blade.php" name="update" class="btn btn-primary">
																<i class="fa flaticon-left-arrow"></i>
															Back</a>
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
			<?php endif ?>
	</div>
</div>


  <?php 
require 'includes/pop_up.blade.php';
require 'includes/table_scripts.blade.php';
 ?>