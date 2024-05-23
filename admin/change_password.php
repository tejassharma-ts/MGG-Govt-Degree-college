<?php
ob_start();
session_start();
error_reporting(0);
if(!$_SESSION['u']) {
    header('location:login.php');
    exit; // Ensure to stop execution after redirection
}
include("config/connection.php");

// Fetch admin information based on session username
$username = $_SESSION['u'];
$query = "SELECT * FROM admins WHERE admin_name = '$username'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
if (!$row) {
    // If admin not found, redirect to login page
    header('location:login.php');
    exit;
}

$dbpassword = $row['password']; // Get the current hashed password from the database
?>

<?php include_once("include1/sidenav.php"); ?>

<div class="page-wrapper">
    <?php include_once("include1/header.php"); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 mb-5">
                <div class="row mt-4">
                    <div class="left-news">
                        <h1 class="font-weight-bold text-center">
                            <font color="#237303">Change</font>
                            <font color="#111f29">&nbsp;Password</font>
                        </h1>
                    </div>
                </div>

                <div class="left-news border border-top-3 border-primary">
                    <div class="panel grey lighten-5 border border-dark">
                        <h6 class="font-weight-normal pt-1 pl-1 ">Info: Change Password</h6>
                        <hr>
                        <div class="panel-body p-5">
                            <form method="post" autocomplete="off">
                                <div class="form-group">
                                    <label style="font-size:15px;">Username</label>
                                    <input class="form-control" type="text" value="<?php echo $username; ?>" disabled>
                                </div>

                                <div class="form-group">
                                    <label style="font-size:15px;">Old Password</label>
                                    <input class="form-control" type="password" name="opassword" placeholder="Enter old Password" required>
                                </div>

                                <div class="form-group">
                                    <label style="font-size:15px;">New Password</label>
                                    <input class="form-control" type="password" name="npassword" placeholder="Enter New Password" required>
                                </div>

                                <button type="submit" class="btn btn-danger" name="b1">CHANGE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("include1/footer.php"); ?>

    <?php
    if (isset($_POST['b1'])) {
        $opassword1 = $_POST['opassword'];
        $npassword1 = $_POST['npassword'];

        if (password_verify($opassword1, $dbpassword)) {
            // Hash the new password
            $hashed_password = password_hash($npassword1, PASSWORD_DEFAULT);

            // Update password in the database
            $query = "UPDATE `admins` SET `password` = '$hashed_password' WHERE `admin_name` = '$username'";
            if (mysqli_query($con, $query)) {
                header("location:change_password.php?change=3");
                exit;
            } else {
                // Password change failed
                echo '<script>alert("Failed to change password. Please try again.");</script>';
            }
        } else {
            // Incorrect old password
            echo '<script>alert("Incorrect old password. Password not changed.");</script>';
        }
    }

if (isset($_GET['change']) && $_GET['change'] == 3) {
    ?>
        <script>
            alert("Your password is updated successfully...\nThank you!");
        </script>
        <?php
}
?>

