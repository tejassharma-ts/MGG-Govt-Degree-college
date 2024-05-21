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
	
	$intren_name = mysqli_real_escape_string($con,$_POST['intren_name']);	
	
	mysqli_query($con,"UPDATE `interncat_tb` SET `intren_name`='$intren_name' WHERE id='$id' ");
	
	header("Location:add_internc.php?uu=1");
//}
?>
<?php
ob_flush();
?>