<?php 
require 'require_files.php';
print_r($_POST);

	if (isset($_POST['login'])) {
		extract($_POST);
		if (empty($uname) or empty($pword)) {
			$_SESSION['err_msg'] = 'Please Fill in Your Username and Password';
			header('location: ../admin/');
		}
		// sign in User and Set his/her session
		$login = User::login($uname,md5($pword));
		// if user exist and the login details are complete do the following
		if ($login == true) {
			$_SESSION['successMsg'] = "Welcome $uname to Your Dashboard";
			header('location: ../admin/dashboard.blade.php');
		}else{
			$_SESSION['err_msg'] = 'Incorrect Username or Password';
			header('location: ../admin/');
		}
	}else{
		header('location: ../admin/');
	}
 ?>