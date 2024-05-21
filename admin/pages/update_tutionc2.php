<?php
ob_start();
session_start();
//error_reporting(0);
if(!$_SESSION['u']){
	header('location:login.php');
	}
include("config/connection.php");
?>
<?php
$id = $_GET['id'];
$q = "select * from tutioncat2_tb where id='$id' ";
$run = mysqli_query($con,$q);
while($_row = mysqli_fetch_array($run)){
$id = $_row['id'];
$cat_name = $_row['cat_name'];
$sub_name = $_row['sub_name'];

$query2="select * from tutioncat_tb where id='$cat_name'";
$run2=mysqli_query($con,$query2);
$row2=mysqli_fetch_assoc($run2);
$cat_name2=$row2['cat_name'];
}

?>
<?php
if(isset($_POST['post1']))
{	
	$cat_name = $_POST['cat_name'];
	$sub_name = mysqli_real_escape_string($con,$_POST['sub_name']);
	
	mysqli_query($con,"UPDATE `tutioncat2_tb` SET `cat_name`='$cat_name',`sub_name`='$sub_name' WHERE id='$id' ");
	
	header("Location:add_tutionc2.php?u=1");
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
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="js/cities.js"></script>
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
 .tt{
	font-size: 14px !important;
	padding: 14px 0 14px 10px;
	}
.tt2{
	width: 102%;
    height: 45px;
    padding-left: 5px;    width: 102%;
    height: 45px;
    padding-left: 5px;
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
						<h1 class="font-weight-bold" style="font-size:20px;"><font class="font-1">Update</font><font class="font-2">&nbsp;Subject Category</font></h1>
						<p>VellaPantii</p>
					</div>
				</div>
				<!--./head-->
				<div class="col-lg-4 col-xl-4 mb-5">
					<div class="box-1">
						<div class="box-2">
							<h6 class="text-1">Info : Fill Up</h6> <hr>
							<div class="box-3">
								<form action="" method="post" enctype="multipart/form-data" autocomplete="off" >
									<div class="col-lg-12">
										<div class="form-group ">
											<label class="control-label">Class Name</label>
											<select name="cat_name" class="form-control" autofocus required="required" style="width: 98%;" >
												<option value="<?php echo $cat_name;?>"><?php echo $cat_name2;?></option>
												<?php 
														$query="select * from tutioncat_tb ";
														$run_query=mysqli_query($con,$query);
														while($_row=mysqli_fetch_array($run_query))
														{
															$id = $_row['id'];
															$cat_name = $_row['cat_name'];
													?>	
												
												<option value="<?php echo $id;?>"><?php echo $cat_name;?></option>
												<?php
														}	
													?>   
											</select>
										</div><!--form-group-->
									</div>			
									<div class="col-lg-12">
										<div class="form-group ">
											<label>Subject Name</label>
											<input class="form-control tt" type="text" name="sub_name" value="<?php echo $sub_name;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12 reg-btn mb-4">
										<button type="submit" name="post1" class="btn btn-danger">UPDATE</button>
									</div>
									<div class="clearfix"></div>
								</form><!--form1-->
							<div class="clearfix"></div>
							<div class="col-lg-12 col-xl-12">						

							</div>
							</div>
						</div>
					</div>
				</div><!--6-->
				<div class="col-lg-8 col-xl-8">
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
ob_flush();
?>