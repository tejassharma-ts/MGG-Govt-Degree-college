<?php
ini_set('display_errors', 1);
include "./config/connection.php";
// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    ini_set('display_errors', 1);
    // Escape user inputs for security
    $admin_name = mysqli_real_escape_string($con, $_POST['u']);

    // Check if the admin already exists
    $query = "SELECT * FROM admins WHERE admin_name = '$admin_name'";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "User {$admin_name} already exist!";
    }

    // Escape user inputs for security
    $password = mysqli_real_escape_string($con, $_POST['p']);


    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Attempt to insert the user into the database
    $sql = "INSERT INTO admins (admin_name, password) VALUES ('$admin_name', '$hashed_password')";
    if(mysqli_query($con, $sql)) {
        header("Location: login.php");
        exit;
    } else {
        echo "ERROR: Could not execute $sql. " . mysqli_error($con);
    }

    // Close conection
    mysqli_close($con);
}
?>

