<?php
ob_start();
session_start();

if (!$_SESSION['u']) {
    header('location:login.php');
}
include("config/connection.php");

if (isset($_POST['post'])) {
    $code = mysqli_real_escape_string($con, $_POST['code']);
    $dis = mysqli_real_escape_string($con, $_POST['dis%']);
    $expirydate= mysqli_real_escape_string($con, $_POST['expirydate']);
   

    // File Upload
    // $targetDir = "upload/"; // Specify the target directory
    // $fileName = uniqid() . '_' . basename($_FILES["img"]["name"]); // Generate a unique filename
    // $targetFilePath = $targetDir . $fileName; // Final file path

    // // Check file size (in bytes)
    // $maxFileSize = 1048576; // 1 MB
    // if ($_FILES["img"]["size"] > $maxFileSize) {
    //     echo "<script>alert('Error: File size exceeds 1 MB limit.');</script>";
    //     // You can add additional JavaScript code or remove the exit() statement
    //     // exit();
    // }

//     if (file_exists($targetFilePath)) {
//         echo "<script>alert('Error: File already exists.');</script>";
//         // You can add additional JavaScript code or remove the exit() statement
//         // exit();
//     }

//     // Upload file
//     if (move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath)) {
//         // File upload success, now insert data into the database
        $sql = "INSERT INTO `coupons`(`code`, `dis%`, `expirydate`) VALUES ('$code', '$dis', '$expirydate')";
        $run = mysqli_query($con, $sql);

        if ($run) {
            echo "<script>alert('Coupon Code is successfully added.'); window.location.href='add_coupon.php?a=1';</script>";
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
                                <font color="#146C94">&nbsp; Add Coupon</font>
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
                                            <label>Coupon Code</label>
                                            <input class="form-control" type="text" name="code" placeholder="Enter Coupon Code" required="required" style="" />
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Discount(%)</label>
                                            <input class="form-control" type="text" name="dis%" placeholder="Enter discount" required="required" style="" />
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    


                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Expiry Date<span class="color">*</span></label>
                                            <input class="form-control tt" type="date" name="expirydate" placeholder="Enter Expiry Date" required="required" />

                                        </div><!--form-group-->
                                    </div>
                                    
                                   
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="post" class="btn btn-danger">ADD</button>
                                </div>
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
       
<?php
    }
}
?>
<?php
ob_flush();
?>