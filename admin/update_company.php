<?php
ob_start();
session_start();
error_reporting(0);
if(!$_SESSION['u']){
	header('location:login.php');
	}
include("config/connection.php");
?>
<?php 
$id = $_GET['id'];
$q = "select * from creg_tb where id='$id' ";
$run = mysqli_query($con,$q);
while($_row = mysqli_fetch_array($run)){
$id = $_row['id'];
$cname = $_row['cname'];
$cat_name = $_row['cat_name'];
$phone = $_row['phone'];
$email = $_row['email'];
$cperson = $_row['cperson'];
$state = $_row['state'];
$city = $_row['city'];
$cusername = $_row['cusername'];
$cpassword = $_row['cpassword'];
$caddress = $_row['caddress'];
}

?>
<?php

if(isset($_POST['post']))
{
	$cname = mysqli_real_escape_string($con,$_POST['cname']);
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$cperson = mysqli_real_escape_string($con,$_POST['cperson']);
	$stt = $_POST['stt'];
	$city = $_POST['city'];
	$caddress = mysqli_real_escape_string($con,$_POST['caddress']);
	$cusername = mysqli_real_escape_string($con,$_POST['cusername']);
	$cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
	
	mysqli_query($con,"UPDATE `creg_tb` SET  `cname`='".$cname."',`email`='".$email."',`phone`='".$phone."',`cperson`='".$cperson."',`state`='".$stt."',`city`='".$city."',`caddress`='".$caddress."',`cusername`='".$cusername."',`cpassword`='".$cpassword."' WHERE id='$id' ");
	
	header("location:view_company.php?u=1");
	//echo "<span style='color:red;font-size:25px;'>Register Company Successfully Updated</span>";

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Panel</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  
  <!--custom css-->
  <link href="css/custom-1.css" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="js/cities.js"></script>
  <style>
  .text-1 {
		color: #fff;
		padding: 13px;
		border-top: 0px solid #227ab7;
		font-weight: 500;
		font-size: 13px;
		background: #337ab7;
		margin: 0;
	}
	.box-1 {
		border-top: 0px solid #4e73df;
		background: #fff;
	}
  </style> 
 <style>
 .tt{
	font-size: 14px !important;
	padding: 14px 0 14px 10px;
	}
.tt2{
	width: 102%;
    height: 45px;
    padding-left: 5px;    width: 102%;
    height: 45px;
    padding-left: 5px;
	}
  </style>
</head>

<body>

  <div class="d-flex" id="wrapper">

   <!-- Sidebar -->
	<?php include("include/sidebar.php");?>
    <!-- End of Sidebar -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

    <!-- Topbar -->
	<?php include("include/topbar.php");?>
	<!-- End of Topbar -->

      <!-- Begin Page Content -->
        <div class="container-fluid">
			<!--body-->
			<div class="row">
				<!--head-->
				<div class="col-lg-12 col-xl-12">
					<div class="">
						<h1 class="font-weight-bold mt-5" style="font-size:20px;"><font class="font-1">Update</font><font class="font-2">&nbsp;Registered Company</font></h1>
						<p>Internship Time</p>
					</div>
				</div>
				<!--./head-->
				<div class="col-lg-12 col-xl-12">
					<div class="box-1">
						<div class="box-2">
							<h6 class="text-1">Info : Registered Company</h6> <hr>
							<div class="box-3">
								<form action="" method="post" enctype="multipart/form-data" autocomplete="off" >
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Company Name</label>
											<input class="form-control tt" type="text" name="cname" value="<?php echo $cname;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
										<label>Email</label>
											<input class="form-control tt" type="email" name="email" value="<?php echo $email;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Phone No.</label>
											<input class="form-control tt" type="text" name="phone" value="<?php echo $phone;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Contact Person</label>
											<input class="form-control tt" type="text" name="cperson" value="<?php echo $cperson;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label class="control-label">State Name</label>
											<input type="text" value="<?php echo $state; ?>" class="form-control tt" readonly>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label class="control-label">State Name</label>
											<select onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt" class="form-control tt2" required >
											<option value="<?php echo $stt; ?>"><?php echo $stt; ?></option></select>
										</div><!--form-group-->
									</div>									<div class="col-lg-4">										<div class="form-group ">
											<label class="control-label">City Name</label>
											<select id ="state" class="form-control tt2" name="city">
											<option value="<?php echo $city; ?>"><?php echo $city; ?></option></select>
											<script language="javascript">print_state("sts");</script>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12">
										<div class="form-group ">
											<label>Company Address</label>
											<textarea class="form-control tt" type="text" name="caddress" required="required" style="" ><?php echo $caddress; ?></textarea>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Username</label>
											<input class="form-control tt" type="text" name="cusername" value="<?php echo $cusername; ?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
										<label>Password</label>
											<input class="form-control tt" type="text" name="cpassword" value="<?php echo $cpassword;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12 reg-btn mb-4">
										<button type="submit" name="post" class="btn btn-danger">UPDATE</button>
									</div>
									<div class="clearfix"></div>
								</form><!--form1-->
							<div class="clearfix"></div>
							<div class="col-lg-12 col-xl-12">						

							</div>
							</div>
						</div>
					</div>
				</div><!--6-->
			</div><!--row2-->
			<!--page matter-->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>


<?php
 if(isset($_GET['a'])){
 if($_GET['a']==1)
 {
 ?>
 <script>
 alert("Company is successfully Registered..");
 </script>
 <?php
 }
 }
 ob_flush();
 ?>
