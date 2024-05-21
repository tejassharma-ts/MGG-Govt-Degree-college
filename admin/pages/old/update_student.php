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
$q = "select * from sreg_tb where id='$id' ";
$run = mysqli_query($con,$q);
while($row = mysqli_fetch_array($run)){
$id = $row['id'];
$name = $row['name'];
$fname = $row['fname'];
$phone = $row['phone'];
$email = $row['email'];
$gender = $row['gender'];
$state = $row['state'];
$city = $row['city'];
$tution_cat = $row['tution_cat'];
$intern_cat = $row['intern_cat'];
$hobby_cat = $row['hobby_cat'];
$job_cat = $row['job_cat'];
$address = $row['address'];
}
?>
<?php

if(isset($_POST['post']))
{
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$fname = mysqli_real_escape_string($con,$_POST['fname']);
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$stt = $_POST['stt'];
	$city = $_POST['city'];
	$tution_cat = $_POST['tution_cat'];
	$intern_cat = $_POST['intern_cat'];
	$hobby_cat = $_POST['hobby_cat'];
	$job_cat = $_POST['job_cat'];
	$address = mysqli_real_escape_string($con,$_POST['address']);
	
	mysqli_query($con,"UPDATE `sreg_tb` SET  `name`='".$name."',`fname`='".$fname."',`phone`='".$phone."',`email`='".$email."',`gender`='".$gender."',`state`='".$stt."',`city`='".$city."',`tution_cat`='".$tution_cat."',`intern_cat`='".$intern_cat."',`hobby_cat`='".$hobby_cat."',`job_cat`='".$job_cat."',`address`='".$address."' WHERE id='$id' ");
	
	header("location:view_student.php?a=1");
	//echo "<span style='color:red;font-size:25px;'>Register Student Updated Successfully Updated</span>";

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
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
						<h1 class="font-weight-bold" style="font-size:20px;"><font class="font-1">Update</font><font class="font-2">&nbsp;Registered Student</font></h1>
						<p>VellaPantii</p>
					</div>
				</div>
				<!--./head-->
				<div class="col-lg-12 col-xl-12">
					<div class="box-1">
						<div class="box-2">
							<h6 class="text-1">Info : Registered Student</h6> <hr>
							<div class="box-3">
								<form action="" method="post" enctype="multipart/form-data" autocomplete="off" >
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Name</label>
											<input class="form-control tt" type="text" name="name" value="<?php echo $name;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Father Name</label>
											<input class="form-control tt" type="text" name="fname" value="<?php echo $fname;?>" required="required" />
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
										<label>Email</label>
											<input class="form-control tt" type="email" name="email" value="<?php echo $email;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label class="control-label" style="color:#000;" >Gender</label>
											<select name="gender" class="form-control tt2" style="width: 98%;" >
												<option value="<?php echo $gender;?>"><?php echo $gender;?></option>
												<option value="">Select Gender</option>
												<option value="Male">Male</option>
												<option value="Female">Female</option>
											</select>
										</div><!--form-group-->
									</div>
									<div class="col-lg-4">

										<div class="form-group ">

											<label class="control-label">State Name</label>

											<select onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt" class="form-control tt2" >

											<option value="<?php echo $stt; ?>"><?php echo $stt; ?></option></select>

										</div><!--form-group-->

									</div>

									<div class="col-lg-4">

										<div class="form-group ">

											<label class="control-label">City Name</label>

											<select id ="state" class="form-control tt2" name="city">

											<option value="<?php echo $city; ?>"><?php echo $city; ?></option></select>

											<script language="javascript">print_state("sts");</script>

										</div><!--form-group-->

									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12">
										<div class="form-group ">
											<label>Address</label>
											<textarea class="form-control tt" type="text" name="address" required="required" style="" ><?php echo $address; ?></textarea>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									
									<div class="clearfix"></div>
									<div class="col-lg-12 reg-btn mb-4">
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
