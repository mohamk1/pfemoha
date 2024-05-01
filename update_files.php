<?php
session_start();

// Database credentials
$hostname = "localhost";
$username = "root";
$password = "";
$database = "pfe";

// Attempt to connect to the database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    // Retrieve file data from the form
    $birthCertificate = $_FILES['birth-certificate']['name'];
    $schoolCertificate = $_FILES['school-certificate']['name'];
    $scoreSheet = $_FILES['score-sheet']['name'];
    $profilePic = $_FILES['profile-pic']['name'];

    // Example SQL queries to update the files in the "condidat" table
    $sql = "INSERT INTO condidat (birth, school, score, picture) VALUES (?, ?, ?, ?)";
    
    // Prepare the SQL query using prepared statements
    $stmt = mysqli_prepare($conn, $sql);
    
    // Bind parameters and execute the statement
    mysqli_stmt_bind_param($stmt, "ssss", $birthCertificate, $schoolCertificate, $scoreSheet, $profilePic);
    mysqli_stmt_execute($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($conn);


    exit();
}
?>
