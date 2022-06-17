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
						<a href="change_password.blade.php">Change Password</a>
					</li>
				</ul>
			</div>

					<!-- Add courses content -->
			<div class="col-md-12">
				<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>

											<form action="../handlers/c_pword.php " method="post">
                                            
                        
                                                <div class="form-group">
                                                    <label for="inputPasswordCurrent">Current password</label>
                                                    <input type="password" class="form-control" name="inputPasswordCurrent">
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPasswordNew">New password</label>
                                                    <input type="password" class="form-control" name="password">
                                                     
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPasswordNew2">Verify password</label>
                                                    <input type="password" class="form-control" name="password_confirmation">
                                                  
                                                </div>
                                                
                                            
                                                <div class="row ">
                                                    <div class="col text-center mb-3">
                                                        <button type="submit" name="c_pword" class="btn btn-primary">Change Password</button>
                                                        
                                                    </div>
                                            </form>
                                            
										</div>
									</div>
								</div>
								

				


	  
<?php 
require 'includes/pop_up.blade.php';
require 'includes/table_scripts.blade.php';
 ?>