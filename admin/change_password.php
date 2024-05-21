<?php
ob_start();
session_start();
error_reporting(0);
if(!$_SESSION['u']) {
    header('location:login.php');
}
include("config/connection.php");
?>
<?php
$query = "SELECT * FROM login_tb ";
$run = mysqli_query($con, $query);
while($row = mysqli_fetch_array($run)) {
    $dbusername = $row['username'];
    $dbpassword = $row['password'];
}
?>
<?php
if(isset($_POST['b1'])) {
    $opassword1 = $_POST['cpassword'];

    $npassword1 = $_POST['npassword'];

    $cfpassword1 = $_POST['cnpassword'];

    if(empty($_POST['npassword'])) {
        $passwordErr = "<span style='color:red'>*** This Field Is Reuired Min 6 Character ***</span>";
    }

    $id =  $_SESSION['id'];


    $query = "select * from login_tb";
    $run = mysqli_query($con, $query);
    while($row = mysqli_fetch_array($run)) {
        $id = $row['id'];
        $dbusername = $row['username'];
        $dbpassword = $row['password'];
    }

    if($opassword1 == $dbpassword) {
        if($npassword == $cfpassword) {
            $query = "UPDATE `login_tb` SET  `password` = '$npassword1' WHERE `id` = '$id' ";
            if(mysqli_query($con, $query)) {
                header("location:login.php?change=3");
            } else {
                echo "<script> alert('Password's Did't Match ! Thankyou..')</script>";

            }
        } else {
            echo "<script> alert('Password did not Match')</script>";
        }
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
                    <div class="left-news">
                        <h1 class="font-weight-bold text-center">
                            <font color="#237303">Change</font>
                            <font color="#111f29">&nbsp;Password</font>
                        </h1>
                        <p>internshiptime.com</p>
                    </div>
                </div>

                <div class="left-news border border-top-3 border-primary">
                    <div class="panel grey lighten-5 border border-dark">
                        <h6 class="font-weight-normal pt-1 pl-1 ">Info: Change Password</h6>
                        <hr>
                        <div class="panel-body p-5">
                            <?php
                            $username = $_SESSION['u'];
$query = "SELECT * FROM login_tb WHERE username = '$username'";
$run = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($run);

if ($row) {
    $dbusername = $row['username'];
    $dbpassword = $row['password'];
    ?>
                                <form method="post" autocomplete="off">
                                    <div class="form-group">
                                        <label style="font-size:15px;">Username</label>
                                        <input class="form-control" type="text" value="<?php echo $dbusername; ?>" disabled>
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
                            <?php
}
?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once("include1/footer.php"); ?>

	<?php
if (isset($_POST['b1'])) {
    $opassword1 = md5($_POST['opassword']);
    $npassword1 = md5($_POST['npassword']);

    if ($opassword1 == $dbpassword) {
        $query = "UPDATE `login_tb` SET  `password` = '$npassword1' WHERE `username` = '$username'";
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
