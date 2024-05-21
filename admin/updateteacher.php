<?php
ob_start();
session_start();

if (!$_SESSION['u']) {
    header('location:login.php');
}
include("config/connection.php");

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($con, $_POST['id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $position = mysqli_real_escape_string($con, $_POST['position']);
    // $email = mysqli_real_escape_string($con, $_POST['email']);

    // File Upload
    if ($_FILES["photo"]["size"] > 0) {
        $targetDir = "upload/teachers/";
        $fileName = uniqid() . '_' . basename($_FILES["photo"]["name"]);
        $targetFilePath = $targetDir . $fileName;

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath)) {
            // Update with new image
            $sql = "UPDATE `faculty_members` SET `name`='$name', `position`='$position', `photo`='$targetFilePath' WHERE `id`='$id'";
        } else {
            echo "<script>alert('Error uploading the file.');</script>";
            exit();
        }
    } else {
        // Update without changing the image
        $sql = "UPDATE `faculty_members` SET `name`='$name', `position`='$position' WHERE `id`='$id'";
    }

    $run = mysqli_query($con, $sql);

    if ($run) {
        echo "<script>alert('Teacher Profile is successfully updated.'); window.location.href='viewteacher.php?a=2';</script>";
    } else {
        echo "<script>alert('Error: Please fill in correct data.');</script>";
    }
}

// Fetch teacher details by ID from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM faculty_members WHERE id = '$id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        // $email = $row["email"];
        $position = $row["position"];
        $cv = $row["cv_path"];
        $photo = $row["photo"];

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
						        <font color="#146C94">&nbsp;Update Teacher Details</font>
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
                                        <label>Teacher Name<span class="color">*</span></label>
                                        <input class="form-control tt" type="text" name="name" placeholder="Enter Teacher Name" required="required" value="<?php echo $name; ?>" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                        <div class="form-group ">
                                            <label>Position</label>
                                        <input class="form-control" type="text" name="position" placeholder="Enter Teacher position" required="required" style="" value="<?php echo $position; ?>"/>
                                        </div>
                                        <!--form-group-->
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group ">
                                        <label>Profile Image</label>
                                        <input class="tt" type="file" name="photo" accept=".jpg,.jpeg, .png, .jfif" />
                                        <p class="text-danger">Uploaded File:- <?php echo $photo; ?></p>
                                    </div>
                                </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                              <label for="cv">CV (PDF only):</label>
                                              <input type="file" id="cv" name="cv" accept="application/pdf"/>
                                                <p class="text-danger">Uploaded CV:- <?php echo $cv ; ?></p>
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
