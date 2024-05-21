<?php
ob_start();
session_start();
ini_set('display_errors', 1);
if (!$_SESSION['u']) {
    header('location:login.php');
}
include("./config/connection.php");

if (isset($_POST['post'])) {

    $phoneNumber = mysqli_real_escape_string($con, $_POST["phone_number"]);

    if (strlen($phoneNumber) != 10) {
        echo "<script>alert('Phone number is not valid');</script>";
        exit();
    }

    // Check if the result is already declared for this student 
    
    $sql = "SELECT * FROM results WHERE st_phone_number = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $phoneNumber);
    $stmt->execute();

    // Check for errors during query execution
    if ($stmt->errno) {
        echo "Error occurred: " . $stmt->error;
        exit();
    }

    $result = $stmt->get_result();

    // Check if any results were found
    if ($result->num_rows != 0) {
        echo "The result for this student is been already declared";
        exit;
    }

    // Prepare SQL statement with a prepared statement
    $sql = "SELECT * FROM students WHERE phone_number = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $phoneNumber);
    $stmt->execute();


    // Check for errors during query execution
    if ($stmt->errno) {
        echo "Error occurred: " . $stmt->error;
        exit();
    }

    // Get the result set
    $result = $stmt->get_result();

    // Check if any results were found
    if ($result->num_rows == 0) {
        echo "No student found with this phone number. Please make sure the phone number is correct.";
        exit();
    }

    // Result upload
    $targetDir = "upload/results/";
    $fileName = uniqid() . '_' . basename($_FILES['result']['name']); // Generate a unique filename
    $targetFilePath = $targetDir . $fileName; // Final file path

    // Check file size (in bytes)
    $maxFileSize = 1 * 1024 * 1024;
    if ($_FILES["result"]["size"] > $maxFileSize) {
        echo "<script>alert('Error: result size exceeds 1 MB limit.');</script>";
        // You can add additional JavaScript code or remove the exit() statement
        // exit();
    }

    if (file_exists($targetFilePath)) {
        echo "<script>alert('Error: File already exists.');</script>";
        // You can add additional JavaScript code or remove the exit() statement
        // exit();
    }


    // Upload file
    if (move_uploaded_file($_FILES["result"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO `results` (`st_phone_number`, `result_path`) VALUES ('$phoneNumber', '$targetFilePath')";
        try {
            $run = mysqli_query($con, $sql);

            if ($run) {
                echo "<script>alert('Teacher Profile is successfully added.'); window.location.href='declare_result.php?a=1';</script>";
            } else {
                echo "<script>alert('Error: Please fill in correct data.');</script>";
            }
        } catch (mysqli_sql_exception $e) {
            // Check if the error code indicates a duplicate entry
            if ($e->getCode() == 1062) { // MySQL error code for duplicate entry
                echo "<script>alert('Error: Duplicate email. Please enter unique email.');</script>";
            } else {
                echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
            }
        }
    } else {
        echo "<script>alert('Error uploading the CV.');</script>";
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
                                <font color="#146C94">&nbsp; Declare Result</font>
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
                                        <div class="form-group">
                                            <label>Student Phone number</label>
                                            <input class="form-control tt" type="number" name="phone_number" placeholder="Enter Student phone number" required="required" />
                                        </div><!--form-group-->
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group ">
                                              <label for="result">Result (PDF only):</label>
                                              <input type="file" id="result" name="result" accept="application/pdf" required/>
                                        </div><!--form-group-->
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" name="post" class="btn btn-danger">Submit</button>
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
            alert("Teacher Profile is successfully added..");
        </script>
<?php
    }
}
?>
<?php
ob_flush();
?>

