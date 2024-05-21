<?php
ob_start();
session_start();

if (!$_SESSION['u']) {
    header('location:login.php');
}
include("config/connection.php");

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $code = mysqli_real_escape_string($con, $_POST['code']);
    $dis = mysqli_real_escape_string($con, $_POST['dis%']);
    $expirydate = mysqli_real_escape_string($con, $_POST['expirydate']);
   

   
    echo $sql = "UPDATE `coupons` SET `code`='$code', `dis%`='$dis', `expirydate`='$expirydate' WHERE `id`='$id'";
   

    $run = mysqli_query($con, $sql);

    if ($run) {
        echo "<script>alert('Coupon Code is successfully updated.'); window.location.href='view_coupon.php?a=2';</script>";
    } else {
        echo "<script>alert('Error: Please fill in correct data.');</script>";
    }
}

// Fetch teacher details by ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM coupons WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $user = $row['user_id'];
        $code = $row['code'];
        $dis = $row['dis%'];
        $expirydate = $row['expirydate'];
       
        $query1 = "SELECT * FROM coupons where id ='$user'";
        $rs_result1 = mysqli_query($con, $query1);
        $row2 = mysqli_fetch_array($rs_result1);
        $username = $row2['username'];
    } else {
        echo "Error fetching teacher details: " . mysqli_error($con);
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
						        <font color="#146C94">&nbsp;Update Coupon Details</font>
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
                                
                                <div class="col-lg-4 col-12">
                                    <div class="form-group ">
                                        <label>Coupon Code<span class="color">*</span></label>
                                        <input class="form-control tt" type="text" name="code" placeholder="Enter code" required="required" value="<?php echo $code; ?>" />
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class="form-group ">
                                        <label>Discount<span class="color"></span></label>
                                        <input class="form-control tt" type="text" name="dis%" placeholder="Enter amount" required="required" value="<?php echo $dis; ?>" />
                                    </div><!--form-group-->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group ">
                                        <label>Expiry Date<span class="color"></span></label>
                                        <input class="form-control tt" type="date" name="expirydate" placeholder="" required="required" value="<?php echo $expirydate; ?>" />
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