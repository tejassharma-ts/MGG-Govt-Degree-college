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
$q = "select * from companyreg where id='$id' order by id desc ";
$run = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($run)) {
	$id = $row['id'];
	$orgname = $row['orgname'];
	$img_path = $row['img_path'];
	$email = $row['email'];
	$cpassword = $row['cpassword'];
	$fname = $row['fname'];
	$lname = $row['lname'];
	$mobile = $row['mobile'];
	$mobile2 = $row['mobile2'];
	$mobile3 = $row['mobile3'];
	$cwebsite = $row['cwebsite'];
	$aadhar_no=$row['aadhar_no'];
	$pan_no=$row['pan_no'];
	$gst=$row['gst'];
	$p_code=$row['p_code'];
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
					<h2 class="font-weight-bold text-center">
						<font color="#146C94">&nbsp; View Sub Admin</font>
					</h2>
					<h6 class="fw-bold">InternshipTime</h6>
				</div>
				<div class="border border-top-3 border-danger">
					<div class="panel grey lighten-5 border ">
						<!-- <h6 class="font-weight-normal pt-1 pl-1">Info : View Internship Registered Company</h6> -->
						<hr>
						<h6 class="text-1">Info : Registered Company |
							<a style="color:red;" href="update_regcompany.php?id=<?php echo $id; ?>">Edit&nbsp;
							<i class="fa fa-edit" style="font-size:18px"></i></a><br>
						</h6>
						<a href="viewintern_regstudent.php" class="btn btn-danger mt-2" style="">Back</a>
						<div class="panel-body p-4">
							<div class="table table-responsive">
								<table class="table table-hover" width="100%">
									<thead>
										<tr>
											<th>Organization Name</th>
											<td><?php echo $orgname; ?></td>
										</tr>
										<tr>
											<th>Official Email Id</th>
											<td><?php echo $email; ?></td>
										</tr>
										<tr>
											<th>Official Logo</th>
											<td><img src="upload/<?php echo $img_path; ?>" width="200px" height="200px" alt=""></td>
										</tr>
										<tr>
											<th>Password</th>
											<td><?php echo $cpassword; ?></td>
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
											<th>Mobile Number.2</th>
											<td><?php echo $mobile2; ?></td>
										</tr>
										<tr>
											<th>Mobile Number.3</th>
											<td><?php echo $mobile3; ?></td>
										</tr>
										<tr>
											<th>Aadhar Number</th>
											<td><?php echo $aadhar_no; ?></td>
										</tr>
										<tr>
											<th>PAN card</th>
											<td><?php echo $pan_no; ?></td>
										</tr>
										<tr>
											<th>GST number</th>
											<td><?php echo $gst; ?></td>
										</tr>
										<tr>
											<th>Pin Code</th>
											<td><?php echo $p_code; ?></td>
										</tr>
										<tr>
											<th>Company Website</th>
											<td><?php echo $cwebsite; ?></td>
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


ob_flush();
?>
<?php include_once("include1/footer.php"); ?>