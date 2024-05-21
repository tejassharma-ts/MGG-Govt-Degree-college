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
$q = "select * from addintern_tb where id='$id' order by id desc ";
$run = mysqli_query($con,$q);
while($row = mysqli_fetch_array($run)){
$id = $row['id'];
$intern_name = $row['intern_name'];
$intern_title = $row['intern_title'];
$orgname = $row['orgname'];
$qualification = $row['qualification'];
$work_from = $row['work_from'];
$start_date = $row['start_date'];
$apply_by = $row['apply_by'];
$intduration = $row['intduration'];
$charge = $row['charge'];
$interntype = $row['interntype'];
$noofopean = $row['noofopean'];
$country = $row['country'];
$state = $row['state'];
$city = $row['city'];
$abtcompany = $row['abtcompany'];
$abtintern = $row['abtintern'];
$skill = $row['skill'];
$perks = $row['perks'];


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
						<font color="#146C94">&nbsp; View Internship Detail</font>
					</h2>
                    <h6 class="fw-bold">Internship</h6>
				</div>
				<div class="border border-top-3 border-danger">
					<div class="panel grey lighten-5 border ">
						<h6 class="font-weight-normal pt-1 pl-1">Info : View Internship Registered Student</h6>
						<p>InternshipTime</p>
						<hr>
						
                        <a href="viewinternship.php" class="btn btn-danger mt-2">Back</a>
						<div class="panel-body p-4">
						<div class="box-3">
                                    <div class="table table-responsive">
                                        <table class="table table-hover" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Internship Name</th>
                                                    <td><?php echo $intern_name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Internship Title</th>
                                                    <td><?php echo $intern_title; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Internship Duration</th>
                                                    <td><?php echo $intduration; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Start Date</th>
                                                    <td><?php echo date("d-m-Y", strtotime($start_date)); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Apply by</th>
                                                    <td><?php echo date("d-m-Y", strtotime($apply_by)); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Qualification</th>
                                                    <td><?php echo $qualification; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Stipend</th>
                                                    <td><?php echo $charge; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Work Type</th>
                                                    <td><?php echo $work_from; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Internship Type</th>
                                                    <td><?php echo $interntype; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>No Of Openings</th>
                                                    <td><?php echo $noofopean; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Location</th>
                                                    <td><?php echo $city; ?>,  <?php echo $state; ?>,  <?php echo $country; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Organisation Name</th>
                                                    <td><?php echo $orgname; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>About Company</th>
                                                    <td><?php echo $abtcompany; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>About Internship</th>
                                                    <td><?php echo $abtintern; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Skills Required</th>
                                                    <td><?php echo $skill; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Perks</th>
                                                    <td><?php echo $perks; ?></td>
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
                    </div>
                    <!--6-->
                </div>
                <!--row2-->
                <!--page matter-->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-content-wrapper -->

    </div>

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
	<?php include_once("include1/footer.php"); ?>