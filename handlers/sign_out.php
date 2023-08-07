<?php 
require 'require_files.php';
if (isset($_POST['sign_out'])) {
	extract($_POST);
	if (empty($id)) {
		header("location: ../sign_out.php?err_msg=Please input Visitor Id to continue sign out");
	}
	else{
		$check_id_no = $user->sign_out_user($id);
		if ($check_id_no == false) {
			header("location: ../sign_out.php?err_msg=Incorrect Visitor Id please check the Id");
		}else if (strlen($check_id_no) > 5)//because true and false are < than 5 in length
		 {
			header("location: ../sign_out.php?err_msg=Vehicle has already sign_out at $check_id_no");
		}
		else {
			header("location: ../sign_out.php?successMsg=Vehicle Signed out successfully");
		}
	}
}
 ?>