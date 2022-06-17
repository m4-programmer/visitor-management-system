<?php
	
	require 'includes/admin_header.blade.php';
	require 'includes/admin_navbar.blade.php';
	require 'includes/admin_sidebar.blade.php';
	require 'includes/admin_scripts.blade.php';
  ?>


<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Admin Dashboard</h2>
								<h5 class="text-white op-7 mb-2">Visitor Management System</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-12">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Overall statistics</div>
									<div class="card-category">overall information about statistics in system</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Total Visitor's</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Today Signin Visitor's</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Today Signed Out Visitor's</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-4"></div>
											<h6 class="fw-bold mt-3 mb-0">Total System User's</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<?php 

		// total signin Visitor's in the system is done here
		$totalVisitors = count($user->fetch_sign_in());
		//total Users in the system is done here
		$totalUsers = count($user->GetUsers());
		//Today Sign In Visitors
		$today = date('Y-m-d');
		$todayVisitors = $user->GetTodayVisitors($today);
		$todaySignOutVisitor = $user->GetTodayVisitors($today,true);
		$todaySignOutVisitorsTotal = $todaySignOutVisitor[0]['total'];
		
		$todayVisitorsTotal =  $todayVisitors[0]['total'];
		 ?>
					
				</div>
			</div>
			
		</div>

		<script>
	$(document).ready(function () {
		// body...
	
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: <?php if ($totalVisitors > 0 ){echo $totalVisitors.',';} else{ ?> '0',<?php }  ?>
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: <?php if ($todayVisitorsTotal > 0 ){echo $todayVisitorsTotal.',';} else{ ?> '0',<?php }  ?>
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: <?php if ($todaySignOutVisitorsTotal > 0 ){echo $todaySignOutVisitorsTotal.',';} else{ ?> '0',<?php }  ?>
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		
	})	
			Circles.create({
			id:'circles-4',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: <?php if ($totalUsers > 0 ){echo $totalUsers.',';} else{ ?> '0',<?php }  ?>
			colors:['#f1f1f1', '#Faa961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		
	})	
		})

	</script>



<?php 
require 'includes/pop_up.blade.php';
require 'includes/table_scripts.blade.php';
 ?>