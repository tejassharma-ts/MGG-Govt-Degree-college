<?php
ob_start();
session_start();

if (!$_SESSION['u']) {
    header('location:login.php');
}
include("config/connection.php");

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $service_name = mysqli_real_escape_string($con, $_POST['service_name']);
    $service_type = mysqli_real_escape_string($con, $_POST['service_type']);
    $price = mysqli_real_escape_string($con, $_POST['price']);
    $des = mysqli_real_escape_string($con, $_POST['description']);



    $sql = "UPDATE `price` SET `service_name`='$service_name', `service_type`='$service_type', `price`='$price', `des`='$des' WHERE `id`='$id'";


    $run = mysqli_query($con, $sql);

    if ($run) {
        echo "<script>alert('Service Detail is successfully updated.'); window.location.href='view_price.php?a=2';</script>";
    } else {
        echo "<script>alert('Error: Please fill in correct data.');</script>";
    }
}

// Fetch teacher details by ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM price WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $service_name = $row['service_name'];
        $service_type = $row['service_type'];
        $price = $row['price'];
        $des = $row['des'];
    } else {
        echo "Error fetching service details: " . mysqli_error($con);
        exit();
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
                                <font color="#146C94">&nbsp;Update Service Details</font>
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
                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off" class="row">
                                <input type="hidden" name="id" value="<?php echo $id; ?>">

                                <div class="col-lg-4">
                                    <div class="form-group ">
                                        <label>Service Name<span class="color">*</span></label><br>
                                        <select class="tt p-2" name="service_name" required="required" style="width: 190px;">
                                            <option selected disabled>--Select--</option>
                                            <option value="Text Resume" <?php if ($service_name == 'Text Resume') echo 'selected'; ?>>Text Resume</option>
                                            <option value="Visual Resume" <?php if ($service_name == 'Visual Resume') echo 'selected'; ?>>Visual Resume</option>
                                            <option value="Online Interview Classes" <?php if ($service_name == 'Online Interview Classes') echo 'selected'; ?>>Online Interview Classes</option>
                                            <option value="Motivation" <?php if ($service_name == 'Motivation') echo 'selected'; ?>>Motivation</option>
                                            <option value="Guaranteed Internship" <?php if ($service_name == 'Guaranteed Internship') echo 'selected'; ?>>Guaranteed Internship</option>
                                            <option value="Guaranteed Part Time Jobs" <?php if ($service_name == 'Guaranteed Part Time Jobs') echo 'selected'; ?>>Guaranteed Part Time Jobs</option>
                                            <option value="Guaranteed Company Intern" <?php if ($service_name == 'Guaranteed Company Intern') echo 'selected'; ?>>Guaranteed Company Intern</option>
                                        </select>
                                    </div><!--form-group-->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group ">
                                        <label>Service Type<span class="color">*</span></label><br>
                                        <select class="tt p-2" name="service_type" required="required" style="width: 190px;">
                                            <option selected disabled>--Select--</option>
                                            <option value="Regular" <?php if ($service_type == 'Regular') echo 'selected'; ?>>Regular</option>
                                            <option value="Express" <?php if ($service_type == 'Express') echo 'selected'; ?>>Express</option>
                                            <option value="Super Express" <?php if ($service_type == 'Super Express') echo 'selected'; ?>>Super Express</option>

                                        </select>
                                    </div><!--form-group-->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group ">
                                        <label>Price<span class="color">*</span></label>
                                        <input class="form-control tt" type="number" name="price" placeholder="Enter amount" required="required" value="<?php echo $price; ?>" />
                                    </div><!--form-group-->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group ">
                                        <label>Description</label>
                                        <input class="form-control tt" type="text" name="description" placeholder="Enter amount"  value="<?php echo $des; ?>" />
                                    </div><!--form-group-->
                                </div>
                                <!-- ... (other form fields) ... -->
                                <div class="clearfix"></div>
                                <div class="col-lg-12 reg-btn mb-4">
                                    <button type="submit" name="update" class="btn btn-danger">UPDATE</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("include1/footer.php"); ?>
    <?php
    ob_flush();
    ?>