<?php 
require 'require_files.php';
if (isset($_POST['c_pword'])) {

	extract($_POST);
	
	//check if password matches confirm password
	if ($password !== $password_confirmation) {
		$_SESSION['err_msg'] = "password_confirmation does not match the inputed password";
		header('location: ../admin/change_password.blade.php');
	}
	//check if old password matches password in Db
	else if ($user->fetch_password(md5($inputPasswordCurrent)) == false) {
		$_SESSION['err_msg'] = "Current Pasword is incorrect.";
		header('location: ../admin/change_password.blade.php');
	}else{
		$user->change_password(md5($password),md5($inputPasswordCurrent));
		$_SESSION['successMsg'] = "Pasword changed successfully.";
		header('location: ../admin/change_password.blade.php');
	}
}


	?>
	