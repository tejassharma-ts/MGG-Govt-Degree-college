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
$q = "select * from cjobreg_tb where id='$id' oorder by id desc ";
$run = mysqli_query($con,$q);
while($row = mysqli_fetch_array($run)){
$id = $row['id'];
$orgname = $row['orgname'];
$img = $row['img_path'];
$email = $row['email'];
$cpassword = $row['cpassword'];
$fname = $row['fname'];
$lname = $row['lname'];
$mobile = $row['mobile'];
$mobile2 = $row['mobile2'];
$mobile3 = $row['mobile3'];
$cwebsite = $row['cwebsite'];
$date = $row['date'];
$ndate = new DateTime($date);
$rightdate = $ndate->format('Y-m-d');
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
		vertical-align: top;
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
						<h1 class="font-weight-bold mt-5" style="font-size:20px;"><font class="font-1">View</font><font class="font-2">&nbsp;Job Registered Company</font></h1>
						<p>Internship Time</p>
					</div>
				</div>
				<!--./head-->
				<div class="col-lg-12 col-xl-12">
					<div class="box-1">
						<div class="box-2">
							<h6 class="text-1">Info : Registered Company | 
							<a style="color:white;" href="updatejobc_regcompany.php?id=<?php echo $id; ?>">Edit&nbsp;
							<i class="fa fa-edit" style="font-size:18px"></i></a></h6> <hr>
							<div class="box-3"><a href="viewjobc_regcompany.php" class="btn btn-primary">Back</a>
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
												<th>Official Logo</th>								<td><img src="upload/<?php echo $img; ?>" width="200px" height="200px" alt=""></td>
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
												<th>Last  Name</th>
												<td><?php echo $lname; ?></td>
											</tr>
											<tr>	
												<th>Mobile Number.1</th>
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
												<th>Company Website</th>
												<td><?php echo $cwebsite; ?></td>
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