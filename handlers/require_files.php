<?php 
@session_start();
require '../classes/Db.php';
require '../classes/User.php';
require '../classes/admin.php';

$user = new User;
$admin = new Admin;
 ?>