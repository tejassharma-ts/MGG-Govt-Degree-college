<?php
include('config/connection.php');
?>
<div class="data">
<table class="table table-bordered table-hover" width="100%">
										<thead>
											<tr> 
												<th>ID</th>
												<th scope="col">Company Name</th>
												<th scope="col">Phone No.</th>
												<th scope="col">Email</th>
												<th scope="col">State</th>
												<th scope="col">state</th>
											</tr>
										</thead>
		<?php	
			 $page_name="viewreport_jobc.php";
			 @$limit=$_GET['limit']; // Read the limit value from query string. 
			 if(strlen($limit) > 0 and !is_numeric($limit)){
			 echo "Data Error";
			 exit;
			 }
			 
			 /*/ If there is a selection or value of limit then the list box should show that value , so we have to lock that options //
			 // Based on the value of limit we will assign selected value to the respective option/*/
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
				
				
				
				$query="";
				$state = $_POST['datapost'];
				$query = "select * from cjobreg_tb where current_state = '$state'";
				if($query == ""){
					
				}
				else if($query !=  "")
				{
				$result = mysqli_query($con,$query);
				while($row = mysqli_fetch_array($result))
				{
					$id = $row['id'];
					$lname = $row['lname'];
					$fname = $row['fname'];
					$mobile = $row['mobile'];
					$email = $row['email'];
					$state = $row['current_state'];
					$state = $row['current_state'];
	
	
?> 
										<tbody>
											<tr> 
												<td><?php echo $id; ?></td>
												<td><span ><?php echo $fname; echo " "; echo $lname ?></span></td>
												<td><span ><?php echo $mobile; ?></span></td>
												<td><span ><?php echo $email; ?></span></td>
												<td><span ><?php echo $state; ?></span></td>
												<td><span ><?php echo $state; ?></span></td>
											</tr>
										</tbody>
									<?php
				}}
									?>
									</table>
								<div class="clearfix"></div>
<div class="col-lg-12 col-xl-12">						
<div class="pp" style="margin-left:0px;">
<center>
<?php
					$query="";
					$state = $_POST['datapost'];
					$query = "select * from cjobreg_tb where current_state = '$state'";
					if($query == "")
					{
						
					}
					else if($query != ""){
					$nume1 = mysqli_query ($con,$query); 
					while($row = mysqli_fetch_array($nume1)) 
					{
					$nume=$row[0];
					}
		
					/*////////////// Start the buttom links with Prev and next link with page numbers /////////////////
					//// if our variable $back is equal to 0 or more then only we will display the link to move back ///////*/
					if($back >=0) { 
					print "<a href='$page_name?id=$id&start=$back&limit=$limit' style='margin-right: 0px;color:white;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default' style='background-color: #2bbbad;'><</span></font></a>"; 
					} 
					/*/////////////// Let us display the page links at  center. We will not display the current page as a link //////////*/
					$i=1;
					$l=1;
					for($i=0;$i < $nume;$i=$i+$limit){
					if($i <> $eu){
					echo " <a href='$page_name?id=$id&start=$i&limit=$limit' style='color:black;'><font face='Verdana' size='2'><span class='label label-danger'>$l</span></font></a> ";
					}
					else { echo "<font face='Verdana' size='2' color=black><span class='label label-success'>$l</span></font>";}     
					/*// Current page is not displayed as link and given font color red*/
					$l=$l+1;
					}
					/*//////////// If we are not in the last page then Next link will be displayed. Here we check that ////*/
					if($this1 < $nume) { 
					print "<a href='$page_name?id=$id&start=$next&limit=$limit' style='color:black;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default'style='background-color: #2bbbad;'>></span></font></a>";} 
				}
				?>	
					</center>	
					</div><!--pp-->
					</div>
					</div>