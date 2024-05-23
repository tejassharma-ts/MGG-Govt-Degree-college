<?php
ob_start();
session_start();
error_reporting(0);
if (!$_SESSION['u']) {
	header('location:login.php');
}
include "./config/connection.php";
?>
<?php include_once("include1/sidenav.php"); ?>
<div class="page-wrapper">
	<?php include_once("include1/header.php"); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-11 mb-5">
			<div class="left-news">
					<h2 class="font-weight-bold text-center">
						<font color="#146C94">&nbsp; View News</font>
					</h2>
				</div>
					<div class="table table-responsive">
						<table class="table table-bordered table-hover" width="100%">
							<thead>
								<tr>
									<th>ID</th>
									<th>News title</th>
									<th>New pdf</th>
									<th>
										<center>Action</center>
									</th>
								</tr>
							</thead>
							<?php $page_name = "view_news.php"; //  If you use this code with a different page ( or file ) name then change this 

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
								$limit = 25;    // No of records to be shown per page by default.
							}
							$this1 = $eu + $limit;
							$back = $eu - $limit;
							$next = $eu + $limit;


							/////////////// Total number of records in our table. We will use this to break the pages///////
							//$nume = $con->query("select count(id) from upload")->fetchColumn();

							//$rs_result = mysqli_query ($con,$nume); 
							/////// The variable nume above will store the total number of records in the table////

							/////////// Now let us print the table headers ////////////////

							$query = "SELECT * FROM news order by id desc limit $eu, $limit ";
							$rs_result = mysqli_query($con, $query);
							$i = 1;
							$j = 1;
							while ($row = mysqli_fetch_array($rs_result)) {
								$id = $row['id'];
								$title = $row['title'];
								$path = $row['pdf_path'];
							?>
								<tbody>
									<tr>

										<td><?php echo $i; ?></td>
										<td><?php echo $title; ?></td>
										<td><?php echo $pdf_path; ?></td>
										<td width="100">
											<center>
												<a class="text-decoration-none" onclick="return confirm('Are you sure you want to remove this Form ?')" href="view_news.php?del=<?php echo $id; ?>"> <img src="img/delete.png" width="15"> </a> | <a style="font-size:13px;padding:3px 3px;background:#1a8646;color:#fff;" href="edit_news.php?id=<?php echo $id; ?>">Edit</a>
											</center>
										</td>
									</tr>
								</tbody>
							<?php
								$i++;
							}
							?>
						</table>
					</div>
					<div class="clearfix"></div>
					<div class="col-lg-12 col-xl-12">
						<div class="pp" style="margin-left:0px;">
							<center>
								<?php
								$query = "select count(id) from news order by id desc";
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
if (isset($_GET['del'])) {
	$id = $_GET["del"];

	$d = "delete from news where id = '$id'";
	$del = mysqli_query($con, $d);
	if ($del) {
		header("location:view_news.php?d=1");
		exit();
	}
}
?>
<?php
if (isset($_GET['d'])) {
	if ($_GET['d'] == 1) {
?>
		<script>
			alert("News is Deleted Successfully!!!");
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
			alert("News is Updated Successfully!!!");
		</script>
<?php
	}
}
?>
<?php
ob_flush();
?>




<?php include_once("include1/footer.php"); ?>
