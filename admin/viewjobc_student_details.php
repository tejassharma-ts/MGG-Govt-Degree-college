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
$q = "select * from studentreg_tb where id='$id' order by id desc";
$run = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($run)) {
	$id = $row['id'];
	$spassword = $row['spassword'];
	$email = $row['email'];
	$fname = $row['fname'];
	$lname = $row['lname'];
	$mobile = $row['mobile'];
	$qualify = $row['qualification'];
	$current_city = $row['current_city'];
	$current_state = $row['current_state'];
	$current_country = $row['current_country'];
	$college = $row['college'];
	$path1 = $row['path1'];
	$dob = $row['dob'];
	$exp_years = $row['exp_years'];
	$exp_months = $row['exp_months'];
	$ndate = new DateTime($date);
	$rightdate = $ndate->format('Y-m-d');
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
						<font color="#146C94">&nbsp; View Registered Student</font>
					</h1>
					<h6 class="fw-bold">InternshipTime</h6>
				</div>
				<div class="border border-top-3 border-danger">
					<div class="panel grey lighten-5 border ">
						<h6 class="text-1 pt-3">Info : Registered Student |
							<a style="color:red;" href="updatejobc_regstudent.php?id=<?php echo $id; ?>">Edit&nbsp;
								<i class="fa fa-edit" style="font-size:18px"></i></a><br>
						</h6>
						<a href="viewintern_regstudent.php" class="btn btn-danger mt-2">Back</a>
						<hr>

						<div class="panel-body p-4">
							<div class="table table-responsive">
								<table class="table table-hover" width="100%">
									<thead>
										<tr>
											<th>Email</th>
											<td><?php echo $email; ?></td>
										</tr>
										<tr>
											<th>Password</th>
											<td><?php echo $spassword; ?></td>
										</tr>
										<tr>
											<th>First Name</th>
											<td><?php echo $fname; ?></td>
										</tr>
										<tr>
											<th>Last Name</th>
											<td><?php echo $lname; ?></td>
										</tr>
										<tr>
											<th>Mobile Number</th>
											<td><?php echo $mobile; ?></td>
										</tr>
										<tr>
											<th>Qualification</th>
											<td><?php echo $qualify; ?></td>
										</tr>
										<tr>
											<th>College</th>
											<td><?php echo $college; ?></td>
										</tr>
										<tr>
											<th>Date Of Birth</th>
											<td><?php echo $dob; ?></td>
										</tr>
										<tr>
											<th>Current City</th>
											<td><?php echo $current_city; ?></td>
										</tr>
										<tr>
											<th>Current State</th>
											<td><?php echo $current_state; ?></td>
										</tr>
										<tr>
											<th>Current Country</th>
											<td><?php echo $current_country; ?></td>
										</tr>
										<tr>
											<th>Experience</th>
											<td><?php echo $exp_years; ?>&nbsp;<?php echo $exp_years; ?></td>
										</tr>
										<tr>
											<th>Resume</th>
											<td><a href="../upload/<?php echo $path1; ?>" target="blank"><span class="fa fa-download"></span> Download</td>
										</tr>

									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($_GET['a'])) {
	if ($_GET['a'] == 1) {
?>
		<script>
			alert("Student is successfully Registered..");
		</script>
<?php
	}
}
ob_flush();
?>
<?php include_once("include1/footer.php"); ?>