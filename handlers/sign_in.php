
<?php 
require 'require_files.php';

if (isset($_POST['sign_in'])) {
	extract($_POST);
	// CHECK THAT IMAGE IS NOT EMPTY
	if (empty($image)) {
		return header("location: ../sign_in.php?err_msg= Sign in Not Successful, Please Take User Image");
	}// if image is not empty then tr an sign in user
	else{
		// move user image to our directory
		$img = $_POST['image'];
		$file = upload_image($img);
		echo ($file);
  
     
	// before user is signed below, we upload his image to our system. which is done in the function above
	$signin = $user->sign_in($full_name,$email,$phone,$address,$message,$file);

	if ($signin == true) {
		// get Registered Visitor Generated Id;
		$id  = $_SESSION['latest_sign_in_visitors'];
		 return header('location: ../sign_in.php?msg=User Signed in Successfully&id='.$id);
		}
	}
}else{
	return header("location: ../sign_in.php?err_msg= Please fill in Visitors Details");
}

function upload_image($img)
{
	$folderPath = "visitorsImages/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
  
    $file = $folderPath . $fileName;
    file_put_contents('../'.$file, $image_base64);
    return $file;
}
 ?>