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
$q = "select * from cinternreg_tb where id='$id' ";
$run = mysqli_query($con,$q);
while($row = mysqli_fetch_array($run)){
$id = $row['id'];
$orgname = $row['orgname'];
$email = $row['email'];
$path = $row['img_path'];
$cpassword = $row['cpassword'];
$current_city = $row['current_city'];
$current_state = $row['current_state'];
$fname = $row['fname'];
$lname = $row['lname'];
$mobile = $row['mobile'];
$mobile2 = $row['mobile2'];
$mobile3 = $row['mobile3'];
$cwebsite = $row['cwebsite'];
}

?>
<?php

if(isset($_POST['post']))
{
    $orgname = mysqli_real_escape_string($con,$_POST['orgname']);
    $email = $_POST['email'];
    $cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);	
    $fname = mysqli_real_escape_string($con,$_POST['fname']);	
    $lname = mysqli_real_escape_string($con,$_POST['lname']);	
	$current_city = mysqli_real_escape_string($con,$_POST['current_city']);	
    $current_state = mysqli_real_escape_string($con,$_POST['current_state']);	
    $mobile = $_POST['mobile'];
    $mobile2 = $_POST['mobile2'];
    $mobile3 = $_POST['mobile3'];
    $cwebsite = mysqli_real_escape_string($con,$_POST['cwebsite']);	
	
	if (!empty($_FILES['image']['name'])) {
		$img_name = uniqid() . '_' . $_FILES['image']['name'];
		$img_tmp = $_FILES['image']['tmp_name'];
		$img_size = $_FILES['image']['size'];

		// Check file type
		$allowed_extensions = array('jpg', 'jpeg', 'png', 'jfif');
		$file_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

		if (!in_array($file_extension, $allowed_extensions)) {
			echo "<script>alert('Error: Only JPG, JPEG, PNG, and JFIF file types are allowed.');</script>";
			exit();
		}

		// Check file size (1 MB limit)
		$max_file_size = 1 * 1024 * 1024; // 1 MB in bytes
		if ($img_size > $max_file_size) {
			echo "<script>alert('Error: File size must be less than 1 MB.');</script>";
			exit();
		}

		// Move uploaded image to a folder
		move_uploaded_file($img_tmp, "upload/$img_name");

		// Remove old image if a new one is uploaded
		if (!empty($path) && file_exists("upload/$path")) {
			unlink("upload/$path");
		}

		
		mysqli_query($con,"UPDATE `cinternreg_tb` SET  `orgname`='".$orgname."',`img_path`='".$img_name."',`email`='".$email."',`fname`='".$fname."',`lname`='".$lname."',`current_city`='".$current_city."',`current_state`='".$current_state."',`mobile`='".$mobile."',`mobile2`='".$mobile2."',`mobile3`='".$mobile3."',`cwebsite`='".$cwebsite."' WHERE id='$id' ");
		header("location:viewintern_regcompany.php?u=1");
	//echo "<span style='color:red;font-size:25px;'>Register Company Successfully Updated</span>";
	} else {
		// Update data without changing the image
		mysqli_query($con,"UPDATE `cinternreg_tb` SET  `orgname`='".$orgname."',`email`='".$email."',`fname`='".$fname."',`lname`='".$lname."',`current_city`='".$current_city."',`current_state`='".$current_state."',`mobile`='".$mobile."',`mobile2`='".$mobile2."',`mobile3`='".$mobile3."',`cwebsite`='".$cwebsite."' WHERE id='$id' ");
		header("location:viewintern_regcompany.php?u=1");
	//echo "<span style='color:red;font-size:25px;'>Register Company Successfully Updated</span>";
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
	.s-color{
		color:red;
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
						<h1 class="font-weight-bold mt-5" style="font-size:20px;"><font class="font-1">Update</font><font class="font-2">&nbsp;Internship Registered Company</font></h1>
						<p>Internship Time</p>
					</div>
				</div>
				<!--./head-->
				<div class="col-lg-12 col-xl-12">
					<div class="box-1">
						<div class="box-2">
							<h6 class="text-1">Info : Registered Company</h6> <hr>
							<div class="box-3"><a href="viewintern_company_details.php?id=<?php echo $id;?>" class="btn btn-primary">Back</a>
								<form action="" method="post" enctype="multipart/form-data" autocomplete="off" >
									<div class="col-lg-12">
										<div class="form-group ">
											<label>Organization Name<span class="s-color"> *</span></label>
											<input class="form-control tt" type="text" name="orgname" value="<?php echo $orgname;?>" required="required" readonly />
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Official Email Id<span class="s-color"> *</span></label>
											<input class="form-control tt" type="email" name="email"  value="<?php echo $email;?>" placeholder="name@company_name.com" id="email" style="width: 97%;" onchange="emailchk()"  readonly />
											<p id="alert"> </p>
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Official Logo<span class="s-color"> *</span></label>
											<input class="tt" type="file" autofocus name="image" accept=".jpeg, .jpg, .png, .jfif" />
            <img src="upload/<?php echo $path; ?>" height="200px" width="200px">
											<p id="alert"> </p>
										</div><!--form-group-->
									</div>
									<!--<div class="col-lg-12">
										<div class="form-group ">
										<label>Password</label>
											<input class="form-control tt" type="password" name="cpassword" value="<?php echo $cpassword;?>" required="required" id="myInput" />
											<input type="checkbox" onclick="myFunction()" style="width:5%;">&nbsp;<strong style="color:#000;"><b>Show Password</b></strong>
										</div><!--form-group-->
									<!--</div>-->
									<div class="clearfix"></div>
									<div class="col-lg-6">
										<div class="form-group ">
										<label>First Name<span class="s-color"> *</span></label>
											<input class="form-control tt" type="text" name="fname" value="<?php echo $fname;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Last Name<span class="s-color"> *</span></label>
											<input class="form-control tt" type="text" name="lname" value="<?php echo $lname;?>" required="required" />
										</div><!--form-group-->
									</div>
										<div class="col-lg-6">
										<div class="form-group ">
										<label>Current City<span class="s-color"> *</span></label>
											<select class="form-control" type="text" id ="state" name="current_city" value="<?php echo $current_city;?>" required="required" />
											   <option value="<?php echo $current_city ;?>"><?php echo $current_city ;?></option></select>
											   <script language="javascript">print_state("sts");</script>
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
										<label>Current State<span class="s-color"> *</span></label>
											 <select class="form-control" type="text" onchange="print_city('state', this.selectedIndex);" id="sts" name="current_state"  required="required" />
                                         <option value="<?php echo $current_state ;?>"><?php echo $current_state ;?></option>
										 <option value="Andaman & Nicobar">Andaman & Nicobar</option>
										 <option value="Andhra Pradesh">Andhra Pradesh</option>
										 <option value="Arunachal Pradesh">Arunachal Pradesh</option>
										 <option value="Assam">Assam</option>
										 <option value="Bihar">Bihar</option>
										 <option value="Chandigarh">Chandigarh</option>
										 <option value="Chhattisgarh">Chhattisgarh</option>
										 <option value="Dadra & Nagar Haveli">Dadra & Nagar Haveli</option>
										 <option value="Daman & Diu">Daman & Diu</option>
										 <option value="Delhi">Delhi</option>
										 <option value="Goa">Goa</option>
										 <option value="Gujarat">Gujarat</option>
										 <option value="Haryana">Haryana</option>
										 <option value="Himachal Pradesh">Himachal Pradesh</option>
										 <option value="Jammu & Kashmir">Jammu & Kashmir</option>
										 <option value="Jharkhand">Jharkhand</option>
										 <option value="Karnataka">Karnataka</option>
										 <option value="Kerala">Kerala</option>
										 <option value="Lakshadweep">Lakshadweep</option>
										 <option value="Madhya Pradesh">Madhya Pradesh</option>
										 <option value="Maharashtra">Maharashtra</option>
										 <option value="Manipur">Manipur</option>
										 <option value="Meghalaya">Meghalaya</option>
										 <option value="Mizoram">Mizoram</option>
										 <option value="Nagaland">Nagaland</option>
										 <option value="Orissa">Orissa</option>
										 <option value="Pondicherry">Pondicherry</option>
										 <option value="Punjab">Punjab</option>
										 <option value="Rajasthan">Rajasthan</option>
										 <option value="Sikkim">Sikkim</option>
										 <option value="Tamil Nadu">Tamil Nadu</option>
										 <option value="Tripura">Tripura</option>
										 <option value="Uttar Pradesh">Uttar Pradesh</option>
										 <option value="Uttarakhand">Uttarakhand</option>
										 <option value="West Bengal">West Bengal</option></select>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12">
										<div class="form-group ">
											<label>Mobile Number.1<span class="s-color"> *</span></label>
											<input class="form-control tt" type="text" name="mobile" id="mob1" onchange="noalpha1()" value="<?php echo $mobile;?>" required="required" required size="10" minlength="10" maxlength="10" title="Error Message" pattern="[1-9]{1}[0-9]{9}"/>
											<p id="alert1"> </p>	
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12">
										<div class="form-group ">
											<label>Mobile Number.2</label>
											<input class="form-control tt" type="text" name="mobile2" id="mob2" onchange="noalpha2()" value="<?php echo $mobile2;?>"  size="10" minlength="10" maxlength="10" title="Error Message" pattern="[1-9]{1}[0-9]{9}"/>
											<p id="alert2"> </p>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12">
										<div class="form-group ">
											<label>Mobile Number.3</label>
											<input class="form-control tt" type="text" name="mobile3" id="mob3" onchange="noalpha3()" value="<?php echo $mobile3;?>"  size="10" minlength="10" maxlength="10" title="Error Message" pattern="[1-9]{1}[0-9]{9}"/>
											<p id="alert3"> </p>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12">
										<div class="form-group ">
											<label>Company Website<span class="s-color"> *</span></label>
											<input class="form-control tt" type="text" name="cwebsite" value="<?php echo $cwebsite;?>" />
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
  <script>
				function emailchk(){
					var email = document.getElementById("email").value;
					if ((( /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email))==1) || email=="")
						  {
							document.getElementById("alert").innerHTML="";
							return (true);
						  }
					else if (( /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email))==0){
							document.getElementById("alert").innerHTML ="You have entered an invalid email address!";
							document.getElementById("alert").style.color="red";
							return(false);
						}
				}
	  </script>
  <script>
		function myFunction1() {
			var x = document.getElementById("myInput");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
		</script>
		<script>
		function noalpha1()
		{
			var w = document.getElementById("mob1").value;
			var phoneno1 =  /^[1-9]{1}[0-9]{9}$/;
		 if (phoneno1.test(w)) {
				document.getElementById("alert1").innerHTML="";
				return;
		 }
		 else{
				document.getElementById("alert1").innerHTML="Please enter valid mobile number.";
				document.getElementById("alert1").style.color="red";
				return;
		 }
		}
		
		 function noalpha2(){ 
		 var y = document.getElementById("mob2").value;
			var phoneno2 =  /^[1-9]{1}[0-9]{9}$/;
		 if (phoneno2.test(y) || y=="") {
				document.getElementById("alert2").innerHTML="";
				return;
		 }
		 else{
				document.getElementById("alert2").innerHTML="Please enter valid mobile number.";
				document.getElementById("alert2").style.color="red";
				return;
		 }
		 }
		 
		 function noalpha3(){
		 var z = document.getElementById("mob3").value;
			var phoneno3 =  /^[1-9]{1}[0-9]{9}$/;
		 if (phoneno3.test(z) || z=="") {
				document.getElementById("alert3").innerHTML="";
				return;
		 }
		 else{
				document.getElementById("alert3").innerHTML="Please enter valid mobile number.";
				document.getElementById("alert3").style.color="red";
				return;
		 }
		}
	  </script>
  </script>

</body>

</html>
 <?php
 ob_flush();
 ?>
