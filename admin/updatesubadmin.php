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
$q = "select * from subadmin where id='$id' ";
$run = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($run)) {
	$password = $row['password'];
	$username = $row['username'];
	$role = $row['role'];
}
?>
<?php

if (isset($_POST['post'])) {
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = $_POST['password'];
	$role = mysqli_real_escape_string($con, $_POST['role']);

	$sql = "UPDATE `subadmin` SET `username`='$username', `password`='$password', `role`='$role' WHERE id=$id";

	$run = mysqli_query($con, $sql);
	if ($run) {
		header("location:viewsubadmin.php?u=1");
	} else {
		echo "<script>alert('Error: Please fill in correct data.');</script>";
	}
	//header("location:view_job.php?u=1");

}
?>
<?php include_once("include1/sidenav.php"); ?>

<div class="page-wrapper">


	<?php include_once("include1/header.php"); ?>
	<!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
	<div class="container">

		<!-- Top Statistics -->
		<div class="row justify-content-center">

			<div class="col-lg-11 mb-5">
				<div class="row mt-4">
					<div class="col-lg-12 col-lg-offset-2">
						<div class="left-news">
							<h2 class="font-weight-bold text-center">
								<font color="#146C94">&nbsp;Update Sub Admin</font>
							</h2>
							<h6 class="fw-bold">InternshipTime</h6>

						</div>
					</div>
				</div>

				<div class="border border-top-3 border-danger">
					<div class="panel grey lighten-5 border ">
						<h6 class="font-weight-normal pt-1 pl-1">Info : Fill Up Details</h6>
						<hr>
						<div class="panel-body p-4">
							<h4 class="">Update Sub Admin Information:</h4> <br>
							<form class="row mt-5" action="" method="post" enctype="multipart/form-data" autocomplete="off">
								<div class="col-lg-4">
									<div class="form-group ">
										<label>Username<span class="s-color"> *</span></label>
										<input class="form-control tt" type="text" name="username" value="<?php echo $username; ?>" required="required" />
									</div>
									<!--form-group-->
								</div>
								<div class="col-lg-4">
									<div class="form-group ">
										<label>Password<span class="s-color"> *</span></label>
										<input class="form-control tt" type="text" name="password" value="<?php echo $password; ?>" required="required" />
									</div>
									<!--form-group-->
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="control-label">Job Role<span class="color">*</span></label>
										<select name="role" class="form-control tt1" required="required">
											<option disabled>Select Job role</option>
											<option value="text_resume" <?php echo ($role == 'text_resume') ? 'selected' : ''; ?>>
												Text-Resume</option>
											<option value="visual_resume" <?php echo ($role == 'visual_resume') ? 'selected' : ''; ?>>
												Visual-Resume</option>

											<option value="online_interview_class" <?php echo ($role == 'online_interview_class') ? 'selected' : ''; ?>>
												Online Interview Class</option>
											<option value="online_motivation_class" <?php echo ($role == 'online_motivation_class') ? 'selected' : ''; ?>>
												Online Motivational Class</option>
											<option value="guaranteed_internship" <?php echo ($role == 'guaranteed_internship') ? 'selected' : ''; ?>>
												Guaranteed Internship</option>
											<option value="guaranteed_part_time_job" <?php echo ($role == 'guaranteed_part_time_job') ? 'selected' : ''; ?>>
												Guaranteed Part Time Job</option>
											<option value="guaranteed_company_intern" <?php echo ($role == 'guaranteed_company_intern') ? 'selected' : ''; ?>>
												Guaranteed Company Intern</option>
											<option value="website" <?php echo ($role == 'website') ? 'selected' : ''; ?>>
												Website Manager</option>
										</select>
									</div>
								</div>

								<div class="clearfix"></div>
								<div class="col-lg-12 reg-btn mb-4">
									<button type="submit" name="post" class="btn btn-danger">UPDATE</button>
								</div>
								<div class="clearfix"></div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once("include1/footer.php"); ?>