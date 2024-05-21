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

if(isset($_POST['post1']))
{
	$cat_name = mysqli_real_escape_string($con,$_POST['cat_name']);
	
	mysqli_query($con,"insert into `tutioncat_tb`(`id`,`cat_name`) values (NULL,'$cat_name')");
	
	header("location:add_tutionc.php?a=1");

}
?>
<?php
 if(isset($_GET['a'])){
 if($_GET['a']==1)
 {
 ?>
 <script>
 alert("Class is successfully Added..");
 </script>
 <?php
 }
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
						<h1 class="font-weight-bold" style="font-size:20px;"><font class="font-1">Add</font><font class="font-2">&nbsp;Tution Category</font></h1>
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
											<label>Class Name</label>
											<input class="form-control tt" type="text" name="cat_name" placeholder="Enter Class Name" required="required" />
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12 reg-btn mb-4">
										<button type="submit" name="post1" class="btn btn-danger">ADD</button>
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
					<div class="box-1">
						<div class="box-2">
							<h6 class="text-1">Info : Class Name</h6> <hr>
							<div class="box-3">
								<div class="table table-responsive">
									<table class="table table-bordered table-hover" width="100%">
										<thead>
											<tr> 
												<th>ID</th>
												<th>Class Name</th>
												<th><center>Action</center></th>
											</tr>
										</thead>
<?php $page_name="add_tutionc.php"; //  If you use this code with a different page ( or file ) name then change this 

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
$limit = 12;    // No of records to be shown per page by default.
}                             
$this1 = $eu + $limit; 
$back = $eu - $limit; 
$next = $eu + $limit; 


/////////////// Total number of records in our table. We will use this to break the pages///////
//$nume = $con->query("select count(id) from upload")->fetchColumn();

//$rs_result = mysqli_query ($con,$nume); 
/////// The variable nume above will store the total number of records in the table////

/////////// Now let us print the table headers ////////////////

$query = "SELECT * FROM tutioncat_tb order by id desc limit $eu, $limit ";
$rs_result = mysqli_query ($con,$query); 

$j=1;
while($row = mysqli_fetch_array($rs_result)) 
{	
	$id = $row['id'];
	$cat_name = $row['cat_name'];
?> 
										<tbody>
											<tr> 
												<td><?php echo $id; ?></td>
												<td><?php echo $cat_name; ?></td>
												<td width="100">
													<center>
														<a onclick="return confirm('Are you sure you want to remove this Form ?')" href="add_tutionc.php?del=<?php echo $id; ?>" title="Delete"> <img src="img/delete.png" width="15"> </a> | 
														
														
														  <a data-toggle="modal" data-target="#<?php echo $id;?>"><img src="img/edit.png" width="20" title="Update" ></a>
														
														
														
													</center>
												</td>
											</tr>
										</tbody>
									<?php
									}
									?>
									</table>
								</div>
	<form action="update_tutionc.php" method="post">
	<div class="modal fade" id="<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	  aria-hidden="true">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header text-center">
			<h4 class="modal-title w-100 font-weight-bold">Update Class</h4>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			  <span aria-hidden="true">&times;</span>
			</button>
		  </div>
		  <div class="modal-body mx-3">
			<div class="md-form mb-5">
			  <label data-error="wrong" data-success="right" for="defaultForm-email">Class Name</label>
			  <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control">
			  <input type="text" id="defaultForm-email" class="form-control tt" name="cat_name" value="<?php echo $cat_name; ?>">
			</div>
		  </div>
		  <div class="modal-footer d-flex  pull-right">
			<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-danger">Update</button>
		  </div>
		</div>
	  </div>
	</div>
	</form>
							<div class="clearfix"></div>
							<div class="col-lg-12 col-xl-12">						
								<div class="pp" style="margin-left:0px;">
<center>
<?php
$query = "select count(id) from tutioncat_tb order by id desc";
$nume1 = mysqli_query ($con,$query); 
while($row = mysqli_fetch_array($nume1)) 
{
$nume=$row[0];
}
		
/////////////// Start the buttom links with Prev and next link with page numbers /////////////////
//// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
if($back >=0) { 
print "<a href='$page_name?id=$cat_name&start=$back&limit=$limit' style='margin-right: 0px;color:white;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default' style='background-color: #2bbbad;'><</span></font></a>"; 
} 
//////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
$i=1;
$l=1;
for($i=0;$i < $nume;$i=$i+$limit){
if($i <> $eu){
echo " <a href='$page_name?id=$cat_name&start=$i&limit=$limit' style='color:black;'><font face='Verdana' size='2'><span class='label label-danger'>$l</span></font></a> ";
}
else { echo "<font face='Verdana' size='2' color=black><span class='label label-success'>$l</span></font>";}        /// Current page is not displayed as link and given font color red
$l=$l+1;
}
///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
if($this1 < $nume) { 
print "<a href='$page_name?id=$cat_name&start=$next&limit=$limit' style='color:black;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default'style='background-color: #2bbbad;'>></span></font></a>";} 
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
	
    $d = "delete from tutioncat_tb where id = '$id' ";
	
    $del = mysqli_query($con,$d);
	if($del){		
       header("location:add_tutionc.php?d=1");
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
			alert("Class is Deleted Successfully!!!");
		</script>
 <?php
	}
 }
?>
<?php
 if(isset($_GET['uu']))
 {
	if($_GET['uu']==1)
	{
 ?>
		<script>
			alert("Class is Updated Successfully!!!");
		</script>
 <?php
	}
 }
?>
 <?php
 ob_flush();
 ?>