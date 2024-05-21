<?php
ob_start();
session_start();
error_reporting(0);
if(!$_SESSION['u']){
	header('location:login.php');
	}
include("config/connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Admin -  Panel</title>

	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom styles for this template -->
	<link href="css/simple-sidebar.css" rel="stylesheet">
	<!--custom css-->
	<link href="css/custom-1.css" rel="stylesheet">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
						<h1 class="font-weight-bold mt-5" style="font-size:20px;"><font class="font-1">View</font><font class="font-2">&nbsp;Job</font></h1>
						<p>Internship Time</p>
					</div>
				</div>
				<!--./head-->
				<div class="col-lg-12 col-xl-12">
					<div class="box-1">
						<div class="box-2">
							<h6 class="text-1">Info : Jobs</h6> <hr>
							<div class="box-3">
								<div class="table table-responsive">
									<table class="table table-bordered table-hover" width="100%">
										<thead>
											<tr> 
												<th>#</th>
												<!-- <th>ID</th> -->
												<th>Job Title</th>
												<th>Job Category</th>
												<th>Company Name</th>
												<th>Position</th>
												<th>City</th>
												<th>Phone</th>
												<th>Email</th>
												<th>Salary</th>
												<th><center>Action</center></th>
											</tr>
										</thead>
<?php $page_name="view_job.php"; //  If you use this code with a different page ( or file ) name then change this 

////// starting of drop down to select number of records per page /////

@$limit=$_GET['limit']; // Read the limit value from query string. 
if(strlen($limit) > 0 and !is_numeric($limit)){
echo "Data Error";
exit;
}

// If there is a selection or value of limit then the list box should show that value , so we have to lock that options //
// Based on the value of limit we will assign selected value to the respective option//
switch($limit)
{
case 2:
$select2="selected";
$select10="";
$select5="";
break;

case 5:
$select5="selected";
$select10="";
$select2="";
break;

default:
$select10="selected";
$select5="";
$select2="";
break;

}

@$start=$_GET['start'];
if(strlen($start) > 0 and !is_numeric($start)){
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

if(!$limit > 0 ){ // if limit value is not available then let us use a default value
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

$query = "SELECT * FROM job_tb order by id desc limit $eu, $limit ";
$rs_result = mysqli_query ($con,$query); 

$j=1;
while($row = mysqli_fetch_array($rs_result)) 
{	
	$id = $row['id'];
	$jtitle = $row['jtitle'];
	$jobcat_name = $row['jobcat_name'];
	$cname = $row['cname'];
	$position = $row['position'];
	$qualification = $row['qualification'];
	$jtype = $row['jtype'];
	$stt = $row['stt'];
	$city = $row['city'];
	$email = $row['email'];
	$phone = $row['phone'];
	$cperson = $row['cperson'];
	$salary = $row['salary'];
	$website = $row['website'];
	$jdesc = $row['jdesc'];
	$date = $row['date'];
	$ndate = new DateTime($date);
	$rightdate = $ndate->format('Y-m-d');
	
	$query2="select * from jobcat_tb where id='$jobcat_name'";
	$run2=mysqli_query($con,$query2);
	$row2=mysqli_fetch_assoc($run2);
	$jobcat_name2 =$row2['jobcat_name'];

?> 
										<tbody>
											<tr> 
												<td><?php echo $j; ?></td>
												<!-- <td><?php echo $id; ?></td> -->
												<td><?php echo $jtitle; ?></td>
												<td><?php echo $jobcat_name2; ?></td>
												<td><?php echo $cname; ?></td>
												<td><?php echo $position; ?></td>
												<td><?php echo $city; ?></td>
												<td><?php echo $phone; ?></td>
												<td><?php echo $email; ?></td>
												<td><?php echo $salary; ?></td>
												<td width="100">
													<center>
														<a onclick="return confirm('Are you sure you want to remove this Form ?')" href="view_job.php?del=<?php echo $id; ?>"> <img src="img/delete.png" width="15"> </a> |	<a style="font-size:10px;padding:3px 3px;background:#1a8646;color:#fff;" href="view_job_details.php?id=<?php echo $id; ?>">View</a>
													</center>
												</td>
											</tr>
										</tbody>
									<?php
								$j++;	}
									?>
									</table>
								</div>
								<div class="clearfix"></div>
<div class="col-lg-12 col-xl-12">						
<div class="pp" style="margin-left:0px;">
<center>
<?php
$query = "select count(id) from job_tb order by id desc";
$nume1 = mysqli_query ($con,$query); 
while($row = mysqli_fetch_array($nume1)) 
{
$nume=$row[0];
}
		
/////////////// Start the buttom links with Prev and next link with page numbers /////////////////
//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
if($back >=0) { 
print "<a href='$page_name?id=$jtitle&start=$back&limit=$limit' style='margin-right: 0px;color:white;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default' style='background-color: #2bbbad;'><</span></font></a>"; 
} 
//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
$i=1;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <a href='$page_name?id=$jtitle&start=$i&limit=$limit' style='color:black;'><font face='Verdana' size='2'><span class='label label-danger'>$l</span></font></a> ";
}
else { echo "<font face='Verdana' size='2' color=black><span class='label label-success'>$l</span></font>";}        /// Current page is not displayed as link and given font color red
$l=$l+1;
}
///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
if($this1 < $nume) { 
print "<a href='$page_name?id=$jtitle&start=$next&limit=$limit' style='color:black;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default'style='background-color: #2bbbad;'>></span></font></a>";} 
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
if(isset($_GET['del'])){
	$id = $_GET["del"];
	
    $d = "delete from job_tb where id = '$id' ";
	
    $del = mysqli_query($con,$d);
	if($del){		
       header("location:view_job.php?d=1");
	   exit();
	}
}
?>
<?php
 if(isset($_GET['d']))
 {
	if($_GET['d']==1)
	{
 ?>
		<script>
			alert("Job is Deleted Successfully!!!");
		</script>
 <?php
	}
 }
?>
<?php
 if(isset($_GET['u']))
 {
	if($_GET['u']==1)
	{
 ?>
		<script>
			alert("Job is Updated Successfully!!!");
		</script>
 <?php
	}
 }
?>
<?php 
ob_flush();
?>