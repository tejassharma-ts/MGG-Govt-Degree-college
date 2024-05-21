<?php
ob_start();
session_start();
error_reporting(0);
if (!$_SESSION['u']) {
	header('location:login.php');
}
include("config/connection.php");
include('../PHPMailer/class.phpmailer.php');
?>
<?php
function sendEmail($subject, $body, $email) {
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = "info@internshiptime.in";
	$mail->Password = "tjfzmvlqatynxaid";

	$mail->setFrom("info@internshiptime.in", "Internship Time");
	$mail->addAddress($email);

    $mail->Subject = $subject;
    $mail->Body = $body;
	if ($mail->Send()) {
		echo "<script>
			alert('$subject Mail Send successfully! Thank you..');
			setTimeout(function(){
				window.location.href = 'view_regcompany.php';
			}, 1000); // Delay the redirection for 1 second (1000 milliseconds)
		</script>";
		exit();
	} else {
		echo "<script>
			alert('Error: " . $mail->ErrorInfo . "');
			setTimeout(function(){
				window.location.href = 'view_regcompany.php';
			}, 1000); // Delay the redirection for 1 second (1000 milliseconds)
		</script>";
		exit();
	}
	
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
						<font color="#146C94">&nbsp;View Registered Company</font>

					</h2>
					<h6 class="fw-bold">InternshipTime</h6>
				</div>
				<div class="border border-top-3 border-danger">
					<div class="panel grey lighten-5 border ">
						<h6 class="font-weight-normal pt-1 pl-1">Info : Registered company</h6>
						<hr>
						<div class="panel-body p-4">
							<div class="table table-responsive">
								<table class="table table-bordered table-hover" width="100%">
									<thead>
										<tr>
											<th>#</th>
											<!-- <th>ID</th> -->
											<th>User Name</th>
											<th>Email</th>
											<th>Role</th>
											<th>Phone Number</th>
										
											
											<th>
												<center>Action</center>
											</th>
										</tr>
									</thead>
									<?php $page_name = "view_regcompany.php"; //  If you use this code with a different page ( or file ) name then change this 

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

									$query = "SELECT * FROM kyc_detail order by id desc limit $eu, $limit ";
									$rs_result = mysqli_query($con, $query);

									$j = 1;
									while ($row = mysqli_fetch_array($rs_result)) {
										$id = $row['id'];
										$user_name = $row['user_name'];
										$email = $row['email'];
										$role = $row['role'];
										$phone = $row['acc_phone'];
									
									?>
										<tbody>
											<tr>
												<td><?php echo $j; ?></td>
												
												<!-- <td><?php echo $id; ?></td> -->
												<td><?php echo $user_name; ?></td>
												<td><?php echo $email; ?></td>
												<td><?php echo $role; ?></td>
												<td><?php echo $phone; ?></td>
												
												<td width="100">
													<center>
														<!-- <a onclick="return confirm('Are you sure you want to remove this Form ?')" href="view_regcompany.php?del=<?php echo $id; ?>"> <img src="img/delete.png" width="15"> </a> | -->
                                                         <a style="font-size:10px;padding:3px 3px;background:#1a8646;color:#fff;" href="view_kyc_detail.php?id=<?php echo $id; ?>">View</a>
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
										$query = "select count(id) from kyc_detail order by id desc";
										$nume1 = mysqli_query($con, $query);
										while ($row = mysqli_fetch_array($nume1)) {
											$nume = $row[0];
										}

										/////////////// Start the buttom links with Prev and next link with page numbers /////////////////
										//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
										if ($back >= 0) {
											print "<a href='$page_name?id=$orgname&start=$back&limit=$limit' style='margin-right: 0px;color:white;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default' style='background-color: #2bbbad;'><</span></font></a>";
										}
										//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
										$i = 1;
										$l = 1;
										for ($i = 0; $i < $nume; $i = $i + $limit) {
											if ($i <> $eu) {
												echo " <a href='$page_name?id=$orgname&start=$i&limit=$limit' style='color:black;'><font face='Verdana' size='2'><span class='label label-danger'>$l</span></font></a> ";
											} else {
												echo "<font face='Verdana' size='2' color=black><span class='label label-success'>$l</span></font>";
											}        /// Current page is not displayed as link and given font color red
											$l = $l + 1;
										}
										///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
										if ($this1 < $nume) {
											print "<a href='$page_name?id=$orgname&start=$next&limit=$limit' style='color:black;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default'style='background-color: #2bbbad;'>></span></font></a>";
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
	<!-- /.container-fluid -->
</div>
<!-- /#page-content-wrapper -->

<?php
ob_flush();
?>
<?php include_once("include1/footer.php"); ?>