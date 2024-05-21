<?php
ob_start();
session_start();
error_reporting(0);
if (!$_SESSION['u']) {
	header('location:login.php');
}
include("config/connection.php");
?>
<script>
	function myFunction() {
		window.print();
	}
</script>
<?php include_once("include1/sidenav.php"); ?>
<div class="page-wrapper">
	<?php include_once("include1/header.php"); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-11 mb-5">
				<div class="left-news">
					<h2 class="font-weight-bold text-center">
						<font color="#146C94">&nbsp; View Internship Report</font>
					</h2>
					<h6 class="fw-bold">InternshipTime</h6>
				</div>
				<div class="border border-top-3 border-danger">
					<div class="panel grey lighten-5 border p-3">
						<h6 class="font-weight-normal pt-1 pl-1">Info : Students</h6>
						<p>InternshipTime</p>
						<hr>
						
						<div class="panel-body p-4">
							<div class="table table-responsive row">
								<div class="row">
									<div class="col-lg-3">
										<div class="form-group">
											<label>Qualification<span class="color">*</span></label>
											<select name="qualification" id="qualify" class="form-control tt2" onchange="myfun(this.value,document.getElementById('state').value,document.getElementById('college').value)" required="required">
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
									<div class="col-lg-3">
                                        <div class="form-group ">
                                            <label>Current Country<span class="color">*</span></label>
                                            <select id="country" name="current_country" class="form-control " required>
                                            </select>


                                        </div>

                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group ">
                                            <label>Current State<span class="color">*</span></label>
                                            <select id="state" name="current_state" class="form-control " onchange="myfun(document.getElementById('qualify').value,this.value,document.getElementById('college').value)">

                                            </select>

                                        </div>
                                    </div>
									
									<div class="col-lg-3 mb-4">
										<div class="form-group ">
											<label>College<span class="color">*</span></label>
											<select id="college" name="college" class="form-control tt2" onchange="myfun(document.getElementById('qualify').value,document.getElementById('state').value,this.value)" required>
												<option value="">Select College</option>
												<?php
												$query = "select * from sinternreg_tb";
												$res = mysqli_query($con, $query);
												while ($row = mysqli_fetch_array($res)) {
													$college = $row['college'];
													if ($college != "") {
												?>

														<option value="<?php echo $college; ?>"><?php echo $college; ?></option>
												<?php
													}
												}
												?>
											</select>
										</div><!--form-group-->
										<script>
											function myfun(datavalue, datavalue2, datavalue3) {
												$.ajax({
													url: 'page.php',
													type: 'POST',
													data: {
														datapost: datavalue,
														datapost2: datavalue2,
														datapost3: datavalue3,
													},
													success: function(result) {
														$('#dataget').html(result);
														$(".all").hide();
													}
												});
											}
										</script>
										<button type="button" class="btn btn-primary" onclick="myFunction()" style="float:right;">Print</button>
										
									</div>
									<div class="col-lg-12" id="dataget">
										</div>
								</div>
									<table class="table table-bordered table-hover all" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<!-- <th>ID</th> -->
												<th scope="col">Student Name</th>
												<th scope="col">Phone No.</th>
												<th scope="col">Email</th>
												<th scope="col">Qualification</th>
												<th scope="col">State</th>
												<th scope="col">City</th>
											</tr>
										</thead>
										<?php $page_name = "viewreport_interns.php"; /*/  If you use this code with a different page ( or file ) name then change this */

										/* ///// starting of drop down to select number of records per page ////*/

										@$limit = $_GET['limit']; /*/ Read the limit value from query string.*/
										if (strlen($limit) > 0 and !is_numeric($limit)) {
											echo "Data Error";
											exit;
										}

										/*/ If there is a selection or value of limit then the list box should show that value , so we have to lock that options //
// Based on the value of limit we will assign selected value to the respective option/*/
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



										/*/ You can keep the below line inside the above form, if you want when user selection of number of 
// records per page changes, it should not return to first page. 
// <input type=hidden name=start value=$start>
////////////////////////////////////////////////////////////////////////
//
///// End of drop down to select number of records per page //////*/


										$eu = ($start - 0);

										if (!$limit > 0) { /*/ if limit value is not available then let us use a default value*/
											$limit = 100;    /*/ No of records to be shown per page by default.*/
										}
										$this1 = $eu + $limit;
										$back = $eu - $limit;
										$next = $eu + $limit;


										/*////////////// Total number of records in our table. We will use this to break the pages//////*/
										/*/$nume = $con->query("select count(id) from upload")->fetchColumn();*/

										/*/$rs_result = mysqli_query ($con,$nume); 
/////// The variable nume above will store the total number of records in the table////

/////////// Now let us print the table headers ///////////////*/

										$query = "SELECT * FROM sinternreg_tb order by id desc limit $eu, $limit ";
										$rs_result = mysqli_query($con, $query);

										$j = 1;
										while ($row = mysqli_fetch_array($rs_result)) {
											$id = $row['id'];
											$lname = $row['lname'];
											$fname = $row['fname'];
											$mobile = $row['mobile'];
											$email = $row['email'];
											$qualification = $row['qualification'];
											$gender = $row['gender'];
											$state = $row['current_state'];
											$city = $row['current_city'];
											$hot = $row['hot'];
											$cat_name = $row['cat_name'];
											$sub_name = $row['sub_name'];
											$intern_name = $row['intern_name'];
											$hobby_name = $row['hobby_name'];
											$jobcat_name = $row['jobcat_name'];
											$address = $row['address'];


										?>
											<tbody class="all">
												<tr>
													<td><?php echo $j; ?></td>
													<!-- <td><?php echo $id; ?></td> -->
													<td><span><?php echo $fname;
																echo " ";
																echo $lname ?></span></td>
													<td><span><?php echo $mobile; ?></span></td>
													<td><span><?php echo $email; ?></span></td>
													<td><span><?php echo $qualification; ?></span></td>
													<td><span><?php echo $state; ?></span></td>
													<td><span><?php echo $city; ?></span></td>
												</tr>
											</tbody>
										<?php
											$j++;
										}
										?>
									</table>
								</div>
								<div class="clearfix"></div>
								<div class="col-lg-12 col-xl-12 all">
									<div class="pp" style="margin-left:0px;">
										<center>
											<?php
											$query = "select count(id) from sinternreg_tb order by id desc";
											$nume1 = mysqli_query($con, $query);
											while ($row = mysqli_fetch_array($nume1)) {
												$nume = $row[0];
											}

											/*////////////// Start the buttom links with Prev and next link with page numbers /////////////////
//// if our variable $back is equal to 0 or more then only we will display the link to move back ///////*/
											if ($back >= 0) {
												print "<a href='$page_name?id=$name&start=$back&limit=$limit' style='margin-right: 0px;color:white;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default' style='background-color: #2bbbad;'><</span></font></a>";
											}
											/*/////////////// Let us display the page links at  center. We will not display the current page as a link //////////*/
											$i = 1;
											$l = 1;
											for ($i = 0; $i < $nume; $i = $i + $limit) {
												if ($i <> $eu) {
													echo " <a href='$page_name?id=$name&start=$i&limit=$limit' style='color:black;'><font face='Verdana' size='2'><span class='label label-danger'>$l</span></font></a> ";
												} else {
													echo "<font face='Verdana' size='2' color=black><span class='label label-success'>$l</span></font>";
												}
												/*// Current page is not displayed as link and given font color red*/
												$l = $l + 1;
											}
											/*//////////// If we are not in the last page then Next link will be displayed. Here we check that ////*/
											if ($this1 < $nume) {
												print "<a href='$page_name?id=$name&start=$next&limit=$limit' style='color:black;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default'style='background-color: #2bbbad;'>></span></font></a>";
											}
											?>
										</center>
									</div><!--pp-->
								</div>
							</div>
						</div>
					</div>
				</div><!--6-->
			</div>

		</div><!--row2-->
		<!--page matter-->
	</div>
	<!-- /.container-fluid -->
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<script src="js1/country.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
	var x = document.getElementById("dataget").value;
	if (x != "") {
		document.getElementById("allintern").style.display = "none";
	} else if (x == "") {
		document.getElementById("allintern").style.display = "block";
	}
</script>
<?php
if (isset($_GET['u'])) {
	if ($_GET['u'] == 1) {
?>
		<script>
			alert("Student is Updated Successfully!!!");
		</script>
<?php
	}
}
?>
<?php
ob_flush();
?>
<?php include_once("include1/footer.php"); ?>