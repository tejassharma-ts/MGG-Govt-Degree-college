<?php
ob_start();
session_start();

if (!$_SESSION['u']) {
    header('location:login.php');
}
include("config/connection.php");

if (isset($_POST['post'])) {
    $service_name = mysqli_real_escape_string($con, $_POST['service_name']);
    $service_type = mysqli_real_escape_string($con, $_POST['service_type']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $des = mysqli_real_escape_string($con, $_POST['description']);


    // File upload success, now insert data into the database
    $sql = "INSERT INTO `price`(`service_name`, `service_type`, `price`, `des`) VALUES ('$service_name','$service_type','$price', '$des')";
    $run = mysqli_query($con, $sql);

    if ($run) {
        echo "<script>alert('Data successfully added.'); window.location.href='add_price.php?a=1';</script>";
    } else {
        echo "<script>alert('Error: Please fill in correct data.');</script>";
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
                        <div class="left-news">
                            <h2 class="font-weight-bold text-center">
                                <font color="#146C94">&nbsp; Add Service</font>
                            </h2>
                            <h6 class="fw-bold">InternshipTime</h6>
                        </div>
                    </div>
                </div>

                <div class="border border-top-3 border-danger">
                    <div class="panel grey lighten-5 border ">
                        <h6 class="font-weight-normal pt-1 pl-1">Info : Fill Up Details</h6>
                        <hr>
                        <div class="panel-body p-4">
                            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Service Name</label>
                                            <select class="tt form-control" name="service_name" required="required">
                                                <option selected disabled>--Select--</option>
                                                <option value="Text Resume">Text Resume</option>
                                                <option value="Visual Resume">Visual Resume</option>
                                                <option value="Online Interview Classes">Online Interview Classes</option>
                                                <option value="Motivation">Motivation</option>
                                                <option value="Guaranteed Company Intern">Guaranteed Company Internship</option>
                                                <option value="Guaranteed Internship">Guaranteed Internship</option>
                                                <option value="Guaranteed Part Time Jobs">Guaranteed Part Time Jobs</option>
                                                <option value="Guaranteed Part Time Jobs">Guaranteed Part Time Jobs</option>
                                                <option value="Linkdin Makeover">Linkdin Makeover</option>
                                              
                                            </select>
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Service Type</label>
                                            <select class="tt form-control" name="service_type" required="required">
                                                <option selected disabled>--Select--</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Express">Express</option>
                                                <option value="Super Express">Super Express</option>
                                                <option value="Entry Level">Entry Level</option>
                                                <option value="Mid Level">Mid Level</option>
                                                <option value="Senior Level">Senior Level</option>
                                                <option value=" Executive Level">Executive Level</option>
                                               
                                            </select>
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Price</label>
                                            <input class="form-control tt" type="number" name="price" placeholder="₹Enter amount" required="required" />

                                        </div><!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Description</label>
                                            <input class="form-control tt" type="text" name="description" placeholder="Description" />

                                        </div><!--form-group-->
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="post" class="btn btn-danger">ADD</button>
                                </div>
                            </form>
                        <!--form1-->
                    </div>
                </div>
            </div>
            <!--6-->
        </div>
        <!--row2-->
        <!--/body-->
    </div>
</div>
</div>
<?php include_once("include1/footer.php"); ?>

<?php
if (isset($_GET['a'])) {
    if ($_GET['a'] == 1) {
?>
        <script>
            alert("Data is successfully added..");
        </script>
<?php
    }
}
?>
<?php
ob_flush();
?>