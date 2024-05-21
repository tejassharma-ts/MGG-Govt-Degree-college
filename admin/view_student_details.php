<?php
ob_start();
session_start();
error_reporting(0);
if(!$_SESSION['u']){
	header('location:login.php');
	}
include("config/connection.php");
?>
<?php 
$id = $_GET['id'];
$q = "select * from sreg_tb where id='$id' order by id desc ";
$run = mysqli_query($con,$q);
while($row = mysqli_fetch_array($run)){
$id = $row['id'];
$name = $row['name'];
$fname = $row['fname'];
$phone = $row['phone'];
$email = $row['email'];
$gender = $row['gender'];
$state = $row['state'];
$city = $row['city'];
$cat_name = $row['cat_name'];
$sub_name = $row['sub_name'];
$intern_name = $row['intern_name'];
$hobby_name = $row['hobby_name'];
$jobcat_name = $row['jobcat_name'];
$address = $row['address'];
$date = $_row['date'];
$ndate = new DateTime($date);
$rightdate = $ndate->format('Y-m-d');


$query2="select * from tutioncat_tb where id='$cat_name'";
$run2=mysqli_query($con,$query2);
$row2=mysqli_fetch_assoc($run2);
$cat_name2=$row2['cat_name'];

$query2="select * from tutioncat2_tb where id='$sub_name'";
$run2=mysqli_query($con,$query2);
$row2=mysqli_fetch_assoc($run2);
$sub_name2=$row2['sub_name'];

$query2="select * from interncat_tb where id='$intern_name'";
$run2=mysqli_query($con,$query2);
$row2=mysqli_fetch_assoc($run2);
$intern_name2=$row2['intern_name'];

$query2="select * from hobbycat_tb where id='$hobby_name'";
$run2=mysqli_query($con,$query2);
$row2=mysqli_fetch_assoc($run2);
$hobby_name2=$row2['hobby_name'];

$query2="select * from jobcat_tb where id='$jobcat_name'";
$run2=mysqli_query($con,$query2);
$row2=mysqli_fetch_assoc($run2);
$jobcat_name2=$row2['jobcat_name'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - Panel</title>

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
  <style>
  .table>thead>tr>th {
		vertical-align: bottom;
		border-bottom: 1px solid #ddd;
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
						<h1 class="font-weight-bold mt-5" style="font-size:20px;"><font class="font-1">View</font><font class="font-2">&nbsp;Registered Student</font></h1>
						<p>Internship Time</p>
					</div>
				</div>
				<!--./head-->
				<div class="col-lg-12 col-xl-12">
					<div class="box-1">
						<div class="box-2">
							<h6 class="text-1">Info : Registered Student | 
							<a style="color:white;" href="update_student.php?id=<?php echo $id; ?>">Edit&nbsp;
							<i class="fa fa-edit" style="font-size:18px"></i></a></h6> <hr>
							<div class="box-3">
								<div class="table table-responsive">
									<table class="table table-hover" width="100%">
										<thead>
											<tr>
												<th>Date</th>
												<td><?php echo $rightdate; ?></td>
											</tr>
											<tr>	
												<th>Name</th>
												<td><?php echo $name; ?></td>
											</tr>
											<tr>	
												<th>Father Name</th>
												<td><?php echo $fname; ?></td>
											</tr>
											<tr>	
												<th>Phone</th>
												<td><?php echo $phone; ?></td>
											</tr>
											<tr>	
												<th>Email</th>
												<td><?php echo $email; ?></td>
											</tr>
											<tr>	
												<th>Gender</th>
												<td><?php echo $gender; ?></td>
											</tr>
											<tr>	
												<th>State</th>
												<td><?php echo $state; ?></td>
											</tr>
											<tr>	
												<th>City</th>
												<td><?php echo $city; ?></td>
											</tr>
											<tr>	
												<th>Class</th>
												<td><?php echo $cat_name2; ?></td>
											</tr>
											<tr>	
												<th>Subject</th>
												<td><?php echo $sub_name2; ?></td>
											</tr>
											<tr>	
												<th>Internship Category</th>
												<td><?php echo $intern_name2; ?></td>
											</tr>
											<tr>	
												<th>Hobby Classes Category</th>
												<td><?php echo $hobby_name2; ?></td>
											</tr>
											<tr>	
												<th>Job Category</th>
												<td><?php echo $jobcat_name2; ?></td>
											</tr>
											<tr colspan="2">
												<td colspan="2"><b>Address</b> : <?php echo $address; ?></td>
											</tr>
										</thead>
									</table>
								</div>
							<div class="clearfix"></div>
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
 if(isset($_GET['a'])){
 if($_GET['a']==1)
 {
 ?>
 <script>
 alert("Company is successfully Registered..");
 </script>
 <?php
 }
 }
 ob_flush();
 ?>