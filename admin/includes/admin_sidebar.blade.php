<!-- Sidebar --> -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../<?php echo $user->GetImage(); ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<!-- Checks if the user logged in is an admin by checking that his rank is 1 -->
									<?php if ($user->fetchProfileDetails()[0]['rank'] == 1): ?>
									<span class="user-level">Administrator</span>
									<?php else: ?>
										<span class="user-level">Worker</span>
									<?php endif ?>
									
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										
										<a  href="profiles.blade.php">
										
											<span class="link-collapse">My Profile</span>
										</a>
											
										<a  href="change_password.blade.php">
										
										<span class="link-collapse">My Password</span>
										</a>
										
									</li>
									
									
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							
							<a  href="dashboard.blade.php" >
							
								<i class="fas fa-home"></i>
								
								<p>Dashboard</p>
								
								
							</a>
							
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						
						<!-- Admin sidebar 1 -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Manage Users</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="users.blade.php">
											<span class="sub-item">User List</span>
										</a>
									</li>					
								</ul>
							</div>
						</li>
						<li class="nav-item ">
							<a  href="visitors.blade.php" >
								<i class="fas fa-book"></i>
								
								<p>Visitor's List</p>
								
								
							</a>
							
						</li>
						<li class="nav-item ">
							<a  href="../sign_in.php" >
								<i class="fas fa-pen"></i>
								
								<p>Signin New Visitor</p>
								
								
							</a>
							
						</li><!-- 
						<li class="nav-item ">
							<a  href="settings.blade.php" >
								<i class="fas fa-user"></i>
								
								<p>System Settings</p>
								
								
							</a>
							
						</li> -->
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar