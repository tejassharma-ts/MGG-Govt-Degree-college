<?php
ob_start();
session_start();
include 'config/connection.php';

?>
<!DOCTYPE html>
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
        <link href="plugins/nprogress/nprogress.css" rel="stylesheet" />

        <!-- MONO CSS -->
        <link id="main-css-href" rel="stylesheet" href="css1/style.css" />

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
                        <div class="card-header bg-dark pb-0">
                            <div class="app-brand w-100 d-flex justify-content-center border-bottom-0">
                                <a class="w-auto pl-0 " href="../index.php">
                                    <img src="../images/Mahayogi Guru Gorakhnath Govt/logo2.jpg" width="100%">
                                </a>
                            </div>
                        </div>
                        <div class="card-body px-5 pb-5 mt-4">

                            <h4 class="text-dark mb-6 text-center">ADMIN LOGIN</h4>

                            <form action="login_get.php" method="post" autocomplete="off">
                                <div class="row">
                                    <div class="form-group col-md-12 mb-4">
                                        <input type="text" name="u" placeholder="Username" required="required" class="form-control input-lg" id="email" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group col-md-12 ">
                                        <input type="password" name="p" placeholder="Password" required="required" id="myInput" class="form-control input-lg">
                                    </div>
                                    <div class="col-md-12">

                                        <div class="d-flex mb-3">
                                            <input type="checkbox" onclick="myFunction()" style="width:5%;">&nbsp;<strong style="color:#c9c9c9;">Show Password</strong>
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            <button name="btn1" type="submit" class="btn btn-primary btn-pill mb-4">Sign In</button>
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
if (isset($_GET['wrong'])) {
    if ($_GET['wrong'] == 2) { ?>
        <script>
            alert("please enter correct username or password!!!");
        </script>
        <?php 
    }
    } ?>
<?php session_destroy(); ?>
<?php ob_flush(); ?>
