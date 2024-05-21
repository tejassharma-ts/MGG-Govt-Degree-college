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
if(isset($_POST['post']))
{
	$jtitle = mysqli_real_escape_string($con,$_POST['jtitle']);
	$jobcat_name = $_POST['jobcat_name'];
	$cname = mysqli_real_escape_string($con,$_POST['cname']);
	$position = mysqli_real_escape_string($con,$_POST['position']);
	$qualification = $_POST['qualification'];
	$jtype = $_POST['jtype'];
	$stt = $_POST['stt'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$cperson = mysqli_real_escape_string($con,$_POST['cperson']);
	$salary = mysqli_real_escape_string($con,$_POST['salary']);
	$website = mysqli_real_escape_string($con,$_POST['website']);
	$jdesc = mysqli_real_escape_string($con,$_POST['jdesc']);
	
	$sql = "insert into `job_tb`(`id`,`jtitle`,`jobcat_name`,`cname`,`position`,`qualification`,`jtype`,`stt`,`city`,`email`,`phone`,`cperson`,`salary`,`website`,`jdesc`,`date`) values (NULL,'$jtitle','$jobcat_name','$cname','$position','$qualification','$jtype','$stt','$city','$email','$phone','$cperson','$salary','$website','$jdesc',NOW())";
	
	$run = mysqli_query($con,$sql);
	if($run){
		header("location:add_job.php?a=1");
	}else{
		echo "<script>alert('Error: Please fill in correct data.');</script>";
	}
	
	//header("location:add_job.php?a=1");

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
  </style>
  <style>
		.color{
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
						<h1 class="font-weight-bold mt-5" style="font-size:20px;"><font class="font-1">Add</font><font class="font-2">&nbsp;Job</font></h1>
						<p>Internship Time</p>
					</div>
				</div>
				<!--./head-->
			</div>
			
				<h6 class="text-1">Info : Fill Up</h6> <hr>
					<form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="row">
						<div class="col-lg-4 col-12">
							<div class="form-group ">
								<label>Job Title<span class="color">*</span></label>
								<input class="form-control tt" type="text" name="jtitle" placeholder="Enter Job Title" required="required" />
							</div><!--form-group-->
						</div>
						<div class="col-lg-4 col-12">
							<div class="form-group ">
								<label class="control-label">Job Category<span class="color">*</span></label>
								<select name="jobcat_name" class="form-control tt1" required="required" style="width: 98%;" >    
									<option value="">Select Job Category</option>
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
						<div class="col-lg-4 col-12">
							<div class="form-group ">
								<label>Company Name<span class="color">*</span></label>
								<input class="form-control tt" type="text" name="cname" placeholder="Enter Company Name" required="required" />
							</div><!--form-group-->
						</div>
						<div class="clearfix"></div>
						<div class="col-lg-4">
							<div class="form-group ">
								<label>Position<span class="color">*</span></label>
									<input class="form-control tt" type="text" name="position" placeholder="Enter Position" required="required" />
							</div><!--form-group-->
						</div>
						<div class="col-lg-4 col-12">
										<div class="form-group ">
											<label>Qualification<span class="color">*</span></label>
											<select name="qualification" class="form-control tt2" required="required" >
												<option value="">Select Qualification</option>
												<option value="10th">10th</option>
												<option value="12th">12th</option>
												<option value="UG Course" disabled>UG Course</option>
												<option value="B.Arch">B.Arch</option>
												<option value="B.Com">B.Com</option>
												<option value="B.Pharm">B.Pharm</option>
												<option value="BA">BA</option>
												<option value="BBA/BBM">BBA/BBM</option>
												<option value="BCA">BCA</option>
												<option value="BDS">BDS</option>
												<option value="BE/B.Tech">BE/B.Tech</option>
												<option value="BEd">BEd</option>
												<option value="BHM">BHM</option>
												<option value="BSc">BSc</option>
												<option value="BVSc">BVSc</option>
												<option value="CA">CA</option>
												<option value="CS">CS</option>
												<option value="ICWA">ICWA</option>
												<option value="LLB">LLB</option>
												<option value="MBBS">MBBS</option>
												<option value="B.Design">B.Design</option>
												<option value="B.FashionTech">B.FashionTech</option>
												<option value="BFA">BFA</option>
												<option value="BHMS">BHMS</option>
												<option value="B.P.Ed">B.P.Ed</option>
												<option value="B.F.Sc(Fisheries)">B.F.Sc(Fisheries)</option>
												<option value="BSW">BSW</option>
												<option value="Other Graduate">Other Graduat</option>
												<option value="PG Course" disabled>PG Course</option>
												<option value="LLM">LLM</option>
												<option value="M Phil/Ph.D">M Phil/Ph.D</option>
												<option value="M.Arch">M.Arch</option>
												<option value="M.Com">M.Com</option>
												<option value="M.Pharm">M.Pharm</option>
												<option value="MA">MA</option>
												<option value="MBA/PGDM">MBA/PGDM</option>
												<option value="MCA">MCA</option>
												<option value="MD">MD</option>
												<option value="MDS">MDS</option>
												<option value="ME/M.Tech">ME/M.Tech</option>
												<option value="MEd">MEd</option>
												<option value="MHM">MHM</option>
												<option value="MSc">MSc</option>
												<option value="MSW">MSW</option>
												<option value="PG Diploma">PG Diploma</option>
												<option value="MV Sc">MV Sc</option>
												<option value="MPEd">MPEd</option>
												<option value="M.F.Sc(Fisheries)">M.F.Sc(Fisheries)</option>
												<option value="Other PG">Other PG</option>
											</select>
										</div><!--form-group-->
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Job Type<span class="color">*</span></label>
											<select name="jtype" class="form-control tt2" required="required" >
												<option value="">Select Job Type</option>
												<option value="Full Time">Full Time</option>
												<option value="Part Time">Part Time</option>
												<option value="Contract">Contract</option>
												<option value="Temporary">Temporary</option>
											</select>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label class="control-label">State Name<span class="color">*</span></label>
											<select onchange="print_city('state', this.selectedIndex);" id="sts" name ="stt" class="form-control tt2" required></select>
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label class="control-label">City Name<span class="color">*</span></label>
											<select id ="state" class="form-control tt2" name="city" required>
											<option value="">Select City</option></select>
											<script language="javascript">print_state("sts");</script>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label>Email<span class="color">*</span></label>
											<input class="form-control tt" type="email" name="email"  placeholder="name@company_name.com" id="email" style="width: 97%;" onchange="emailchk()" required="required" />
											<p id="alert"> </p>
										</div><!--form-group-->
									</div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label>Phone<span class="color">*</span></label>
											<input class="form-control tt" onchange="noalpha1()"  type="text" required="required" required size="10" minlength="10" maxlength="10" title="Error Message" pattern="[1-9]{1}[0-9]{9}" name="phone" placeholder="Enter Phone No. max 10 Digit" style="width: 97%;" required="required" id="mob1"  />
											<p id="alert1"> </p>
										</div><!--form-group-->
									</div>
									<div class="col-lg-4">
										<div class="form-group ">
											<label>Contact Person<span class="color">*</span></label>
											<input class="form-control tt" type="text" name="cperson" placeholder="Enter Contact Person" required="required" />
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Salary<span class="color">*</span></label>
											<input class="form-control tt" type="text" name="salary" placeholder="Enter salary" required="required" />
										</div><!--form-group-->
									</div>
									<div class="col-lg-6">
										<div class="form-group ">
											<label>Website<span class="color">*</span></label>
											<input class="form-control tt" type="text" name="website" placeholder="Enter Website URL" />
										</div><!--form-group-->
									</div>
									<div class="col-md-12">
										<div class="form-group ">
											<label>Job Description<span class="color">*</span></label>
											<p class="area">
													<textarea class="form-control tt" type="text" id="editor" name="jdesc" placeholder="Enter Decription"  style="" ></textarea>
												</div>
											</p>
											<p id="box1"></p>
										</div><!--form-group-->
									</div>
									<div class="clearfix"></div>
									<div class="col-lg-12 reg-btn mb-4">
										<button type="submit" name="post" class="btn btn-danger">ADD</button>
									</div>
									<div class="clearfix"></div>
								</form><!--form1-->
							<div class="clearfix"></div>
							<div class="col-lg-12 col-xl-12">						

							</div>
							</div>
						</div>
					</div>
				</div><!--12-->
			
			<!--page matter-->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
<script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'editor' );
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
 alert("Job is successfully added..");
 </script>
 <?php
 }
 }
 ?>
 <?php
 ob_flush();
 ?>
