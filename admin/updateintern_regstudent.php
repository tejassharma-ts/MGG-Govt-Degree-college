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
$q = "select * from sinternreg_tb where id='$id' ";
$run = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($run)) {
	$id = $row['id'];
	$email = $row['email'];
	$spassword = $row['spassword'];
	$current_city = $row['current_city'];
	$current_state = $row['current_state'];
	$current_country = $row['current_country'];
	$applyed_city = $row['applyed_city'];
	$applyed_state = $row['applyed_state'];
	$applyed_country = $row['applyed_country'];
	$fname = $row['fname'];
	$lname = $row['lname'];
	$college = $row['college'];
	$dob = $row['dob'];
	$mobile = $row['mobile'];
	$path1 = $row['path1'];
	$date = $row['date'];
	$ndate = new DateTime($date);
	$rightdate = $ndate->format('Y-m-d');
	$qualify = $row['qualification'];
}
?>
<?php

if (isset($_POST['post'])) {
	$email = $_POST['email'];
	$spassword = mysqli_real_escape_string($con, $_POST['spassword']);
	$current_city = mysqli_real_escape_string($con, $_POST['current_city']);
	$current_state = mysqli_real_escape_string($con, $_POST['current_state']);
	$current_country = mysqli_real_escape_string($con, $_POST['current_country']);
	$applyed_city = mysqli_real_escape_string($con, $_POST['applyed_city']);
	$applyed_country = mysqli_real_escape_string($con, $_POST['applyed_country']);
	$applyed_state = mysqli_real_escape_string($con, $_POST['applyed_state']);
	$fname = mysqli_real_escape_string($con, $_POST['fname']);
	$lname = mysqli_real_escape_string($con, $_POST['lname']);
	$college =  mysqli_real_escape_string($con, $_POST['college']);
	$dob = $_POST['dob'];
	$mobile = $_POST['mobile'];
	$qualify = $_POST['qualify'];
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
		$sql = "UPDATE `sinternreg_tb` SET  `email`='" . $email . "',`spassword`='" . $spassword . "',`current_city`='" . $current_city . "',
		 " . (!empty($current_state) ? "`current_state`='" . $current_state . "', " : "") .
			" " . (!empty($current_country) && $current_country != -1 ? "`current_country`='" . $current_country . "', " : "") . "
		`applyed_city`='" . $applyed_city . "',
		" . (!empty($applyed_state) ? "`applyed_state`='" . $applyed_state . "', " : "") .
			" " . (!empty($applyed_country) && $applyed_country != -1 ? "`applyed_country`='" . $applyed_country . "', " : "") . "
		`fname`='" . $fname . "',`lname`='" . $lname . "',`college`='" . $college . "',`mobile`='" . $mobile . "',`dob`='" . $dob . "',`path1`='" . $actual . "',`qualification`='" . $qualify . "' WHERE id='$id' ";
	} else {
		$sql = "UPDATE `sinternreg_tb` SET  `email`='" . $email . "',`spassword`='" . $spassword . "',`current_city`='" . $current_city . "',
		 " . (!empty($current_state) ? "`current_state`='" . $current_state . "', " : "") .
			" " . (!empty($current_country) && $current_country != -1 ? "`current_country`='" . $current_country . "', " : "") . "
		`applyed_city`='" . $applyed_city . "',
		" . (!empty($applyed_state) ? "`applyed_state`='" . $applyed_state . "', " : "") .
			" " . (!empty($applyed_country) && $applyed_country != -1 ? "`applyed_country`='" . $applyed_country . "', " : "") . "
		`fname`='" . $fname . "',`lname`='" . $lname . "',`college`='" . $college . "',`mobile`='" . $mobile . "',`dob`='" . $dob . "',`qualification`='" . $qualify . "' WHERE id='$id' ";
	}

	mysqli_query($con, $sql);

	header("location:viewintern_regstudent.php?u=1");

	exit();
	//mysqli_query($con,"UPDATE `sinternreg_tb` SET  `email`='".$email."',`spassword`='".$spassword."',`fname`='".$fname."',`lname`='".$lname."',`mobile`='".$mobile."' WHERE id='$id' ");

	//header("location:viewintern_regstudent.php?u=1");

}
?>
<?php include_once("include1/sidenav.php"); ?>
<div class="page-wrapper">
	<?php include_once("include1/header.php"); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-11 mb-5">
				<div class="left-news">
					<h2 class="font-weight-bold text-center">
						<font color="#146C94">&nbsp; Update registered company</font>
					</h2>
					<h6 class="fw-bold">InternshipTime</h6>

				</div>

				<div class="border border-top-3 border-danger">
					<div class="panel grey lighten-5 border p-3">
						<h6 class="text-1">Info : Registered Student</h6>
						<a href="viewintern_student_details.php?id=<?php echo $id; ?>" class="btn btn-danger mt-2">Back</a>
						<hr>
						<div class="box-3">
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
										<input class="form-control tt" type="password" name="spassword" value="<?php echo $spassword; ?>" id="myInput" />
										<input type="checkbox" onclick="myFunction()" style="width:5%;">&nbsp;<strong style="color:#000;"><b>Show Password</b></strong>
									</div><!--form-group-->
								</div>
								<div class="col-lg-6">
									<div class="form-group ">
										<label>Current Country<span class="s-color"> *</span></label>
										<select class="form-control" type="text" id="country" name="current_country" required="required">
										</select>
										<p class="text-danger fw-bold">
											Selected:<?php echo $current_country; ?></p>
									</div><!--form-group-->
								</div>

								<div class="col-lg-6">
									<div class="form-group ">
										<label>Current State<span class="s-color"> *</span></label>
										<select class="form-control" type="text" id="state" name="current_state" required="required">
										</select>
										<p class="text-danger fw-bold">
											Selected:<?php echo $current_state; ?></p>
									</div><!--form-group-->
								</div>

								<div class="col-lg-6">
									<div class="form-group ">
										<label>Current City<span class="s-color"> *</span></label>
										<input class="form-control" type="text" name="current_city" value="<?php echo $current_city; ?>" required="required" />

									</div><!--form-group-->
								</div>

								<div class="col-lg-6">
									<div class="form-group ">
										<label>Applied City<span class="s-color"> *</span></label>
										<input class="form-control" type="text" name="applyed_city" value="<?php echo $applyed_city; ?>" required="required" />

									</div><!--form-group-->
								</div>
								<div class="col-lg-6">
									<div class="form-group ">
										<label>Applied Country<span class="s-color"> *</span></label>
										<select class="form-control" type="text" id="country1" name="applyed_country" required="required">
										</select>
										<p class="text-danger fw-bold">
											Selected:<?php echo $applyed_country; ?></p>
									</div><!--form-group-->
								</div>
								<div class="col-lg-6">
									<div class="form-group ">
										<label>Applied State<span class="s-color"> *</span></label>
										<select class="form-control" type="text" id="state1" name="applyed_state" required="required">
										</select>
										<p class="text-danger fw-bold">
											Selected:<?php echo $applyed_state; ?></p>
									</div><!--form-group-->
								</div>

								<div class="col-lg-6">
									<div class="form-group ">
										<label>First Name<span class="s-color"> *</span></label>
										<input class="form-control tt" type="text" name="fname" value="<?php echo $fname; ?>" readonly />
									</div><!--form-group-->
								</div>
								<div class="col-lg-6">
									<div class="form-group ">
										<label>Last Name<span class="s-color"> *</span></label>
										<input class="form-control tt" type="text" name="lname" value="<?php echo $lname; ?>" readonly />
									</div><!--form-group-->
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
										<p id="alert1"> </p>
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
</div>
	<!-- /.container-fluid -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
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
	<script src="js1/country.js"></script>








	<?php
	ob_flush();
	?>



	<?php include_once("include1/footer.php"); ?>