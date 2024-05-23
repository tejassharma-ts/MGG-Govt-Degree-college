<?php

// display the fatals errors
// ini_set('display_errors', 1);
// Connection details
$server = "localhost";
$username = "root";
$password = "";
$db = "university";
// Create conection
$con = new mysqli($server, $username, $password, $db);

// Check conection status
if ($con->connect_error) {
    die("Connection failed. Reason: " . $con->connect_error);
}
// TODO: remove in prod
echo "Connected!\n";
