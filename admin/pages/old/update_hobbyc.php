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
	
	$hobby_name = mysqli_real_escape_string($con,$_POST['hobby_name']);	
	
	mysqli_query($con,"UPDATE `hobbycat_tb` SET `hobby_name`='$hobby_name' WHERE id='$id' ");
	
	header("Location:add_hobbyc.php?uu=1");
//}
?>
<?php
ob_flush();
?>