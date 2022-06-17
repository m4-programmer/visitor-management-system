<?php 
require 'require_files.php';
print_r($_POST);



if (isset($_POST['update'])) {
    extract($_POST);
    $files = User::FileHandler('profile_pics');
 
     $user->update_profile($fname,$lname,$files);   

     $_SESSION['successMsg']  = "Profile Updated Successfully";
     header("location: ../admin/profiles.blade.php");
  
}
 ?>