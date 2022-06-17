<?php 
require 'require_files.php';
/* This file handles any little and small functionalities in a page */

// Delete Visitor Handler
if (isset($_GET['id'])) {
		$user->DeleteVisitor($_GET['id']);
		$_SESSION['successMsg'] = "visitor deleted successfully";
		header('location: ../admin/visitors.blade.php');
	}

// Delete User Handler
if (isset($_GET['user_id'])) {
		$user->DeleteUser($_GET['user_id']);
		$_SESSION['successMsg'] = "User deleted successfully";
		header('location: ../admin/users.blade.php');
	}

//Create New User to Handler Visitor Sign In
	if (isset($_POST['add'])) {
		extract($_POST);
		
		//check if Email or Username field is empty
		if (empty($uname) or empty($email) or empty($fname) or empty($lname) or empty($pword)) {
			$_SESSION['err_msg'] = "User Registration not Successful, Please Fill in all the Details.";
			header('location: ../admin/users.blade.php');
		}else{
		  $create = $user->AddUsers($fname,$lname,$uname,$email,md5($pword));

		if ($create === 'email taken') {
			$_SESSION['err_msg'] = "User Registration not Successful, <b>Email</b> has been taken.";
			header('location: ../admin/users.blade.php');
			
		} else if ($create === 'username taken') {
			$_SESSION['err_msg'] = "User Registration not Successful, <b>Username</b> has been taken.";
			header('location: ../admin/users.blade.php');
			
		}else{
			$_SESSION['successMsg'] = "User has been Registered Successful.";
			header('location: ../admin/users.blade.php');
			
		}
		}
		
	}

	
 ?>
 