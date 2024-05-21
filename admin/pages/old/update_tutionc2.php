<?php
ob_start();
session_start();
//error_reporting(0);
if(!$_SESSION['u']){
	header('location:login.php');
	}
include("config/connection.php");
?>
<?php
//if(isset($_POST['post1']))
//{
	$id = $_POST['id'];
	
	$cat_name = $_POST['cat_name'];
	
	$sub_name = mysqli_real_escape_string($con,$_POST['sub_name']);
	
	mysqli_query($con,"UPDATE `tutioncat2_tb` SET `cat_name`='$cat_name',`sub_name`='$sub_name' WHERE id='$id' ");
	
	header("Location:add_tutionc2.php?uu=1");
//}
?>
<?php
ob_flush();
?>