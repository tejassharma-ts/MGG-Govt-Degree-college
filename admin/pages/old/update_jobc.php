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
if(isset($_POST['submit']))
{
	$id = $_POST['id'];
	
	$jobcat_name = $_POST['jobcat_name'];	
	//$jobcat_name = mysqli_real_escape_string($con,$_POST['jobcat_name']);	
	
	mysqli_query($con,"UPDATE `hobbycat_tb` SET `jobcat_name`='$jobcat_name' WHERE id='$id' ");
	
	header("Location:add_jobc.php?uu=1");
}
?>
<?php
ob_flush();
?>