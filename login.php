<?php
ini_set('display_errors', 1);
?>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>Student login</title>

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

                            <h4 class="text-dark mb-6 text-center">Student Login</h4>

                            <form action="" method="post" autocomplete="off">
                                <div class="row">
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
                                                <p>Don't have account ? <a href="register.php">register</a></p>
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
include "./db/connection.php";
// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if (strlen($phone_number) !== 10) {
        echo "<script>alert('Phone number is not valid');</script>";
        exit();
    }

    // Prepare and bind
    $stmt = $con->prepare("SELECT password FROM students WHERE phone_number = ?");
    $stmt->bind_param("s", $phone_number);

    // Execute the statement
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows > 0) {
        // Bind result variables
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, start a session or handle login success
            header("Location: main.php");
        } else {
            // Password is incorrect
            echo "<script>alert('Credentials are not valid');</script>";
        }
    } else {
        // Phone number does not exist
        echo "<script>alert('No user found with that phone number');</script>";
    }
    // Close the statement and connection
    $stmt->close();
    mysqli_close($con);
}
?>

