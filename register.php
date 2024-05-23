<?php
session_start(); // Start or resume the session

include("./admin/config/connection.php");

if (isset($_SESSION['phone_number'])) {
    header('location:main.php'); // Redirect to login if the session is not set
    exit();
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Admin Login</title>

        <!-- GOOGLE FONTS -->
        <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">
        <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
        <link href="plugins/simplebar/simplebar.css" rel="stylesheet" />

        <!-- PLUGINS CSS STYLE -->
        <link href="./admin/plugins/nprogress/nprogress.css" rel="stylesheet" />

        <!-- MONO CSS -->
        <link id="main-css-href" rel="stylesheet" href="./admin/css1/style.css" />

        <!-- FAVICON -->
        <link href="images/favicon.png" rel="shortcut icon" />

        <script src="plugins/nprogress/nprogress.js"></script>
</head>

<body class="bg-light-gray" id="body">
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 100vh">
        <div class="d-flex flex-column justify-content-between">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="card card-default mb-0">
                        <div class="card-body px-5 pb-5 mt-4">

                            <h4 class="text-dark mb-6 text-center">Student Register</h4>

                            <form action="" method="post" autocomplete="off">
                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <input type="text" name="user_name" placeholder="Username" required="required" class="form-control input-lg" id="email" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group col-md-12 mb-4">
                                        <input type="number" name="phone_number" placeholder="Phone number" required="required" class="form-control input-lg" id="phone_number" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group col-md-12 ">
                                        <input type="password" name="password" placeholder="Password" required="required" id="myInput" class="form-control input-lg">
                                    </div>
                                    <div class="col-md-12">

                                        <div class="d-flex mb-3">
                                            <input type="checkbox" onclick="myFunction()" style="width:5%;">&nbsp;<strong style="color:#c9c9c9;">Show Password</strong>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button name="btn1" type="submit" class="btn btn-primary btn-pill mb-4">Sign In</button>
                                        </div>
                                            <div class="d-flex justify-content-start">
                                                <p>Already have an account ? <a href="login.php">login</a></p>
                                            </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>

</html>

<?php
ini_set('display_errors', 1);
// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Escape user inputs for security
    $studentName = mysqli_real_escape_string($con, $_POST['user_name']);
    $phoneNumber = mysqli_real_escape_string($con, $_POST['phone_number']);

    if (strlen($phoneNumber) !== 10) {
        echo "<script>alert('Phone number is not valid');</script>";
        exit();
    }

    // Check if the admin already exists
    $query = "SELECT * FROM students WHERE phone_number = '$phoneNumber'";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<script>alert('The number is already registered!');</script>";
        exit();
    }

    // Escape user inputs for security
    $password = mysqli_real_escape_string($con, $_POST['password']);


    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Attempt to insert the user into the database
    $sql = "INSERT INTO students (name , phone_number, password) VALUES ('$studentName', '$phoneNumber', '$hashedPassword')";

    // If successfully register redirect user to login page
    if(mysqli_query($con, $sql)) {
        header("Location: login.php");
        echo "Redirecting student to login page";
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($con);
    }

    // Close connection
    mysqli_close($con);
}
?>
