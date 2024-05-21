<?php
ob_start();
session_start();

ini_set('display_errors', 1);

if (!$_SESSION['u']) {
    header('location:login.php');
}
include("./config/connection.php");

if (isset($_POST['post'])) {
    // Retrieve and escape user inputs
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phoneNumber = mysqli_real_escape_string($con, $_POST['phone_number']);


    if (strlen($phoneNumber) !== 10) {
        echo "<script>alert('Phone number is not valid');</script>";
        exit();
    }

    // Escape user inputs for security
    $password = mysqli_real_escape_string($con, $_POST['password']);


    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO `students` (`name`, `phone_number`, `password`) VALUES ('$name', '$phoneNumber', '$hashedPassword')";

    try {
        $run = mysqli_query($con, $sql);

        if ($run) {
            echo "<script>alert('Student is successfully added.'); window.location.href='viewjobc_regstudent.php?a=1';</script>";
        } else {
            echo "<script>alert('Error: Please fill in correct data.');</script>";
        }
    } catch (mysqli_sql_exception $e) {
        echo "<script>alert('Error: Something went wrong! Please ensure that the number is not already registered');</script>";
    }
    // Close the database connection
    mysqli_close($con);
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
                                <font color="#146C94">&nbsp; Add Student</font>
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

                            <form action="" method="post" autocomplete="off">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Student Name</label>
                                            <input class="form-control" type="text" name="name" placeholder="Enter Student Name" required="required" style="" />
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Student Password</label>
                                            <input class="form-control" type="text" name="password" placeholder="Enter Student Password" required="required" style="" />
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Phone number</label>
                                            <input class="form-control tt" type="number" name="phone_number" placeholder="Enter phone number" min="10" required="required" />
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
        <script>
            alert("Student Profile is successfully added..");
        </script>
<?php
    }
}
?>
<?php
ob_flush();
?>
