<?php
// Include your database connection code here
// Example: include 'db_connection.php';

// Assuming you have a database connection, retrieve the PDF file path from the database
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Assuming 'id' is the identifier for the PDF file in your database

    // Query to fetch the PDF file path based on the provided ID
    $sql = "SELECT cv_path FROM faculty_members WHERE id = ?";
    
    // Prepare and execute the query
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    
    // Bind the result variable
    $stmt->bind_result($pdfFilePath);
    
    // Fetch the result
    if ($stmt->fetch()) {
        // Check if the file exists
        if (file_exists($pdfFilePath)) {
            // Set the appropriate headers for PDF download
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . basename($pdfFilePath) . '"');
            header('Content-Length: ' . filesize($pdfFilePath));

            // Read the file and output its content to the browser
            readfile($pdfFilePath);
        } else {
            // If the file doesn't exist, display an error message
            echo "File not found.";
        }
    } else {
        // If no result found for the provided ID, display an error message
        echo "PDF not found for the provided ID.";
    }

    // Close the statement
    $stmt->close();
} else {
    // If no ID is provided, display an error message
    echo "No ID provided.";
}
?>

