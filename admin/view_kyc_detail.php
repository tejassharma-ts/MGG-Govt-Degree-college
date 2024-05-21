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
$id = $_GET['id'];
$q = "select * from kyc_detail where id='$id' order by id desc ";
$run = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($run)) {
    $id = $row['id'];
    $user_name = $row['user_name'];
    $email = $row['email'];
    $role = $row['role'];
    $acc_phone = $row['acc_phone'];
    $comp_type = $row['comp_type'];
    $industry_type = $row['industry_type'];
    $contact_person = $row['contact_person'];
    $alias = $row['alias'];
    $contact_designation = $row['contact_designation'];
    $wibsite_url = $row['wibsite_url'];
    $hot_vac = $row['hot_vac'];
    $classified = $row['classified'];
    $phone_no_1 = $row['phone_no_1'];
    $phone_no_2 = $row['phone_no_2'];
    $kyc_status = $row['kyc_status'];
    $pan_no = $row['pan_no'];
    $address_label = $row['address_label'];
    $address = $row['address'];
    $country = $row['country'];
    $state = $row['state'];
    $city = $row['city'];
    $pin_code = $row['pin_code'];
    $GSTIN = $row['GSTIN'];
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
                        <font color="#146C94">&nbsp; View KYC Details</font>
                    </h2>
                    <h6 class="fw-bold">InternshipTime</h6>
                </div>
                <div class="border border-top-3 border-danger">
                    <div class="panel grey lighten-5 border ">
                        <!-- <h6 class="font-weight-normal pt-1 pl-1">Info : View Internship Registered Company</h6> -->
                        <hr>
                        <h6 class="text-1">Info : Kyc Details |
                            <a href="view_kyc.php" class="btn btn-danger" style="">Back</a>
                        </h6>

                        <div class="panel-body p-4">
                            <form>
                                <h3 class="mb-4 mt-4 text-danger fw-bold " style="text-decoration:underline;">Account Detail</h3>
                                <div class="row">
                                    <div class="col">
                                        <label class="mt-1">User Name</label>
                                        <input type="text" class="form-control"  value="<?php echo $user_name ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="mt-1">Email</label>
                                        <input type="text" class="form-control" value="<?php echo $email ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mt-1">Role</label>
                                        <input type="text" class="form-control"  value="<?php echo $role ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="mt-1">Phone Number</label>
                                        <input type="text" class="form-control" value="<?php echo $acc_phone ?>" readonly>
                                    </div>
                                </div>
                                <h3 class="mt-5 mb-4 text-danger fw-bold" style="text-decoration:underline">Company Detail</h3>
                                <div class="row">
                                    <div class="col">
                                        <label class="mt-1">Company Type</label>
                                        <input type="text" class="form-control"  value="<?php echo  $comp_type ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="mt-1">Indusrty Type</label>
                                        <input type="text" class="form-control" value="<?php echo $industry_type ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mt-1">Contact Person</label>
                                        <input type="text" class="form-control"  value="<?php echo $contact_person ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="mt-1">Contact Person Designation</label>
                                        <input type="text" class="form-control" value="<?php echo $contact_designation ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mt-1">Alias</label>
                                        <input type="text" class="form-control"  value="<?php echo $alias ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="mt-1">Website Url</label>
                                        <input type="text" class="form-control" value="<?php echo $wibsite_url ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mt-1">Profile For Hot vacancies</label>
                                        <input type="text" class="form-control"  value="<?php echo $hot_vac ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="mt-1">Profile For Classified</label>
                                        <input type="text" class="form-control" value="<?php echo  $classified ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mt-1">Phone Number1</label>
                                        <input type="text" class="form-control"  value="<?php echo  $phone_no_1 ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="mt-1">Phone Number2</label>
                                        <input type="text" class="form-control" value="<?php echo  $phone_no_2 ?>" readonly>
                                    </div>
                                </div>
                                <h3 class="mb-4 mt-4 text-danger fw-bold" style="text-decoration:underline;">KYC Compliance Details</h3>
                                <div class="row">
                                    <div class="col">
                                        <label class="mt-1">KYC Status</label>
                                        <input type="text" class="form-control"  value="<?php echo  $kyc_status ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="mt-1">Pan Number</label>
                                        <input type="text" class="form-control" value="<?php echo  $pan_no ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mt-1">Address Level</label>
                                        <input type="text" class="form-control"  value="<?php echo  $address_label ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="mt-1">Address</label>
                                        <input type="text" class="form-control" value="<?php echo  $address ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mt-1">Country</label>
                                        <input type="text" class="form-control"  value="<?php echo  $country ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="mt-1">State</label>
                                        <input type="text" class="form-control" value="<?php echo  $state ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="mt-1">City</label>
                                        <input type="text" class="form-control" value="<?php echo  $city ?>" readonly>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label class="mt-1">PinCode</label>
                                        <input type="text" class="form-control"  value="<?php echo  $pin_code ?>" readonly>
                                    </div>
                                    <div class="col">
                                        <label class="mt-1">GSTIN</label>
                                        <input type="text" class="form-control" value="<?php echo  $GSTIN ?>" readonly>
                                    </div>
                                </div>
                            </form>
                            
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