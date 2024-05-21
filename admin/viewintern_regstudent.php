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
if (isset($_POST['not_hot'])) {
	$hotid = $_POST['hotid'];
	echo "update sinternreg_tb set hot='1' where id='" . $hotid . "'";
	mysqli_query($con, "update sinternreg_tb set hot='1' where id='" . $hotid . "'");
	header("location:viewintern_regstudent.php");
	exit();
} else {
	if (isset($_POST['hot'])) {
		$hotid = $_POST['hotid'];
		echo "update sinternreg_tb set hot = '0' where id='" . $hotid . "'";
		mysqli_query($con, "update sinternreg_tb set hot = '0' where id='" . $hotid . "'");
		if ($con) {
			mysqli_query($con, "update sinternreg_tb set hot = '0' where id='" . $hotid . "'");
			//mysqli_query($con,"update sinternreg_tb set `date_time` =  '000-00-00 00:00:00' where id='".$hotid."'");
		}
		header("location:viewintern_regstudent.php");
		exit();
	}
}
?>

<?php include_once("include1/sidenav.php"); ?>
<!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
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
								<font color="#146C94">&nbsp; View Internship Registered Student</font>
							</h2>
							<h6 class="fw-bold">InternshipTime</h6>
						</div>
					</div>
				</div>
				<!--./head-->
				
				<div class="left-news border border-top-3 border-primary">
					<div class="panel grey lighten-5 border border-dark">
					
						<hr>
						<div class="table table-responsive">
							<table class="table table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th>#</th>
										<!-- <th>ID</th> -->
										<th>Registration Date</th>
										<th>First Name</th>
										<th>Email</th>
										<th>Password</th>
										<th>Resume</th>
										<th>
											<center>Approv</center>
										</th>
										<th>
											<center>Action</center>
										</th>
									</tr>
								</thead>
								<?php $page_name = "viewintern_regstudent.php"; //  If you use this code with a different page ( or file ) name then change this 

								////// starting of drop down to select number of records per page /////

								@$limit = $_GET['limit']; // Read the limit value from query string. 
								if (strlen($limit) > 0 and !is_numeric($limit)) {
									echo "Data Error";
									exit;
								}

								// If there is a selection or value of limit then the list box should show that value , so we have to lock that options //
								// Based on the value of limit we will assign selected value to the respective option//
								switch ($limit) {
									case 2:
										$select2 = "selected";
										$select10 = "";
										$select5 = "";
										break;

									case 5:
										$select5 = "selected";
										$select10 = "";
										$select2 = "";
										break;

									default:
										$select10 = "selected";
										$select5 = "";
										$select2 = "";
										break;
								}

								@$start = $_GET['start'];
								if (strlen($start) > 0 and !is_numeric($start)) {
									echo "Data Error";
									exit;
								}



								// You can keep the below line inside the above form, if you want when user selection of number of 
								// records per page changes, it should not return to first page. 
								// <input type=hidden name=start value=$start>
								////////////////////////////////////////////////////////////////////////
								//
								///// End of drop down to select number of records per page ///////


								$eu = ($start - 0);

								if (!$limit > 0) { // if limit value is not available then let us use a default value
									$limit = 100;    // No of records to be shown per page by default.
								}
								$this1 = $eu + $limit;
								$back = $eu - $limit;
								$next = $eu + $limit;


								/////////////// Total number of records in our table. We will use this to break the pages///////
								//$nume = $con->query("select count(id) from upload")->fetchColumn();

								//$rs_result = mysqli_query ($con,$nume); 
								/////// The variable nume above will store the total number of records in the table////

								/////////// Now let us print the table headers ////////////////

								$query = "SELECT * FROM sinternreg_tb order by id desc limit $eu, $limit ";
								$rs_result = mysqli_query($con, $query);

								$j = 1;
								while ($row = mysqli_fetch_array($rs_result)) {
									$id = $row['id'];
									$fname = $row['fname'];
									$email = $row['email'];
									$spassword = $row['spassword'];
									$path1 = $row['path1'];
									$hot_tour = $row['hot'];
									$date = $row['date'];
								?>
									<tbody>
										<tr>
											<td><?php echo $j; ?></td>
											<td><?php echo date("d-m-Y", strtotime($date)); ?></td>
											<!-- <td><?php echo $id; ?></td> -->
											<td><?php echo $fname; ?></td>
											<td><?php echo $email; ?></td>
											<td><?php echo $spassword; ?></td>
											<td><a href="../upload/<?php echo $path1; ?>" target="blank"><span class="fa fa-download"></span> Download</td>
											<td>
												<center>
													<?php
													if (($hot_tour == '0') || ($hot_tour == '')) {
													?>
														<form action="" method="post">
															<input class="hide" style="display:none;" type="text" name="hotid" value="<?php echo $id; ?>">
															<!--<button class="btn btn-success btn-xs" type="submit" name="hot" style="font-size:10px;padding:3px 3px;" >Hot</button>-->
															<button class="label label-primary btn-xs" type="submit" name="not_hot" style="font-size:12px;padding:6px 6px;">Enable</button>
														</form>
													<?php
													} else {
													?>
														<form action="" method="post">
															<input class="hide" style="display:none;" type="text" name="hotid" value="<?php echo $id; ?>">
															<!--<button class="btn btn-danger btn-xs" type="submit" name="not_hot" style="font-size:10px;padding:3px 3px;" >Not Hot</button>-->
															<button class="label label-danger btn-xs" type="submit" name="hot" style="font-size:12px;padding:6px 3px;">Disable</button>
														</form>
													<?php
													}
													?>
												</center>
											</td>
											<td width="100">
												<center>
													<a onclick="return confirm('Are you sure you want to remove this Form ?')" href="viewintern_regstudent.php?del=<?php echo $id; ?>"> <img src="img/delete.png" width="15"> </a> | <a style="font-size:10px;padding:3px 3px;background:#1a8646;color:#fff;" href="viewintern_student_details.php?id=<?php echo $id; ?>">View</a>
												</center>
											</td>
										</tr>
									</tbody>
								<?php
									$j++;
								}
								?>
							</table>
						</div>
						<div class="clearfix"></div>
						<div class="col-lg-12 col-xl-12">
							<div class="pp" style="margin-left:0px;">
								<center>
									<?php
									$query = "select count(id) from sinternreg_tb order by id desc";
									$nume1 = mysqli_query($con, $query);
									while ($row = mysqli_fetch_array($nume1)) {
										$nume = $row[0];
									}

									/////////////// Start the buttom links with Prev and next link with page numbers /////////////////
									//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
									if ($back >= 0) {
										print "<a href='$page_name?id=$email&start=$back&limit=$limit' style='margin-right: 0px;color:white;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default' style='background-color: #2bbbad;'><</span></font></a>";
									}
									//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
									$i = 1;
									$l = 1;
									for ($i = 0; $i < $nume; $i = $i + $limit) {
										if ($i <> $eu) {
											echo " <a href='$page_name?id=$email&start=$i&limit=$limit' style='color:black;'><font face='Verdana' size='2'><span class='label label-danger'>$l</span></font></a> ";
										} else {
											echo "<font face='Verdana' size='2' color=black><span class='label label-success'>$l</span></font>";
										}        /// Current page is not displayed as link and given font color red
										$l = $l + 1;
									}
									///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
									if ($this1 < $nume) {
										print "<a href='$page_name?id=$email&start=$next&limit=$limit' style='color:black;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default'style='background-color: #2bbbad;'>></span></font></a>";
									}
									?>
								</center>
							</div><!--pp-->
						</div>
					</div>
				</div>
			</div>
		</div><!--6-->
	</div><!--row2-->
	<!--page matter-->
</div>
</div>





<?php
if (isset($_GET['del'])) {
	$id = $_GET["del"];

	$d = "delete from sinternreg_tb where id = '$id' ";

	$del = mysqli_query($con, $d);
	if ($del) {
		header("location:viewintern_regstudent.php?d=1");
		exit();
	}
}
?>
<?php
if (isset($_GET['d'])) {
	if ($_GET['d'] == 1) {
?>
		<script>
			alert("Student is Deleted Successfully!!!");
		</script>
<?php
	}
}
?>
<?php
if (isset($_GET['u'])) {
	if ($_GET['u'] == 1) {
?>
		<script>
			alert("Student is Updated Successfully!!!");
		</script>
<?php
	}
}
?>
<?php
ob_flush();
?>
<?php include_once("include1/footer.php"); ?>