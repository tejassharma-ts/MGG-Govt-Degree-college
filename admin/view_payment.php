<?php
ob_start();
session_start();
error_reporting(0);
if (!$_SESSION['u']) {
    header('location:login.php');
}

include("config/connection.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($con, $_GET['id']);
}

if (isset($_POST['submit'])) {
    // Form has been submitted

    // Get form data
    $w_status = mysqli_real_escape_string($con, $_POST['w_status']);

    if (isset($_POST['submit'])) {
        // Form has been submitted

        // Get form data
        $w_status = mysqli_real_escape_string($con, $_POST['w_status']);

        if ($_POST['service_name'] == 'Text Resume service' || $_POST['service_name'] == 'Visual Resume service') {
            // Handle file upload for text_resume or visual_resume

            // Check if a file is selected
            if (!empty($_FILES['file']['name'])) {
                $allowed_extensions = array('pdf', 'doc');

                // Get the file extension
                $file_extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

                // Generate a random filename
                $random_filename = uniqid('file_') . '.' . $file_extension;

                // Check if the file extension is allowed
                if (in_array(strtolower($file_extension), $allowed_extensions)) {
                    // Check if the file size is less than 1MB
                    if ($_FILES['file']['size'] < 1048576) { // 1 MB in bytes
                        // Move the uploaded file to the upload directory
                        $upload_directory = 'upload/';
                        move_uploaded_file($_FILES['file']['tmp_name'], $upload_directory . $random_filename);

                        // Update the database with the form data and file
                        $update_query = "UPDATE payment_tb SET work_status = '$w_status', file = '$random_filename' WHERE id = '$id'";
                    } else {
                        // File size exceeds 1MB
                        echo '<script>alert("File size should be less than 1MB.");</script>';
                    }
                } else {
                    // Invalid file type
                    echo '<script>alert("Invalid file type. Allowed types are PDF and DOC.");</script>';
                }
            } else {
                // No file selected, update the database without a file
                $update_query = "UPDATE payment_tb SET work_status = '$w_status' WHERE id = '$id'";
            }

            // Execute the update query
            $update_result = mysqli_query($con, $update_query);

            if ($update_result) {
                // Successfully updated
                echo '<script>alert("Update successful"); window.location.href = "payment.php";</script>';
            } else {
                // Failed to update
                echo '<script>alert("Update failed");window.location.href = "payment.php";</script></script>';
            }
        } elseif ($_POST['service_name'] == 'Interview Pro' || $_POST['service_name'] == 'Motivation class') {
            // Handle text input for online_interview_class or online_motivation_class
            $file = mysqli_real_escape_string($con, $_POST['file']);

            // Update the database with the form data
            $update_query = "UPDATE payment_tb SET work_status = '$w_status', file = '$file' WHERE id = '$id'";
            $update_result = mysqli_query($con, $update_query);

            if ($update_result) {
                // Successfully updated
                echo '<script>alert("Update successful"); window.location.href = "payment.php";</script>';
            } else {
                // Failed to update
                echo '<script>alert("Update failed");window.location.href = "payment.php";</script></script>';
            }
        } else {
            // Handle company selection for other roles
            $file = (isset($_POST['file']) ? $_POST['file'] : '');

            // Update the database with the form data
            $update_query = "UPDATE payment_tb SET work_status = '$w_status', file = '$file' WHERE id = '$id'";
            $update_result = mysqli_query($con, $update_query);

            if ($update_result) {
                // Successfully updated
                echo '<script>alert("Update successful"); window.location.href = "payment.php";</script>';
            } else {
                // Failed to update
                echo '<script>alert("Update failed");window.location.href = "payment.php";</script></script>';
            }
        }
    }
}
$query = "SELECT * FROM payment_tb where id='$id'";
$rs_result = mysqli_query($con, $query);


while ($row = mysqli_fetch_array($rs_result)) {
?>
    <?php include_once("include1/sidenav.php"); ?>
    <div class="page-wrapper">
        <?php include_once("include1/header.php"); ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 mb-5">
                    <div class="left-news">
                        <div class="box-2">
                            <h4 class="text-1"> Payment History</h4>
                            <hr>
                            <div class="box-3">
                                <div class="row">
                                    <div class="col-lg-4">

                                        <label>Customer Name</label>
                                        <input class="form-control" type="text" readonly value="<?php echo $row['name']; ?>">
                                    </div>
                                    <div class="col-lg-4">

                                        <label>Phone No.</label>
                                        <input class="form-control" type="text" readonly value="<?php echo $row['phone']; ?>">
                                    </div>
                                    <div class="col-lg-4">

                                        <label>Service type</label>
                                        <input class="form-control" type="text" readonly value="<?php echo $row['service_name']; ?>">
                                    </div>
                                    <div class="col-lg-4">

                                        <label>Query Raised on</label>
                                        <input class="form-control" type="text" readonly value="<?php echo date('d-m-Y', strtotime($row['date_time'])); ?>">
                                    </div>
                                    <div class="col-lg-4">

                                        <label>Payment Status</label>
                                        <input class="form-control" type="text" readonly value="<?php echo $row['pay_status']; ?>">
                                    </div>
                                    <div class="col-lg-4">

                                        <label>Transaction Id</label>
                                        <input class="form-control" type="text" readonly value="<?php echo $row['trans_id']; ?>">
                                    </div>


                                </div>
                                <form enctype="multipart/form-data" action="" method="post" class="row align-items-center">
                                    <input class="form-control" type="hidden" name="service_name" value="<?php echo $row['service_name']; ?>">
                                    <div class="col-lg-4">

                                        <label>Work Status:</label>
                                        <select name="w_status" class="form-control fs-6 tt1">
                                            <option disabled>Select Status</option>
                                            <option value="pending" <?php echo ($row['work_status'] == 'pending') ? 'selected' : ''; ?>>
                                                Pending</option>
                                            <option value="running" <?php echo ($row['work_status'] == 'running') ? 'selected' : ''; ?>>
                                                Running</option>

                                            <option value="closed" <?php echo ($row['work_status'] == 'closed') ? 'selected' : ''; ?>>
                                                Closed</option>

                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php
                                        if ($row['service_name'] == 'Text Resume service' || $row['service_name'] == 'Visual Resume service') {
                                        ?>
                                            <label>Upload File:</label>
                                            <input class=" fs-6" type="file" name="file">
                                            <br>
                                            <p class="fs-4"> Uploaded File: <span class=" text-danger"><?php echo $row['file']; ?></span></p>
                                        <?php
                                        } elseif ($row['service_name'] == 'Interview Pro' || $row['service_name'] == 'Motivation class') {
                                        ?>
                                            <label>Upload Link:</label>
                                            <input class="form-control fs-6" type="text" name="file" value="<?php echo $row['file']; ?>">
                                        <?php
                                        } else {
                                        ?>
                                            <label>Select Company:</label>

                                        <?php
                                            // Your SQL query
                                            $sql = "SELECT orgname FROM cjobreg_tb
                UNION
                SELECT orgname FROM cinternreg_tb";

                                            // Execute the query
                                            $result = mysqli_query($con, $sql);

                                            // Check for errors
                                            if (!$result) {
                                                die('Error: ' . mysqli_error($con));
                                            }

                                            // Create the HTML select element
                                            echo '<select  class="form-control fs-6" name="file" id="file">';
                                            echo '<option selected disabled> --Select--</option>';
                                            // Loop through the result set and generate options
                                            while ($row1 = mysqli_fetch_assoc($result)) {
                                                $orgname = htmlspecialchars($row1['orgname']);
                                                $selected = ($orgname == $row['file']) ? 'selected' : '';
                                                // Check if the orgname is the selected value

                                                echo '<option class="text-uppercase" value="' . $orgname . '" ' . $selected . '>' . $orgname . '</option>';
                                            }
                                            echo '</select>';
                                        }
                                        ?>
                                    </div>

                                    <div class="col-lg-2">
                                        <button type="submit" name="submit" class="btn btn-danger fs-6">
                                            Update</button>
                                    </div>

                                </form>

                            <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!--6-->
            </div>
            <!--row2-->
            <?php
            if (isset($_GET['del'])) {
                $id = $_GET["del"];

                $d = "delete from job_tb where id = '$id' ";

                $del = mysqli_query($con, $d);
                if ($del) {
                    header("location:payment.php?d=1");
                    exit();
                }
            }
            ?>
            <?php
            if (isset($_GET['d'])) {
                if ($_GET['d'] == 1) {
            ?>
                    <script>
                        alert("Job is Deleted Successfully!!!");
                    </script>
            <?php
                }
            }
            ?>
            <?php
            if (isset($_GET['u'])) {
                if ($_GET['u'] == 1) {
            ?>
                    <script>
                        alert("Job is Updated Successfully!!!");
                    </script>
            <?php
                }
            }
            ?>
            <?php
            ob_flush();
            ?>
            <?php include_once("include1/footer.php"); ?>