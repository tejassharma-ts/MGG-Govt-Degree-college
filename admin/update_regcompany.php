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
$q = "select * from companyreg where id='$id' ";
$run = mysqli_query($con, $q);
while ($row = mysqli_fetch_array($run)) {
    $id = $row['id'];
    $orgname = $row['orgname'];
    $email = $row['email'];
    $path = $row['img_path'];
    $cpassword = $row['cpassword'];
    $current_city = $row['current_city'];
    $current_state = $row['current_state'];
    $current_country = $row['current_country'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $mobile = $row['mobile'];
    $mobile2 = $row['mobile2'];
    $mobile3 = $row['mobile3'];
    $aadhar_no=$row['aadhar_no'];
	$pan_no=$row['pan_no'];
	$gst=$row['gst'];
	$p_code=$row['p_code'];
    $cwebsite = $row['cwebsite'];
}

?>
<?php

if (isset($_POST['post'])) {
    $orgname = mysqli_real_escape_string($con, $_POST['orgname']);
    $email = $_POST['email'];
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $current_city = mysqli_real_escape_string($con, $_POST['current_city']);
    $current_state = mysqli_real_escape_string($con, $_POST['current_state']);
    $current_country = mysqli_real_escape_string($con, $_POST['current_country']);
    $mobile = $_POST['mobile'];
    $mobile2 = $_POST['mobile2'];
    $mobile3 = $_POST['mobile3'];
    $cwebsite = mysqli_real_escape_string($con, $_POST['cwebsite']);

    if (!empty($_FILES['image']['name'])) {
        $img_name = uniqid() . '_' . $_FILES['image']['name'];
        $img_tmp = $_FILES['image']['tmp_name'];
        $img_size = $_FILES['image']['size'];

        // Check file type
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'jfif');
        $file_extension = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

        if (!in_array($file_extension, $allowed_extensions)) {
            echo "<script>alert('Error: Only JPG, JPEG, PNG, and JFIF file types are allowed.');</script>";
            exit();
        }

        // Check file size (1 MB limit)
        $max_file_size = 1 * 1024 * 1024; // 1 MB in bytes
        if ($img_size > $max_file_size) {
            echo "<script>alert('Error: File size must be less than 1 MB.');</script>";
            exit();
        }

        // Move uploaded image to a folder
        move_uploaded_file($img_tmp, "upload/$img_name");

        // Remove old image if a new one is uploaded
        if (!empty($path) && file_exists("upload/$path")) {
            unlink("upload/$path");
        }


        mysqli_query($con, "UPDATE `companyreg` SET 
    `orgname`='" . $orgname . "',
    `img_path`='" . $img_name . "',
    `email`='" . $email . "',
    `cpassword`='" . $cpassword . "',
    `fname`='" . $fname . "',
    `lname`='" . $lname . "',
    `current_city`='" . $current_city . "', 
    " . (!empty($current_state) ? "`current_state`='" . $current_state . "', " : "") .
    " " . (!empty($current_country) && $current_country != -1 ? "`current_country`='" . $current_country . "', " : "") . "
    `mobile`='" . $mobile . "',
    `mobile2`='" . $mobile2 . "',
    `mobile3`='" . $mobile3 . "',
    `pan_no`='" . $pan_no . "',
    `aadhar_no`='" . $aadhar_no . "',
    `gst`='" . $gst . "',
    `p_code`='" . $p_code . "',
    `cwebsite`='" . $cwebsite . "'
    WHERE id='$id'");

        header("location:view_regcompany.php?u=1");
        //echo "<span style='color:red;font-size:25px;'>Register Company Successfully Updated</span>";
    } else {
        // Update data without changing the image
        mysqli_query($con, "UPDATE `companyreg` SET 
        `orgname`='" . $orgname . "',
        `email`='" . $email . "',
        `cpassword`='" . $cpassword . "',
        `fname`='" . $fname . "',
        `lname`='" . $lname . "',
        `current_city`='" . $current_city . "', 
        " . (!empty($current_state) ? "`current_state`='" . $current_state . "', " : "") .
        " " . (!empty($current_country) && $current_country != -1 ? "`current_country`='" . $current_country . "', " : "") . "
        `mobile`='" . $mobile . "',
        `mobile2`='" . $mobile2 . "',
        `mobile3`='" . $mobile3 . "',
        `pan_no`='" . $pan_no . "',
        `aadhar_no`='" . $aadhar_no . "',
        `gst`='" . $gst . "',
        `p_code`='" . $p_code . "',
        `cwebsite`='" . $cwebsite . "'
        WHERE id='$id'");
    
        header("location:view_regcompany.php?u=1");
        //echo "<span style='color:red;font-size:25px;'>Register Company Successfully Updated</span>";
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
                        <font color="#146C94">&nbsp; Update registered company</font>
                    </h2>
                    <h6 class="fw-bold">InternshipTime</h6>

                </div>

                <div class="border border-top-3 border-danger">
                    <div class="panel grey lighten-5 border ">
                        <h6 class="font-weight-normal pt-1 pl-1">Info :update Internship Registered Company</h6>
                        <hr>
                        <div class="box-3"><a href="view_company_details.php?id=<?php echo $id; ?>" class="btn btn-danger">Back</a>
                            <form action="" method="post" enctype="multipart/form-data" class="row" autocomplete="off">
                                <div class="col-lg-12">
                                    <div class="form-group ">
                                        <label>Organization Name<span class="s-color"> *</span></label>
                                        <input class="form-control tt" type="text" name="orgname" value="<?php echo $orgname; ?>" required="required" readonly />
                                    </div>
                                    <!--form-group-->
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label>Official Email Id<span class="s-color"> *</span></label>
                                        <input class="form-control tt" type="email" name="email" value="<?php echo $email; ?>" placeholder="name@company_name.com" id="email" style="width: 97%;" onchange="emailchk()" readonly />
                                        <p id="alert"> </p>
                                    </div>
                                    <!--form-group-->
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label>Official Logo<span class="s-color"> *</span></label>
                                        <input class="tt" type="file" autofocus name="image" accept=".jpeg, .jpg, .png, .jfif" />
                                        <img src="upload/<?php echo $path; ?>" height="200px" width="200px">
                                        <p id="alert"> </p>
                                    </div>
                                    <!--form-group-->
                                </div>
                                <div class="col-lg-12">
										<div class="form-group ">
										<label>Password</label>
											<input class="form-control tt" type="password" name="cpassword" value="<?php echo $cpassword; ?>" required="required" id="myInput" />
											<input type="checkbox" onclick="myFunction()" style="width:5%;">&nbsp;<strong style="color:#000;"><b>Show Password</b></strong>
										</div> form-group
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label>First Name<span class="s-color"> *</span></label>
                                        <input class="form-control tt" type="text" name="fname" value="<?php echo $fname; ?>" required="required" />
                                    </div>
                                    <!--form-group-->
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label>Last Name<span class="s-color"> *</span></label>
                                        <input class="form-control tt" type="text" name="lname" value="<?php echo $lname; ?>" required="required" />
                                    </div>
                                    <!--form-group-->
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label>Current Country<span class="color">*</span></label>
                                        <select id="country" name="current_country" class="form-control " required>
                                        </select>
                                        <p class="text-danger fw-bold">
                                            Selected:<?php echo $current_country; ?></p>

                                    </div>
                                    <!--form-group-->
                                </div>



                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label>Current State<span class="color">*</span></label>
                                        <select id="state" name="current_state" class="form-control ">

                                        </select>
                                        <p class="text-danger fw-bold">
                                            Selected:<?php echo $current_state; ?></p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group ">
                                        <label>Current City<span class="color">*</span></label>
                                        <input class="form-control tt2" type="text" name="current_city" value="<?php echo $current_city; ?>" required="required">
                                    </div>
                                    <!--form-group-->
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group ">
                                        <label>Mobile Number.1<span class="s-color"> *</span></label>
                                        <input class="form-control tt" type="text" name="mobile" id="mob1" onchange="noalpha1()" value="<?php echo $mobile; ?>" required="required" required size="10" minlength="10" maxlength="10" title="Error Message" pattern="[1-9]{1}[0-9]{9}" />
                                        <p id="alert1"> </p>
                                    </div>
                                    <!--form-group-->
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group ">
                                        <label>Mobile Number.2</label>
                                        <input class="form-control tt" type="text" name="mobile2" id="mob2" onchange="noalpha2()" value="<?php echo $mobile2; ?>" size="10" minlength="10" maxlength="10" title="Error Message" pattern="[1-9]{1}[0-9]{9}" />
                                        <p id="alert2"> </p>
                                    </div>
                                    <!--form-group-->
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group ">
                                        <label>Mobile Number.3</label>
                                        <input class="form-control tt" type="text" name="mobile3" id="mob3" onchange="noalpha3()" value="<?php echo $mobile3; ?>" size="10" minlength="10" maxlength="10" title="Error Message" pattern="[1-9]{1}[0-9]{9}" />
                                        <p id="alert3"> </p>
                                    </div>
                                    <!--form-group-->
                                </div>
                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Aadhar Number</label>
                                                        <input class="form-control" type="text" name="aadhar_no" id="aadhar_no" minlength="12" maxlength="12" title="Error Message" pattern="[0-9]{12}">
                                                        <?php echo $aadhar_no; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>PAN Number</label>
                                                        <input class="form-control" type="text" name="pan_no" id="pan_no" minlength="10" maxlength="10" title="Error Message" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}">
                                                        <?php echo $pan_no; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>GST</label>
                                                        <input class="form-control" type="text" name="gst" id="gst"  minlength="15" maxlength="15" title="Error Message" pattern="[0-9A-Z]{15}">
                                                        <?php echo  $gst; ?>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>PIN Code</label>
                                                        <input class="form-control" type="text" name="p_code" id="p_code"  minlength="6" maxlength="6" title="Error Message" pattern="[0-9]{6}">
                                                        <?php echo $p_code; ?>
                                                    </div>
                                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group ">
                                        <label>Company Website<span class="s-color"> *</span></label>
                                        <input class="form-control tt" type="text" name="cwebsite" value="<?php echo $cwebsite; ?>" />
                                    </div>
                                    <!--form-group-->
                                </div>

                                <div class="col-lg-12 reg-btn mb-4">
                                    <button type="submit" name="post" class="btn btn-danger">UPDATE</button>
                                </div>

                            </form>
                            <!--form1-->

                            <div class="col-lg-12 col-xl-12">

                            </div>
                        </div>

                        <script>
                            function emailchk() {
                                var email = document.getElementById("email").value;
                                if (((/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email)) == 1) || email == "") {
                                    document.getElementById("alert").innerHTML = "";
                                    return (true);
                                } else if ((/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/.test(email)) == 0) {
                                    document.getElementById("alert").innerHTML = "You have entered an invalid email address!";
                                    document.getElementById("alert").style.color = "red";
                                    return (false);
                                }
                            }
                        </script>
                        <script>
                            function myFunction1() {
                                var x = document.getElementById("myInput");
                                if (x.type === "password") {
                                    x.type = "text";
                                } else {
                                    x.type = "password";
                                }
                            }
                        </script>
                        <script>
                            function noalpha1() {
                                var w = document.getElementById("mob1").value;
                                var phoneno1 = /^[1-9]{1}[0-9]{9}$/;
                                if (phoneno1.test(w)) {
                                    document.getElementById("alert1").innerHTML = "";
                                    return;
                                } else {
                                    document.getElementById("alert1").innerHTML = "Please enter valid mobile number.";
                                    document.getElementById("alert1").style.color = "red";
                                    return;
                                }
                            }

                            function noalpha2() {
                                var y = document.getElementById("mob2").value;
                                var phoneno2 = /^[1-9]{1}[0-9]{9}$/;
                                if (phoneno2.test(y) || y == "") {
                                    document.getElementById("alert2").innerHTML = "";
                                    return;
                                } else {
                                    document.getElementById("alert2").innerHTML = "Please enter valid mobile number.";
                                    document.getElementById("alert2").style.color = "red";
                                    return;
                                }
                            }

                            function noalpha3() {
                                var z = document.getElementById("mob3").value;
                                var phoneno3 = /^[1-9]{1}[0-9]{9}$/;
                                if (phoneno3.test(z) || z == "") {
                                    document.getElementById("alert3").innerHTML = "";
                                    return;
                                } else {
                                    document.getElementById("alert3").innerHTML = "Please enter valid mobile number.";
                                    document.getElementById("alert3").style.color = "red";
                                    return;
                                }
                            }
                        </script>
                        </script>
                        <script src="js1/country.js"></script>

                        <?php
                        ob_flush();
                        ?>
                        <?php include_once("include1/footer.php"); ?>