<?php
ob_start();
session_start();
//error_reporting(0);
if (!$_SESSION['u']) {
    header('location:login.php');
}
include("config/connection.php");
?>
<?php
$id = $_GET['id'];
$q = "select * from jobcat_tb where id='$id' ";
$run = mysqli_query($con, $q);
while ($_row = mysqli_fetch_array($run)) {
    $id = $_row['id'];
    $jobcat_name = $_row['jobcat_name'];
}
?>
<?php
if (isset($_POST['post1'])) {
    /*	$jobcat_name = mysqli_real_escape_string($con,$_POST['jobcat_name']);	
		
		mysqli_query($con,"UPDATE `jobcat_tb` SET `jobcat_name`='$jobcat_name' WHERE id='$id' ");
		
		header("Location:add_jobc.php?u=1");
	}*/
    $jobcat_name = mysqli_real_escape_string($con, $_POST['jobcat_name']);
    $jobcat_namec = strtoupper($jobcat_name);
    $query = "SELECT * FROM `jobcat_tb` WHERE `jobcat_name`='$jobcat_namec'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    if (mysqli_num_rows($res) > 0) {
        $flag = 0;
    } else {
        $flag = 1;
    }
    if ($flag == 0) {
        header("location:add_jobc.php?a=2");
    } else if ($flag == 1) {
        mysqli_query($con, "UPDATE `Jobcat_tb` SET `jobcat_name`='$jobcat_namec' WHERE id='$id' ");
        header("Location:add_jobc.php?a=1");
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
<?php
if (isset($_GET['a'])) {
    if ($_GET['a'] == 1) {
?>
        <script>
            alert("Internship updated successfully");
        </script>
<?php
    }
}
?>
<?php include_once("include1/sidenav.php"); ?>
<!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
<div class="page-wrapper">


    <?php include_once("include1/header.php"); ?>
    <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
    <div class="container">

        <!-- Top Statistics -->
        <div class="row justify-content-center">

            <div class="col-lg-11 mb-5">
                <div class="row mt-4">
                    <div class="col-lg-12 col-lg-offset-2">
                        <div class="">
                            <h1 class="font-weight-bold mt-5" style="font-size:20px;">
                                <font class="font-1">Update</font>
                                <font class="font-2">&nbsp;Job Category</font>
                            </h1>
                            <p>InternshipTime</p>
                        </div>
                    </div>
                    <!--./head-->
                    <div class="col-lg-12 col-xl-4 mb-5">

                                        <h6 class="text-1">Info : Fill Up</h6>
                                        <hr>
                                        <div class="box-3">
                                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                                <div class="col-lg-12">
                                                    <div class="form-group ">
                                                        <label>Job Category Name</label>
                                                        <input class="form-control tt" type="text" autofocus name="jobcat_name" Value="<?php echo $jobcat_name; ?>" required="required" />
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            <?php
            ob_flush();
            ?>
            <?php include_once("include1/footer.php"); ?>