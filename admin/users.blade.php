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
								<a href="users.blade.php">Users</a>
							</li>
						</ul>
					</div>
					<!-- to call up error log from modal using an alert box -->
					<!-- Table content Start-->
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="d-flex align-items-center">
										<h4 class="card-title">View User's</h4>
										<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Add User
										</button>
									</div>
								</div>
								<div class="card-body">
					
									<div class="table-responsive">
										<table id="add-row" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<!-- <th>S/N</th> -->
													<th> User</th>
													<th>Name</th>
													<th>Email</th>
													<th>Username</th>
													<th>Status</th>
													<th>Rank</th>
													<?php if ($_SESSION['uname']  == 'admin'): ?>
														<th style="width: 10%">Action</th>
														<?php endif ?>
													
												</tr>
											</thead>
											<tfoot>
												<tr>
													<!-- <th>S/N</th> -->
													<th> User</th>
                          
                           
													<th>Name</th>
													<th>Email</th>
													<th>Username</th>
													<th>Status</th>
													<th>Rank</th>
													<?php if ($_SESSION['uname']  == 'admin'): ?>
														<th>Action</th>
														<?php endif ?>
												</tr>
											</tfoot>
											<tbody>
												<?php if (count($user->GetUsers())): ?>
											
										
												<?php foreach($user->GetUsers() as $users): ?>

												
												<tr>
													<td class="py-1">
						                              <img src="../<?php echo @$users['img_profile']; ?>" class=" rounded-circle" height="50" alt="image"/>
						                             </td>
													<td><?php echo @$users['firstname'].' '.@$users['lastname']; ?></td>
													<td><?php echo @$users['email']; ?></td>
													<td><?php echo @$users['uname']; ?></td>
													<td><span class="badge badge-success">Active</span></td>
													<td><span class="badge badge-primary">User</span></td>
													<?php if ($_SESSION['uname']  == 'admin'): ?>
													<td>
														<div class="form-button-action">
															<a type="button" href="../handlers/extra.handlers.php?user_id=<?php echo $users['id'] ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove User">
																<i class="fa fa-times"></i>
															</a>
														</div>
													</td>
												<?php endif ?>
												</tr>
											<?php endforeach; ?>
													
												<?php endif ?>
												
											</tbody>
										</table>
										
										
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
				
		</div>

		<!-- Modal Content-->
									<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header no-bd">
													<h5 class="modal-title">
														<span class="fw-mediumbold">
														New</span> 
														<span class="fw-light">
															User
														</span>
													</h5>
													<button type="button" class="close" data-dismiss="modal" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
												</div>
												<div class="modal-body">
													<p class="small">Create a new user to handle Visitors Sign in System</p>
													<form method="POST" action="../handlers/extra.handlers.php" >
														
														<div class="row">
														
															<div class="col-md-6 pr-0">
																<div class="form-group form-group-default">
																	<label>First Name</label>
																	<input id="addEmail" name="fname" type="text" class="form-control" value="" placeholder="Enter First Name">
																</div>
															</div>
															<div class="col-md-6">
																<div class="form-group form-group-default">
																	<label>Last Name</label>
																	<input id="addUsername" name="lname" value="" type="text" class="form-control" placeholder="Enter Last Name">
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
													
												</div>
												<div class="modal-footer no-bd">
													<button type="submit" name="add" id="addRowButton" class="btn btn-primary">Add</button>
													<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
												</div>
												</form>
											</div>
										</div>
									</div>
<?php 
require 'includes/pop_up.blade.php';
require 'includes/table_scripts.blade.php';
 ?>