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
										<h4 class="card-title">View Visitor's</h4>
										
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
													
													
													<th>Phone</th>
													<th>Address</th>
													
													
													<th>Signin Date</th>
													<th>Signout Date</th>
													
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<!-- <th>S/N</th> -->
													<th>User</th>
                           							<th>Name</th>
													<th>Phone</th>
													<th>Address</th>
													
													<th>Signin Date</th>
													<th>Signout Date</th>
													
													<th>Action</th>
												</tr>
											</tfoot>
											<tbody>
										<?php if (count($user->GetVisitors())): ?>
											
										
										<?php foreach($user->GetVisitors() as $users): ?>
										<tr>
											<td class="py-1">
				                             <img src="<?php echo '../'.$users['image']; ?>" class=" rounded-circle" height="50" alt="image"/>
				                             </td>
											<td><?php echo @$users['full_name']; ?></td>
											<td><?php echo @$users['phone']; ?></td>
											<td><?php echo @$users['address']; ?></td>
											
											<td><span class="badge badge-danger"><?php echo @$users['sign_in_time']; ?>	</span></td>
											<td>
												<?php if ($users['sign_out_time'] == ''): ?>
													<span class="badge badge-primary">
													Visitor Not Signed out
												<?php else: echo "<span class='badge badge-danger'>", $users['sign_out_time']; ?>


												<?php endif ?>
											 </span></td>
											<td>
												
													<a type="button"  href="visitor_view.blade.php?id_no=<?php echo $users['id_no'] ?>" data-toggle="tooltip" title="" class="btn btn-link btn-success" data-original-title="View">
														<i class="fa fa-ellipsis-h"></i>
													</a>
													<a  href="#" onclick="signin('<?php echo $users['id_no']; ?>')" data-toggle="tooltip" role="button" title="" class="btn btn-link btn-primary" data-original-title="Print Badge">
														<i class="fa fa-print"></i>
													</a>
													
													<?php if ($_SESSION['uname']  == 'admin'): ?>
														
													
													<a type="button" href="../handlers/extra.handlers.php?id=<?php echo $users['id_no'] ?>" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Delete">
														<i class="fa fa-times"></i>
													</a>
												<?php endif ?>
											</td>
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


<?php 
require 'includes/pop_up.blade.php';
require 'includes/table_scripts.blade.php';
 ?>
 <script type="text/javascript">
 
		function signin(id) {
			windowObjectReference = window.open(
		    "../printer/print_visitor.php?id_no="+ id,
		    "DescriptiveWindowName",
		    "width=650,height=430,resizable,scrollbars,status"
  		);
		}
	
  </script>