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
$q = "select * from job_tb where id='$id' ";
$run = mysqli_query($con,$q);
while($row = mysqli_fetch_array($run)){
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

$query2="select * from jobcat_tb where id='$jobcat_name'";
$run2=mysqli_query($con,$query2);
$row2=mysqli_fetch_assoc($run2);
$jobcat_name2 =$row2['jobcat_name'];
}
?>
<?php

if(isset($_POST['post']))
{
	$jtitle = mysqli_real_escape_string($con,$_POST['jtitle']);
	$jobcat_name = $_POST['jobcat_name'];
	$cname = mysqli_real_escape_string($con,$_POST['cname']);
	$position = mysqli_real_escape_string($con,$_POST['position']);
	$qualification = $_POST['qualification'];
	$jtype = $_POST['jtype'];
	if($_POST['stt']=="")
	{
		$state = $stt;
	}
	else
	{
		$state = $_POST['stt'];
	}
	$city = $_POST['city'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$cperson = mysqli_real_escape_string($con,$_POST['cperson']);
	$salary = mysqli_real_escape_string($con,$_POST['salary']);
	$website = mysqli_real_escape_string($con,$_POST['website']);
	$jdesc = mysqli_real_escape_string($con,$_POST['jdesc']);
	
	$sql = "UPDATE `job_tb` SET  `jtitle`='".$jtitle."',`jobcat_name`='".$jobcat_name."',`cname`='".$cname."',`position`='".$position."',`qualification`='".$qualification."',`jtype`='".$jtype."',`stt`='".$state."',`city`='".$city."',`email`='".$email."',`phone`='".$phone."',`cperson`='".$cperson."',`salary`='".$salary."',`website`='".$website."',`jdesc`='".$jdesc."' WHERE id='$id' ";
	
	$run = mysqli_query($con,$sql);
	if($run){
		header("location:view_job.php?u=1");
	}else{
		echo "<script>alert('Error: Please fill in correct data.');</script>";

	}
	//header("location:view_job.php?u=1");
	
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
  <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
	.s-color{
		color:red;
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
						<h1 class="font-weight-bold mt-5" style="font-size:20px;"><font class="font-1">Update</font><font class="font-2">&nbsp;Job</font></h1>
						<p>Internship Time</p>
					</div>
				</div>
				<!--./head-->
				<div class="col-lg-12 col-xl-12">
					<div class="box-1">
						<div class="box-2">
							<h6 class="text-1">Info : Job</h6> <hr>
							<div class="box-3"><a href="view_job_details.php?id=<?php echo $id;?>" class="btn btn-primary">Back</a>
							<div class="box-3">
								<form action="" method="post" enctype="multipart/form-data" autocomplete="off" >
									<div class="col-lg-4">
										<div class="form-group ">
											<label>Job Title<span class="s-color"> *</span></label>
											<input class="form-control tt" type="text" name="jtitle" value="<?php echo $jtitle;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label class="control-label">Job Category<span class="s-color"> *</span></label>
											<select name="jobcat_name" class="form-control tt2" required="required" style="width: 98%;" >
												<option value="<?php echo $jobcat_name;?>"><?php echo $jobcat_name2;?></option>
												<?php 
														$query="select * from jobcat_tb ";
														$run_query=mysqli_query($con,$query);
														while($_row=mysqli_fetch_array($run_query))
														{
															$id = $_row['id'];
															$jobcat_name = $_row['jobcat_name'];
													?>	
												<option value="<?php echo $id;?>"><?php echo $jobcat_name;?></option>
												<?php
														}	
													?>   
											</select>
										</div><!--form-group-->
									</div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label>Company Name<span class="s-color"> *</span></label>
											<input class="form-control tt" type="text" name="cname" value="<?php echo $cname;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label>Position<span class="s-color"> *</span></label>
											<input class="form-control tt" type="text" name="position" value="<?php echo $position;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label>Qualification<span class="s-color"> *</span></label>
											<select name="qualification" class="form-control tt2" required="required" >
												<option value="">Select Qualification</option>
												<option value="10th" <?php if($qualify=='10th') echo "selected"; ?>>10th</option>
												<option value="12th" <?php if($qualify=='12th') echo "selected"; ?>>12th</option>
												<option value="UG Course" disabled>UG Course</option>
												<option value="B.Arch" <?php if($qualify=='B.Arch') echo "selected"; ?>>B.Arch</option>
												<option value="B.Com" <?php if($qualify=='B.Com') echo "selected"; ?>>B.Com</option>
												<option value="B.Pharm" <?php if($qualify=='B.Pharm') echo "selected"; ?>>B.Pharm</option>
												<option value="BA" <?php if($qualify=='BA') echo "selected"; ?>>BA</option>
												<option value="BBA/BBM" <?php if($qualify=='BBA/BBM') echo "selected"; ?>>BBA/BBM</option>
												<option value="BCA" <?php if($qualify=='BCA') echo "selected"; ?>>BCA</option>
												<option value="BDS" <?php if($qualify=='BDS') echo "selected"; ?>>BDS</option>
												<option value="BE/B.Tech" <?php if($qualify=='BE/B.Tech') echo "selected"; ?>>BE/B.Tech</option>
												<option value="BEd" <?php if($qualify=='BEd') echo "selected"; ?>>BEd</option>
												<option value="BHM" <?php if($qualify=='BHM') echo "selected"; ?>>BHM</option>
												<option value="BSc" <?php if($qualify=='BSc') echo "selected"; ?>>BSc</option>
												<option value="BVSc" <?php if($qualify=='BVSc') echo "selected"; ?>>BVSc</option>
												<option value="CA" <?php if($qualify=='CA') echo "selected"; ?>>CA</option>
												<option value="CS" <?php if($qualify=='CS') echo "selected"; ?>>CS</option>
												<option value="ICWA" <?php if($qualify=='ICWA') echo "selected"; ?>>ICWA</option>
												<option value="LLB" <?php if($qualify=='LLB') echo "selected"; ?>>LLB</option>
												<option value="MBBS" <?php if($qualify=='MBBS') echo "selected"; ?>>MBBS</option>
												<option value="B.Design" <?php if($qualify=='B.Design') echo "selected"; ?>>B.Design</option>
												<option value="B.FashionTech" <?php if($qualify=='B.FashionTech') echo "selected"; ?>>B.FashionTech</option>
												<option value="BFA" <?php if($qualify=='BFA') echo "selected"; ?>>BFA</option>
												<option value="BHMS" <?php if($qualify=='BHMS') echo "selected"; ?>>BHMS</option>
												<option value="B.P.Ed" <?php if($qualify=='B.P.Ed') echo "selected"; ?>>B.P.Ed</option>
												<option value="B.F.Sc(Fisheries)" <?php if($qualify=='') echo "selected"; ?>>B.F.Sc(Fisheries)</option>
												<option value="BSW" <?php if($qualify=='B.F.Sc(Fisheries)') echo "selected"; ?>>BSW</option>
												<option value="Other Graduate" <?php if($qualify=='Other Graduate') echo "selected"; ?>>Other Graduate</option>
												<option value="PG Course" disabled>PG Course</option>
												<option value="LLM" <?php if($qualify=='LLM') echo "selected"; ?>>LLM</option>
												<option value="M Phil/Ph.D" <?php if($qualify=='M Phil/Ph.D') echo "selected"; ?>>M Phil/Ph.D</option>
												<option value="M.Arch" <?php if($qualify=='M.Arch') echo "selected"; ?>>M.Arch</option>
												<option value="M.Com" <?php if($qualify=='M.Com') echo "selected"; ?>>M.Com</option>
												<option value="M.Pharm" <?php if($qualify=='M.Pharm') echo "selected"; ?>>M.Pharm</option>
												<option value="MA" <?php if($qualify=='MA') echo "selected"; ?>>MA</option>
												<option value="MBA/PGDM" <?php if($qualify=='MBA/PGDM') echo "selected"; ?>>MBA/PGDM</option>
												<option value="MCA" <?php if($qualify=='MCA') echo "selected"; ?>>MCA</option>
												<option value="MD" <?php if($qualify=='MD') echo "selected"; ?>>MD</option>
												<option value="MDS" <?php if($qualify=='MDS') echo "selected"; ?>>MDS</option>
												<option value="ME/M.Tech" <?php if($qualify=='ME/M.Tech') echo "selected"; ?>>ME/M.Tech</option>
												<option value="MEd" <?php if($qualify=='MEd') echo "selected"; ?>>MEd</option>
												<option value="MHM" <?php if($qualify=='MHM') echo "selected"; ?>>MHM</option>
												<option value="MSc" <?php if($qualify=='MSc') echo "selected"; ?>>MSc</option>
												<option value="MSW" <?php if($qualify=='MSW') echo "selected"; ?>>MSW</option>
												<option value="PG Diploma" <?php if($qualify=='PG Diploma') echo "selected"; ?>>PG Diploma</option>
												<option value="MV Sc" <?php if($qualify=='MV Sc') echo "selected"; ?>>MV Sc</option>
												<option value="MPEd" <?php if($qualify=='MPEd') echo "selected"; ?>>MPEd</option>
												<option value="M.F.Sc(Fisheries)" <?php if($qualify=='M.F.Sc(Fisheries)') echo "selected"; ?>>M.F.Sc(Fisheries)</option>
												<option value="Other PG" <?php if($qualify=='Other PG') echo "selected"; ?>>Other PG</option>
											</select>
										</div><!--form-group-->
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Job Type<span class="s-color"> *</span></label>
											<select name="jtype" class="form-control tt2">
												<option value="<?php echo $jtype; ?>"><?php echo $jtype; ?></option>
												<option value="Full Time">Full Time</option>
												<option value="Part Time">Part Time</option>
												<option value="Contract">Contract</option>
												<option value="Temporary">Temporary</option>
											</select>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label class="control-label">State Name<span class="s-color"> *</span></label>
											<input type="text" value="<?php echo $stt; ?>" class="form-control tt" readonly>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label class="control-label">State Name<span class="s-color"> *</span></label>
											<select onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt" class="form-control tt2" value="<?php echo $stt;?>" ></select>
										</div><!--form-group-->
									</div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label class="control-label">City Name<span class="s-color"> *</span></label>
											<select id ="state" class="form-control tt2" name="city">
											<option value="<?php echo $city;?>"><?php echo $city;?></option></select>
											<script language="javascript">print_state("sts");</script>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label>Email<span class="s-color"> *</span></label>
											<input class="form-control tt" type="email" name="email" value="<?php echo $email;?>" placeholder="name@company_name.com" id="email" style="width: 97%;" onchange="emailchk()" required="required" />
											<p id="alert"> </p>
											</div><!--form-group-->
									</div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label>Phone<span class="s-color"> *</span></label>
											<input class="form-control tt" type="text" name="phone" id="mob1" onchange="noalpha1()" value="<?php echo $phone;?>" required="required" required size="10" minlength="10" maxlength="10" title="Error Message" pattern="[1-9]{1}[0-9]{9}"/>
											<p id="alert1"> </p>
										</div><!--form-group-->
									</div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label>Contact Person<span class="s-color"> *</span></label>
											<input class="form-control tt" type="text" name="cperson" value="<?php echo $cperson;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Salary<span class="s-color"> *</span></label>
											<input class="form-control tt" type="text" name="salary" value="<?php echo $salary;?>" required="required" />
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Website<span class="s-color"> *</span></label>
											<input class="form-control tt" type="text" name="website" value="<?php echo $website;?>" />
										</div><!--form-group-->
									</div>
									<div class="col-md-12">
										<div class="form-group ">
											<label>Job Description<span class="s-color"> *</span></label>
											<p class="area">
													<textarea class="form-control tt" type="text" id="editor" name="jdesc" style=""><?php echo $jdesc;?></textarea>
												</div>
											</p>
											<p id="box1"></p>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12 reg-btn mb-4">
										<button type="submit" name="post" class="btn btn-danger">UPDATE</button>
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
			</div><!--row2-->
			<!--page matter-->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'editor' );
            </script>
  
<script>
				function emailchk(){
					var email = document.getElementById("email").value;
					if ((( /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email))==1) || email=="")
						  {
							document.getElementById("alert").innerHTML="";
							return (true);
						  }
					else if (( /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email))==0){
							document.getElementById("alert").innerHTML ="You have entered an invalid email address!";
							document.getElementById("alert").style.color="red";
							return(false);
						}
	}
	  </script>
						
	  <script>
		function noalpha1()
		{
			var w = document.getElementById("mob1").value;
			var phoneno1 =  /^[1-9]{1}[0-9]{9}$/;
		 if (phoneno1.test(w)) {
				document.getElementById("alert1").innerHTML="";
				return;
		 }
		 else{
				document.getElementById("alert1").innerHTML="Please enter valid mobile number.";
				document.getElementById("alert1").style.color="red";
				return;
		 }
		}
		</script>
		  <script>
        CKEDITOR.replace( 'editor' );
        $("form").submit( function(e) {
            var totalcontentlength = CKEDITOR.instances['editor'].getData().replace(/<[^>]*>/gi, '').length;
            if( !totalcontentlength ) {
               document.getElementById("box1").innerHTML = "This box can't be left empty";
			   document.getElementById("box1").style.color = "red";
                e.preventDefault();
            }
			else {
				document.getElementById("box1").innerHTML = "";
			}
        });
    </script>		
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
ob_flush();
 ?>
