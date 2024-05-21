<?php
ob_start();
session_start();
error_reporting(0);
if (!$_SESSION['u']) {
	header('location:login.php');
}
include("config/connection.php");
?>
<?php
$id = $_GET['id'];
$q = "select * from studentreg_tb where id='$id' ";
$run = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($run)) {
	$id = $row['id'];
	$email = $row['email'];
	$spassword = $row['spassword'];
	$current_city = $row['current_city'];
	$current_state = $row['current_state'];
	$current_country = $row['current_country'];
	$path1 = $row['path1'];
	$fname = $row['fname'];
	$lname = $row['lname'];
	$college = $row['college'];
	$mobile = $row['mobile'];
	$qualify = $row['qualification'];
	$dob = $row['dob'];
	$premium = $row['premium'];

	
	$exp_years = $row['exp_years'];
	$exp_months = $row['exp_months'];
}

?>
<?php

if (isset($_POST['post'])) {
	$email = $_POST['email'];
	$spassword = mysqli_real_escape_string($con, $_POST['spassword']);

	$current_city = mysqli_real_escape_string($con, $_POST['current_city']);
	$current_state = mysqli_real_escape_string($con, $_POST['current_state']);
	$current_country = mysqli_real_escape_string($con, $_POST['current_country']);
	$fname = mysqli_real_escape_string($con, $_POST['fname']);
	$lname = mysqli_real_escape_string($con, $_POST['lname']);
	$college =  mysqli_real_escape_string($con, $_POST['college']);
	$exp_years = mysqli_real_escape_string($con, $_POST['exp_years']);
	$exp_months = mysqli_real_escape_string($con, $_POST['exp_months']);
	$mobile = $_POST['mobile'];
	$qualify = $_POST['qualify'];
	$dob = $_POST['dob'];
	$premium = $_POST['premium'];

	$target_folder = '../upload/';
	$upload_image = $target_folder . basename($_FILES['upload_file']['name']);
	if (move_uploaded_file($_FILES['upload_file']['tmp_name'], $upload_image)) {
		$temp = explode(".", $_FILES["upload_file"]["name"]);
		$newfilename = rand(1, 89768) . '.' . end($temp);
		$newname = mysqli_real_escape_string($con, strip_tags($newfilename));
		$actual1 = $target_folder . $newname . "";
		$actual = $newname;
		list($width, $height) = getimagesize($upload_image);
		$newwidth = 300;
		$newheight = 176;
		$thumb = imagecreatetruecolor($newwidth, $newheight);
		$source = imagecreatefromjpeg($upload_image);
		imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		rename($upload_image, $actual1);
	}
	if ($newfilename != '') {
		mysqli_query($con, "UPDATE `studentreg_tb` SET   `fname`='" . $fname . "', 
	`lname`='" . $lname . "', 
	`mobile`='" . $mobile . "', 

	`current_city`='" . $current_city . "', 
	" . (!empty($current_state) ? "`current_state`='" . $current_state . "', " : "") .
			" " . (!empty($current_country) && $current_country != -1 ? "`current_country`='" . $current_country . "', " : "") . "
	`college`='" . $college . "', 
	`path1`='" . $destination . "', 
	`qualification`='" . $qualify . "', 
	`dob`='" . $dob . "', 
	`exp_years`='" . $exp_years . "', 
	`exp_months`='" . $exp_months . "',
	`premium_acc`='" . $premium . "'


	WHERE id='$id'");
		echo "<script>window.location.href = 'viewjobc_regstudent.php?u=1';</script>";
	} else {
		mysqli_query($con, "UPDATE `studentreg_tb`  SET  
		`fname`='" . $fname . "', 
		`lname`='" . $lname . "', 
		`mobile`='" . $mobile . "', 
		`current_city`='" . $current_city . "', 
		" . (!empty($current_state) ? "`current_state`='" . $current_state . "', " : "") .
			" " . (!empty($current_country) && $current_country != -1 ? "`current_country`='" . $current_country . "', " : "") . "
		`college`='" . $college . "', 
		`path1`='" . $path1 . "', 
		`qualification`='" . $qualify . "', 
		`dob`='" . $dob . "', 
		`exp_years`='" . $exp_years . "', 
		`exp_months`='" . $exp_months . "',
		`premium_acc`='" . $premium . "' 

		WHERE id='$id'");
		echo "<script>window.location.href = 'viewjobc_regstudent.php?u=1';</script>";
	}

	//echo "<span style='color:red;font-size:25px;'>Register student Successfully Updated</span>";

}
?>
<?php include_once("include1/sidenav.php"); ?>
<div class="page-wrapper">
	<?php include_once("include1/header.php"); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-11 mb-5">
				<div class="left-news">
					<h1 class="font-weight-bold text-center">
						<font color="#146C94">&nbsp; Update registered company</font>
					</h1>

				</div>

				<div class="border border-top-3 border-danger">
					<div class="panel grey lighten-5 border ">
						<h6 class="font-weight-normal pt-1 pl-1">Info :update Internship Registered Company</h6>
						<p>InternshipTime</p>
						<hr>
						<div class="box-3"><a href="viewjobc_student_details.php?id=<?php echo $id; ?>" class="btn btn-primary">Back</a>
							<form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="row">
								<div class="col-lg-6">
									<div class="form-group ">
										<label>Email<span class="s-color"> *</span></label>
										<input class="form-control tt" type="email" name="email" value="<?php echo $email; ?>" placeholder="name@company_name.com" id="email" style="width: 97%;" onchange="emailchk()" required="required" />
										<p id="alert"> </p>
									</div><!--form-group-->
								</div>
								<div class="col-lg-6">
									<div class="form-group ">
										<label>Password<span class="s-color"> *</span></label>
										<input class="form-control tt" type="password" name="spassword" value="<?php echo $spassword; ?>" required="required" id="myInput" />
										<input type="checkbox" onclick="myFunction()" style="width:5%;">&nbsp;<strong style="color:#000;"><b>Show Password</b></strong>
									</div><!--form-group-->
								</div>

								<div class="col-lg-6">
									<div class="form-group ">
										<label>Current Country<span class="color">*</span></label>
										<select id="country" name="current_country" class="form-control " required>
										</select>
										<p class="text-danger fw-bold">
											Selected:<?php echo $current_country; ?></p>

									</div>
									<!--form-group-->
								</div>



								<div class="col-lg-6">
									<div class="form-group ">
										<label>Current State<span class="color">*</span></label>
										<select id="state" name="current_state" class="form-control ">

										</select>
										<p class="text-danger fw-bold">
											Selected:<?php echo $current_state; ?></p>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group ">
										<label>Current City<span class="color">*</span></label>
										<input class="form-control tt2" type="text" name="current_city" value="<?php echo $current_city; ?>" required="required">
									</div>
									<!--form-group-->
								</div>
								<div class="col-lg-6">
									<div class="form-group ">
										<label>Name of College<span class="color">*</span></label>
										<input class="form-control tt" type="text" name="college" id="college" value="<?php echo $college; ?>" required="required" title="Error Message">
										<p id="alert1"> </p>
									</div>
									<!--form-group-->
								</div>
								<div class="col-lg-6">
									<div class="form-group ">
										<label>First Name<span class="s-color"> *</span></label>
										<input class="form-control tt" type="text" name="fname" value="<?php echo $fname; ?>" required="required" readonly />
									</div><!--form-group-->
								</div>
								<div class="col-lg-6">
									<div class="form-group ">
										<label>Last Name<span class="s-color"> *</span></label>
										<input class="form-control tt" type="text" name="lname" value="<?php echo $lname; ?>" required="required" readonly />
									</div><!--form-group-->
								</div>
								<div class="col-lg-6">
									<div class="form-group ">
										<label>Mobile Number<span class="s-color"> *</span></label>
										<input class="form-control tt" type="text" name="mobile" id="mob1" onchange="noalpha1()" value="<?php echo $mobile; ?>" required="required" required size="10" minlength="10" maxlength="10" title="Error Message" pattern="[1-9]{1}[0-9]{9}" />
										<p id="alert1"> </p>
									</div><!--form-group-->
								</div>
								<div class="col-lg-6">
									<div class="form-group ">
										<label>Qualification<span class="s-color">*</span></label>
										<select name="qualify" id="qualify" class="form-control tt2" required="required">
											<option value="">Select Qualification</option>
											<option value="10th" <?php if ($qualify == '10th') echo "selected"; ?>>10th</option>
											<option value="12th" <?php if ($qualify == '12th') echo "selected"; ?>>12th</option>
											<option value="UG Course" disabled>UG Course</option>
											<option value="B.Arch" <?php if ($qualify == 'B.Arch') echo "selected"; ?>>B.Arch</option>
											<option value="B.Com" <?php if ($qualify == 'B.Com') echo "selected"; ?>>B.Com</option>
											<option value="B.Pharm" <?php if ($qualify == 'B.Pharm') echo "selected"; ?>>B.Pharm</option>
											<option value="BA" <?php if ($qualify == 'BA') echo "selected"; ?>>BA</option>
											<option value="BBA/BBM" <?php if ($qualify == 'BBA/BBM') echo "selected"; ?>>BBA/BBM</option>
											<option value="BCA" <?php if ($qualify == 'BCA') echo "selected"; ?>>BCA</option>
											<option value="BDS" <?php if ($qualify == 'BDS') echo "selected"; ?>>BDS</option>
											<option value="BE/B.Tech" <?php if ($qualify == 'BE/B.Tech') echo "selected"; ?>>BE/B.Tech</option>
											<option value="BEd" <?php if ($qualify == 'BEd') echo "selected"; ?>>BEd</option>
											<option value="BHM" <?php if ($qualify == 'BHM') echo "selected"; ?>>BHM</option>
											<option value="BSc" <?php if ($qualify == 'BSc') echo "selected"; ?>>BSc</option>
											<option value="BVSc" <?php if ($qualify == 'BVSc') echo "selected"; ?>>BVSc</option>
											<option value="CA" <?php if ($qualify == 'CA') echo "selected"; ?>>CA</option>
											<option value="CS" <?php if ($qualify == 'CS') echo "selected"; ?>>CS</option>
											<option value="ICWA" <?php if ($qualify == 'ICWA') echo "selected"; ?>>ICWA</option>
											<option value="LLB" <?php if ($qualify == 'LLB') echo "selected"; ?>>LLB</option>
											<option value="MBBS" <?php if ($qualify == 'MBBS') echo "selected"; ?>>MBBS</option>
											<option value="B.Design" <?php if ($qualify == 'B.Design') echo "selected"; ?>>B.Design</option>
											<option value="B.FashionTech" <?php if ($qualify == 'B.FashionTech') echo "selected"; ?>>B.FashionTech</option>
											<option value="BFA" <?php if ($qualify == 'BFA') echo "selected"; ?>>BFA</option>
											<option value="BHMS" <?php if ($qualify == 'BHMS') echo "selected"; ?>>BHMS</option>
											<option value="B.P.Ed" <?php if ($qualify == 'B.P.Ed') echo "selected"; ?>>B.P.Ed</option>
											<option value="B.F.Sc(Fisheries)" <?php if ($qualify == '') echo "selected"; ?>>B.F.Sc(Fisheries)</option>
											<option value="BSW" <?php if ($qualify == 'B.F.Sc(Fisheries)') echo "selected"; ?>>BSW</option>
											<option value="Other Graduate" <?php if ($qualify == 'Other Graduate') echo "selected"; ?>>Other Graduate</option>
											<option value="PG Course" disabled>PG Course</option>
											<option value="LLM" <?php if ($qualify == 'LLM') echo "selected"; ?>>LLM</option>
											<option value="M Phil/Ph.D" <?php if ($qualify == 'M Phil/Ph.D') echo "selected"; ?>>M Phil/Ph.D</option>
											<option value="M.Arch" <?php if ($qualify == 'M.Arch') echo "selected"; ?>>M.Arch</option>
											<option value="M.Com" <?php if ($qualify == 'M.Com') echo "selected"; ?>>M.Com</option>
											<option value="M.Pharm" <?php if ($qualify == 'M.Pharm') echo "selected"; ?>>M.Pharm</option>
											<option value="MA" <?php if ($qualify == 'MA') echo "selected"; ?>>MA</option>
											<option value="MBA/PGDM" <?php if ($qualify == 'MBA/PGDM') echo "selected"; ?>>MBA/PGDM</option>
											<option value="MCA" <?php if ($qualify == 'MCA') echo "selected"; ?>>MCA</option>
											<option value="MD" <?php if ($qualify == 'MD') echo "selected"; ?>>MD</option>
											<option value="MDS" <?php if ($qualify == 'MDS') echo "selected"; ?>>MDS</option>
											<option value="ME/M.Tech" <?php if ($qualify == 'ME/M.Tech') echo "selected"; ?>>ME/M.Tech</option>
											<option value="MEd" <?php if ($qualify == 'MEd') echo "selected"; ?>>MEd</option>
											<option value="MHM" <?php if ($qualify == 'MHM') echo "selected"; ?>>MHM</option>
											<option value="MSc" <?php if ($qualify == 'MSc') echo "selected"; ?>>MSc</option>
											<option value="MSW" <?php if ($qualify == 'MSW') echo "selected"; ?>>MSW</option>
											<option value="PG Diploma" <?php if ($qualify == 'PG Diploma') echo "selected"; ?>>PG Diploma</option>
											<option value="MV Sc" <?php if ($qualify == 'MV Sc') echo "selected"; ?>>MV Sc</option>
											<option value="MPEd" <?php if ($qualify == 'MPEd') echo "selected"; ?>>MPEd</option>
											<option value="M.F.Sc(Fisheries)" <?php if ($qualify == 'M.F.Sc(Fisheries)') echo "selected"; ?>>M.F.Sc(Fisheries)</option>
											<option value="Other PG" <?php if ($qualify == 'Other PG') echo "selected"; ?>>Other PG</option>
										</select>
										<?php //echo $qualifyErr; 
										?>
									</div>
									<!--form-group-->
								</div>
								<div class="col-lg-6">
									<label>Experience<span class="s-color">*</span></label>
									<div class="form-group" style="display:flex;">
										<select name="exp_years" class="form-control tt2" required="required">
											<option value="<?php echo $exp_years; ?>"><?php echo $exp_years; ?></option>
											<option value="">Select Years</option>
											<option value="0 years">0 years</option>
											<option value="1 year">1 year</option>
											<option value="2 years">2 years</option>
											<option value="3 years">3 years</option>
											<option value="4 years">4 years</option>
											<option value="5 years">5 years</option>
											<option value="6 years">6 years</option>
											<option value="7 years">7 years</option>
											<option value="8 years">8 years</option>
											<option value="9 years">9 years</option>
											<option value="10 years">10 years</option>
											<option value="11 years">11 years</option>
											<option value="12 years">12 years</option>
											<option value="13 years">13 years</option>
											<option value="14 years">14 years</option>
											<option value="15 years">15 years</option>
											<option value="16 years">16 years</option>
											<option value="17 years">17 years</option>
											<option value="18 years">18 years</option>
											<option value="19 years">19 years</option>
											<option value="20 years">20 years</option>
											<option value="21 years">21 years</option>
											<option value="22 years">22 years</option>
											<option value="23 years">23 years</option>
											<option value="24 years">24 years</option>
											<option value="25 years">25 years</option>
											<option value="26 years">26 years</option>
											<option value="27 years">27 years</option>
											<option value="28 years">28 years</option>
											<option value="29 years">29 years</option>
											<option value="30 years">30 years</option>
											<option value="30+ years">30+ years</option>
										</select>
									</div>
								</div>
								<div class="col-lg-6">
									<label><span class="color"></span></label>
									<select name="exp_months" class="form-control tt2" required="required" style="margin-top:7px;">
										<option value="<?php echo $exp_months; ?>"><?php echo $exp_months; ?></option>
										<option value="">Select Months</option>
										<option value="0 months">0 months</option>
										<option value="1 month">1 month</option>
										<option value="2 months">2 months</option>
										<option value="3 months">3 months</option>
										<option value="4 months">4 months</option>
										<option value="5 months">5 months</option>
										<option value="6 months">6 months</option>
										<option value="7 months">7 months</option>
										<option value="8 months">8 months</option>
										<option value="9 months">9 months</option>
										<option value="10 months">10 months</option>
										<option value="11 months">11 months</option>
										<option value="12 months">12 months</option>

									</select>
								</div>
								<!--form-group-->

								<div class="col-lg-6">
									<div class="form-group ">
										<label>Date Of Birth<span class="s-color"> *</span></label>
										<input class="form-control tt" type="date" name="dob" max="<?php echo date("Y-m-d"); ?>" value="<?php echo $dob; ?>" />
									</div><!--form-group-->
								</div>
								<div class="col-lg-6">
									<div class="form-group ">
										<label>Resume<span class="s-color"> *</span></label>
										<input class="form-control" type="file" name="upload_file" />
										<?php echo $path1; ?>
									</div><!--form-group-->
								</div>
								<div class="col-lg-6">
									<select name="premium" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">	
										<option <?php if($premium == '0'){
											echo  "selected"; 
										}  ?>value="0">Non Premium</option>
										<option <?php if($premium == '1'){
											echo  "selected"; 
										} ?> value="1">Premium</option>
									</select>
								</div>

								<div class="col-lg-12 reg-btn mb-4">
									<button type="submit" name="post" class="btn btn-danger">UPDATE</button>
								</div>

							</form><!--form1-->

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
	<script>
		function myFunction() {
			var x = document.getElementById("myInput");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
	<script>
		function emailchk() {
			var email = document.getElementById("email").value;
			if (((/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email)) == 1) || email == "") {
				document.getElementById("alert").innerHTML = "";
				return (true);
			} else if ((/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email)) == 0) {
				document.getElementById("alert").innerHTML = "You have entered an invalid email address!";
				document.getElementById("alert").style.color = "red";
				return (false);
			}
		}
	</script>
	<script>
		function noalpha1() {
			var w = document.getElementById("mob1").value;
			var phoneno1 = /^[1-9]{1}[0-9]{9}$/;
			if (phoneno1.test(w)) {
				document.getElementById("alert1").innerHTML = "";
				return;
			} else {
				document.getElementById("alert1").innerHTML = "Please enter valid mobile number.";
				document.getElementById("alert1").style.color = "red";
				return;
			}
		}
	</script>
	<script src="js1/country.js"></script>
	<?php
	ob_flush();
	?>
	<?php include_once("include1/footer.php"); ?>