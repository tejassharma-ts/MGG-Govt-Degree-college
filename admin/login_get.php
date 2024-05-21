<?php
ob_start();
session_start();
ini_set('display_errors', 1);
include './config/connection.php';

// Check if the form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {

    // Escape user inputs for security
    $admin_name= $_SESSION['u'] = mysqli_real_escape_string($con, $_POST['u']);
    $password = $_SESSION['p'] = mysqli_real_escape_string($con, $_POST['p']);

    // Fetch user data from the database
    $sql = "SELECT * FROM admins WHERE admin_name='$admin_name'";
    $result = mysqli_query($con, $sql);

    // If atleast one row is present
    if(mysqli_num_rows($result) == 1) {
        // User found, verify password
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row['password'])) {
            header("Location: index.php?success=1");
            exit(); // Add an exit after header to stop further execution
        } else {
            header("Location: login.php?wrong=2");
            exit(); // Add an exit after header to stop further execution
        }
    } else {
        header("Location: login.php?wrong=2");
        exit(); // Add an exit after header to stop further execution

    }

    // Close conection
    mysqli_close($con);
}
?>

