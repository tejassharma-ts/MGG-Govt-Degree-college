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
$q = "select * from sinternreg_tb where id='$id' order by id desc";
$run = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($run)) {
	$id = $row['id'];
	$email = $row['email'];
	$spassword = $row['spassword'];
	$current_city = $row['current_city'];
	$current_state = $row['current_state'];
	$current_country = $row['current_country'];
	$applyed_city = $row['applyed_city'];
	$applyed_country = $row['applyed_country'];
	$applyed_state = $row['applyed_state'];
	$fname = $row['fname'];
	$lname = $row['lname'];
	$dob = $row['dob'];
	$mobile = $row['mobile'];
	$path1 = $row['path1'];
	$qualify = $row['qualification'];
	$date = $row['date'];
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
					<h6 class="text-1">Info : View Internship Registered Student |
									<a style="color:red;" href="updateintern_regstudent.php?id=<?php echo $id; ?>">Edit&nbsp;
										<i class="fa fa-edit" style="font-size:18px"></i></a>
								</h6>
						
						<hr>
						
						<a href="viewintern_regstudent.php" class="btn btn-danger mt-2">Back</a>
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
											<th>Applied City</th>
											<td><?php echo $applyed_city; ?></td>
										</tr>
										<tr>
											<th>Applied State</th>
											<td><?php echo $applyed_state; ?></td>
										</tr>
										<tr>
											<th>Applied Country</th>
											<td><?php echo $applyed_country; ?></td>
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
											<th>Qualification</th>
											<td><?php echo $qualify; ?></td>
										</tr>
										<tr>
											<th>Date Of Birth</th>
											<td><?php echo $dob; ?></td>
										</tr>
										<tr>
											<th>Mobile Number</th>
											<td><?php echo $mobile; ?></td>
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
<div class="clearfix"></div>
<?php
ob_flush();
?>
<?php include_once("include1/footer.php"); ?>