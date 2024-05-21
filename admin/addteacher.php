<?php
ob_start();
session_start();

if (!$_SESSION['u']) {
    header('location:login.php');
}
include("./config/connection.php");

if (isset($_POST['post'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    // $email = mysqli_real_escape_string($con, $_POST['email']);

    // CV upload
    $targetDirCv = "upload/cvs/";
    $fileNameCv = uniqid() . '_' . basename($_FILES['cv']['name']); // Generate a unique filename
    $targetFilePathCv = $targetDirCv . $fileNameCv; // Final file path

    // Check file size (in bytes)
    $maxFileSizeCv = 1 * 1024 * 1024;
    if ($_FILES["cv"]["size"] > $maxFileSizeCv) {
        echo "<script>alert('Error: CV size exceeds 1 MB limit.');</script>";
        // You can add additional JavaScript code or remove the exit() statement
        // exit();
    }

    // File Upload
    $targetDir = "upload/teachers/"; // Specify the target directory
    $fileName = uniqid() . '_' . basename($_FILES["img"]["name"]); // Generate a unique filename
    $targetFilePath = $targetDir . $fileName; // Final file path

    // Check file size (in bytes)
    $maxFileSize = 1048576; // 1 MB
    if ($_FILES["img"]["size"] > $maxFileSize) {
        echo "<script>alert('Error: File size exceeds 1 MB limit.');</script>";
        // You can add additional JavaScript code or remove the exit() statement
        // exit();
    }

    if (file_exists($targetFilePath)) {
        echo "<script>alert('Error: File already exists.');</script>";
        // You can add additional JavaScript code or remove the exit() statement
        // exit();
    }

    // Check if the photo was uploaded
    $photoUploaded = !empty($_FILES["img"]["tmp_name"]);
    if ($photoUploaded) {
        $photoUploaded = move_uploaded_file($_FILES["img"]["tmp_name"], $targetFilePath);
    }

    $photoPath = $photoUploaded ? $targetFilePath : null;

    // Check if the CV was uploaded
    $cvUploaded = !empty($_FILES["cv"]["tmp_name"]);
    if ($cvUploaded) {
        $cvUploaded = move_uploaded_file($_FILES["cv"]["tmp_name"], $targetFilePathCv);
    }

    $cvPath = $cvUploaded ? $targetFilePathCv : null;

    // Construct the SQL query with optional fields
    $sql = "INSERT INTO `faculty_members`(`name`, `photo`, `position`, `cv_path`) VALUES ('$name', NULLIF('$photoPath', ''), '$position', NULLIF('$cvPath', ''))";

    // Perform the database operation within a try-catch block
    try {
        $run = mysqli_query($con, $sql);

        if ($run) {
            echo "<script>alert('Teacher Profile is successfully added.'); window.location.href='addteacher.php?a=1';</script>";
        } else {
            echo "<script>alert('Error: Please fill in correct data.');</script>";
        }
    } catch (mysqli_sql_exception $e) {
        // Check if the error code indicates a duplicate entry
        if ($e->getCode() == 1062) { // MySQL error code for duplicate entry
            echo "<script>alert('Error: Duplicate email. Please enter a unique email.');</script>";
        } else {
            echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
        }
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
                                <font color="#146C94">&nbsp; Add Teacher</font>
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
                                            <label>Teacher Name</label>
                                            <input class="form-control" type="text" name="name" placeholder="Enter Teacher Name" required="required" style="" />
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Position</label>
                                            <input class="form-control" type="text" name="position" placeholder="Enter Teacher position" required="required" style="" />
                                        </div>
                                        <!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Profile Image<span class="color">*</span></label>
                                            <input class="tt" type="file" name="img" accept=".jpg,.jpeg, .png, .jfif" />
                                        </div><!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                              <label for="cv">CV (PDF only):</label>
                                              <input type="file" id="cv" name="cv" accept="application/pdf"/>
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
        ?> <script>
            alert("Teacher Profile is successfully added..");
        </script>
<?php
    }
}
?>
<?php
ob_flush();
?>
