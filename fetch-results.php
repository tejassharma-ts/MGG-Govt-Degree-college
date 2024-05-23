<?php
session_start();
include "./admin/config/connection.php";

if (!isset($_SESSION['phone_number'])) {
    header('location:login.php');
    exit();
}

$phoneNumber = $_SESSION['phone_number'];
$sql = "SELECT * FROM results WHERE st_phone_number = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $phoneNumber);
$stmt->execute();
$result = $stmt->get_result();

// Fetch results and display download links
while ($row = $result->fetch_assoc()) {
    $resultPath = "./admin/" . $row['result_path'];
    $semester = $row['semester'];
    echo "<p><strong>Semester $semester:</strong> <a href='$resultPath' download>Download</a></p>";
}

$stmt->close();
$con->close();
?>

