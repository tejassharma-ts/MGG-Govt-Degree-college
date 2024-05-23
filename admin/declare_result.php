<?php
ob_start();
session_start();
ini_set('display_errors', 1);

if (!$_SESSION['u']) {
    header('location:login.php');
    exit();
}

include("./config/connection.php");

if (isset($_POST['post'])) {

    $phoneNumber = mysqli_real_escape_string($con, $_POST["phone_number"]);
    $semester = intval($_POST["semester"]);

    if (strlen($phoneNumber) != 10) {
        echo "<script>alert('Phone number is not valid');</script>";
        exit();
    }

    // Check if the result is already declared for this student for the selected semester
    $sql = "SELECT * FROM results WHERE st_phone_number = ? AND semester = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("si", $phoneNumber, $semester);
    $stmt->execute();

    if ($stmt->errno) {
        echo "Error occurred: " . $stmt->error;
        exit();
    }

    $result = $stmt->get_result();

    if ($result->num_rows != 0) {
        echo "The result for this student for the selected semester has already been declared.";
        exit();
    }

    $stmt->close();

    // Check if the student exists
    $sql = "SELECT * FROM students WHERE phone_number = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $phoneNumber);
    $stmt->execute();

    if ($stmt->errno) {
        echo "Error occurred: " . $stmt->error;
        exit();
    }

    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "No student found with this phone number. Please make sure the phone number is correct.";
        exit();
    }

    $stmt->close();

    // Result upload
    $targetDir = "upload/results/";
    $fileName = uniqid() . '_' . basename($_FILES['result']['name']);
    $targetFilePath = $targetDir . $fileName;

    $maxFileSize = 1 * 1024 * 1024;
    if ($_FILES["result"]["size"] > $maxFileSize) {
        echo "<script>alert('Error: result size exceeds 1 MB limit.');</script>";
        exit();
    }

    if (file_exists($targetFilePath)) {
        echo "<script>alert('Error: File already exists.');</script>";
        exit();
    }

    if (move_uploaded_file($_FILES["result"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO results (st_phone_number, result_path, semester) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);
        if ($stmt === false) {
            die("Prepare failed: " . $con->error);
        }

        $stmt->bind_param("ssi", $phoneNumber, $targetFilePath, $semester);
        if ($stmt->execute()) {
            echo "<script>alert('Result is successfully added.'); window.location.href='declare_result.php?a=1';</script>";
        } else {
            echo "<script>alert('Error: Please fill in correct data.');</script>";
        }
        $stmt->close();
    } else {
        echo "<script>alert('Error uploading the result.');</script>";
    }
}
?>

<?php include_once("include1/sidenav.php"); ?>
<div class="page-wrapper">
    <?php include_once("include1/header.php"); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 mb-5">
                <div class="row mt-4">
                    <div class="col-lg-12 col-lg-offset-2">
                        <div class="left-news">
                            <h2 class="font-weight-bold text-center">
                                <font color="#146C94">&nbsp; Declare Result</font>
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="border border-top-3 border-danger">
                    <div class="panel grey lighten-5 border">
                        <h6 class="font-weight-normal pt-1 pl-1">Info : Fill Up Details</h6>
                        <hr>
                        <div class="panel-body p-4">

                            <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Student Phone Number</label>
                                            <input class="form-control tt" type="number" name="phone_number" placeholder="Enter Student Phone Number" required="required" />
                                        </div><!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="semester">Semester</label>
                                            <select class="form-control" id="semester" name="semester" required>
                                                <option value="" disabled selected>Select Semester</option>
                                                <option value="1">1st Semester</option>
                                                <option value="2">2nd Semester</option>
                                                <option value="3">3rd Semester</option>
                                                <option value="4">4th Semester</option>
                                                <option value="5">5th Semester</option>
                                                <option value="6">6th Semester</option>
                                            </select>
                                        </div><!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="result">Result (PDF only):</label>
                                            <input type="file" id="result" name="result" accept="application/pdf" required/>
                                        </div><!--form-group-->
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="post" class="btn btn-danger">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once("include1/footer.php"); ?>

<?php
if (isset($_GET['a']) && $_GET['a'] == 1) {
    echo "<script>alert('Result is successfully added.');</script>";
}
ob_flush();
?>

