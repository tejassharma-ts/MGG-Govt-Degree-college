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

if(isset($_POST['post']))
{
	$cname = mysqli_real_escape_string($con,$_POST['cname']);
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$cperson = mysqli_real_escape_string($con,$_POST['cperson']);
	$state = $_POST['stt'];
	$city = $_POST['city'];
	$caddress = mysqli_real_escape_string($con,$_POST['caddress']);
	$cusername = mysqli_real_escape_string($con,$_POST['cusername']);
	$cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);
	
	$hot = "0";
	
	$query = "Select *  From `creg_tb` WHERE email = '$email' ";
	$count = mysqli_query($con, $query);
	$row = mysqli_num_rows($count);
	if($row>0)
	{
		 echo "<script>alert('This User Allready Exist In DB')</script>";
	}
	
	else
	{
		mysqli_query($con,"insert into `creg_tb`( `id`,`cname`,`email`,`phone`,`cperson`,`state`,`city`,`caddress`,`cusername`,`cpassword`,`date`,`hot`) values (NULL,'$cname','$email','$phone','$cperson','$state','$city','$caddress','$cusername','$cpassword',NOW(),'$hot')");

		//header("location:company_reg.php?a=1");
		echo "<span style='color:red;font-size:25px;'>Company Successfully Registered</span>";
		exit();
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Simple Sidebar - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
						<h1 class="font-weight-bold mt-5"><font class="font-1">View</font><font class="font-2">&nbsp;Registered Company</font></h1>
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
											<input class="form-control" type="text" name="cname" placeholder="Enter Company Name" required="required" />
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
										<label>Email</label>
											<input class="form-control" type="email" name="email" placeholder="Enter Email Id" required="required" />
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Phone No.</label>
											<input class="form-control" type="text" name="phone" placeholder="Enter Phone No." required="required" />
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Contact Person</label>
											<input class="form-control" type="text" name="cperson" placeholder="Enter Contact Person" required="required" />
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label class="control-label">State Name</label>
											<select onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt" class="form-control"></select>
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label class="control-label">City Name</label>
											<select id ="state" class="form-control" name="city">
											<option value="">Select City</option></select>
											<script language="javascript">print_state("sts");</script>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12">
										<div class="form-group ">
											<label>Company Address</label>
											<textarea class="form-control" type="text" name="caddress" placeholder="Enter Company Address" required="required" style="" ></textarea>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Username</label>
											<input class="form-control" type="text" name="cusername" placeholder="Enter Company Username" required="required" />
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
										<label>Password</label>
											<input class="form-control" type="text" name="cpassword" placeholder="Enter Company Password" required="required" />
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12 reg-btn">
										<button type="submit" name="post" class="btn btn-danger">REGISTER</button>
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
