<?php
ob_start();
session_start();
error_reporting(0);
if (!$_SESSION['u']) {
    header('location:login.php');
}
include("config/connection.php");
?>
<?php
if (isset($_POST['post1'])) {
    $intern_name = mysqli_real_escape_string($con, $_POST['intern_name']);
    $intern_namec = strtoupper($intern_name);
    $query = "SELECT * FROM `interncat_tb` WHERE `intern_name`='$intern_namec'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    if (mysqli_num_rows($res) > 0) {
        $flag = 0;
    } else {
        $flag = 1;
    }
    /*if(ctype_lower("$int_name")){
			$int_namec = strtoupper($int_name);
		}
		if(ctype_lower("$intern_name")){
		$intern_namec  = strtoupper($intern_name);
		}
		
		if($intern_namec==$int_namec)
		{
			$flag=0;
			
		}
		else if($intern_namec!==$int_namec)
		{
			$flag=1;
		}*/

    if ($flag == 0) {
        header("location:add_internc.php?a=2");
    } else if ($flag == 1) {
        mysqli_query($con, "insert into `interncat_tb`(`id`,`intern_name`) values (NULL,'$intern_namec')");
        header("location:add_internc.php?a=1");
    }
}

?>
<?php
if (isset($_GET['a'])) {
    if ($_GET['a'] == 1) {
?>
        <script>
            alert("Internship is successfully Added..");
        </script>
<?php
    }
}
?>
<?php
if (isset($_GET['a'])) {
    if ($_GET['a'] == 2) {
?>
        <script>
            alert("Internship already exists..");
        </script>
<?php
    }
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
						<font color="#146C94">&nbsp;Add Internship Category</font>
					</h2>
					<h6 class="fw-bold">InternshipTime</h6>

				</div>

				<div class="border border-top-3 border-danger">
					<div class="panel grey lighten-5 border p-3">
						<h6 class="text-1">Info : Registered Student</h6>
                <div class="row">
                <div class="col-lg-4 col-xl-4 mb-5">
                    <div class="box-1">
                        <div class="box-2">
                            <h6 class="text-1">Info : Fill Up</h6>
                            <hr>
                            <div class="box-3">
                                <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                    <div class="col-lg-12">
                                        <div class="form-group ">
                                            <label>Internship Name</label>
                                            <input class="form-control tt" type="text" name="intern_name" placeholder="Enter Internship Name" required="required" />
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
                            <h6 class="text-1 ">Info : Internship Name</h6>
                            <hr>
                            <div class="box-3">
                                <div class="table table-responsive">
                                    <table class="table table-bordered table-hover" width="100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Internship Name</th>
                                                <th>
                                                    <center>Action</center>
                                                </th>
                                            </tr>
                                        </thead>
                                        <?php $page_name = "add_internc.php"; //  If you use this code with a different page ( or file ) name then change this 

                                        ////// starting of drop down to select number of records per page /////

                                        @$limit = $_GET['limit']; // Read the limit value from query string. 
                                        if (strlen($limit) > 0 and !is_numeric($limit)) {
                                            echo "Data Error";
                                            exit;
                                        }

                                        // If there is a selection or value of limit then the list box should show that value , so we have to lock that options //
                                        // Based on the value of limit we will assign selected value to the respective option//
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



                                        // You can keep the below line inside the above form, if you want when user selection of number of 
                                        // records per page changes, it should not return to first page. 
                                        // <input type=hidden name=start value=$start>
                                        ////////////////////////////////////////////////////////////////////////
                                        //
                                        ///// End of drop down to select number of records per page ///////

                                        $j = 1;
                                        $eu = ($start - 0);

                                        if (!$limit > 0) { // if limit value is not available then let us use a default value
                                            $limit = 10;    // No of records to be shown per page by default.
                                        }
                                        $this1 = $eu + $limit;
                                        $back = $eu - $limit;
                                        $next = $eu + $limit;


                                        /////////////// Total number of records in our table. We will use this to break the pages///////
                                        //$nume = $con->query("select count(id) from upload")->fetchColumn();

                                        //$rs_result = mysqli_query ($con,$nume); 
                                        /////// The variable nume above will store the total number of records in the table////

                                        /////////// Now let us print the table headers ////////////////

                                        $query = "SELECT * FROM interncat_tb order by id asc limit $eu, $limit ";
                                        $rs_result = mysqli_query($con, $query);


                                        while ($row = mysqli_fetch_array($rs_result)) {
                                            $id = $row['id'];
                                            $intern_name = $row['intern_name'];
                                        ?>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $id; ?></td>
                                                    <td><?php echo $intern_name; ?></td>
                                                    <td width="100">
                                                        <center>
                                                            <a onclick="return confirm('Are you sure you want to remove this Form ?')" href="add_internc.php?del=<?php echo $id; ?>" title="Delete"> <img src="img/delete.png" width="15"> </a> | <a href="update_internc.php?id=<?php echo $id; ?>"><img src="img/edit.png" width="20"> </a>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        <?php
                                            $flag = 1;
                                        }
                                        ?>
                                    </table>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-lg-12 col-xl-12">
                                    <div class="pp" style="margin-left:0px;">
                                        <center>
                                            <?php
                                            $query = "select count(id) from interncat_tb order by id desc";
                                            $nume1 = mysqli_query($con, $query);
                                            while ($row = mysqli_fetch_array($nume1)) {
                                                $nume = $row[0];
                                            }

                                            /////////////// Start the buttom links with Prev and next link with page numbers /////////////////
                                            //// if our variable $back is equal to 0 or more then only we will display the link to move back ////////
                                            if ($back >= 0) {
                                                print "<a href='$page_name?id=$intern_name&start=$back&limit=$limit' style='margin-right: 0px;color:white;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default' style='background-color: #2bbbad;'><</span></font></a>";
                                            }
                                            //////////////// Let us display the page links at  center. We will not display the current page as a link ///////////
                                            $i = 1;
                                            $l = 1;
                                            for ($i = 0; $i < $nume; $i = $i + $limit) {
                                                if ($i <> $eu) {
                                                    echo " <a href='$page_name?id=$intern_name&start=$i&limit=$limit' style='color:black;'><font face='Verdana' size='2'><span class='label label-danger'>$l</span></font></a> ";
                                                } else {
                                                    echo "<font face='Verdana' size='2' color=black><span class='label label-success'>$l</span></font>";
                                                }        /// Current page is not displayed as link and given font color red
                                                $l = $l + 1;
                                            }
                                            ///////////// If we are not in the last page then Next link will be displayed. Here we check that /////
                                            if ($this1 < $nume) {
                                                print "<a href='$page_name?id=$intern_name&start=$next&limit=$limit' style='color:black;text-decoration: none;'><font face='Verdana' size='2'><span class='label label-default'style='background-color: #2bbbad;'>></span></font></a>";
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

<?php
if (isset($_GET['del'])) {
    $id = $_GET["del"];

    $d = "delete from interncat_tb where id = '$id' ";

    $del = mysqli_query($con, $d);
    if ($del) {
        header("location:add_internc.php?d=1");
        exit();
    }
}
?>
<?php
if (isset($_GET['d'])) {
    if ($_GET['d'] == 1) {
?>
        <script>
            alert("Internship is Deleted Successfully!!!");
        </script>
<?php
    }
}
?>
<?php
if (isset($_GET['u'])) {
    if ($_GET['u'] == 1) {
?>
        <script>
            alert("Internship is Updated Successfully!!!");
        </script>
<?php
    }
}
?>
<?php
ob_flush();
?>
<?php include_once("include1/footer.php"); ?>