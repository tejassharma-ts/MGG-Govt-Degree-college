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
if (isset($_POST['post'])) {
    $uname = mysqli_real_escape_string($con, $_POST['username']);
    $pass = $_POST['password'];
    $role = mysqli_real_escape_string($con, $_POST['role']);


    $sql = "INSERT INTO `subadmin`(`id`, `username`, `password`, `role`) VALUES (NULL, '$uname', '$pass', '$role')";

    $run = mysqli_query($con, $sql);
    if ($run) {
        header("location:addsubadmin.php?a=1");
    } else {
        echo "<script>alert('Error: Please fill in correct data.');</script>";
    }

    //header("location:add_job.php?a=1");

}
?>
<?php include_once("include1/sidenav.php"); ?>

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
                                <font color="#146C94">&nbsp; Add Sub Admin</font>
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
                            <h4 class="">Add Sub Admin Information:</h4> <br>
                            <form id="franchiseForm" action="" method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <input required type="text" name="username" class="form-control" id="f_id" placeholder="Enter Username">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <input required type="text" name="password" class="form-control" id="name" placeholder="Enter Password" data-rule="minlen:4">
                                    </div>
                                    <div class="col-md-4 form-group mt-3 mt-md-0">
                                        <select name="role" id="" class="form-control" required="required" placeholder="Contact Number" data-rule="minlen:4">
                                            <option selected disabled>Select Job role</option>
                                            <option value="text_resume"> Text-Resume</option>
                                            <option value="visual_resume"> Visual-Resume</option>
                                            <option value="online_interview_class"> Online Interview Class</option>
                                            <option value="online_motivation_class"> Online Motivational Class</option>
                                            <option value="guaranteed_internship">Guarenteed Intern</option>
                                            <option value="guaranteed_part_time_job">Guarenteed Part Time Job</option>
                                            <option value="guaranteed_company_intern">Guarenteed company Intern</option>
                                            <option value="website">Website Manager</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center col-md-6  my-4">
                                    <button type="submit" name="post" id="submitBtn" style="background: #dc3545; border: 0; padding: 10px 35px; color: #F6F1F1; transition: 0.4s; border-radius: 50px;">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (isset($_GET['a'])) {
        if ($_GET['a'] == 1) {
    ?>
            <script>
                alert("Subadmin is successfully added..");
            </script>
    <?php
        }
    }
    ?>
    <?php
    ob_flush();
    ?>
    <?php include_once("include1/footer.php"); ?>