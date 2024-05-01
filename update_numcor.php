<?php
$hostname = "localhost"; // Change this to your database hostname
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$database = "pfe"; // Change this to your database name

// Attempt to connect to the database
$conn = mysqli_connect($hostname, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if code_enseingnat and numcor are set
if (isset($_POST['code_enseingnat']) && isset($_POST['numcor'])) {
    // Sanitize inputs to prevent SQL injection
    $code_enseingnat = mysqli_real_escape_string($conn, $_POST['code_enseingnat']);
    $numcor = mysqli_real_escape_string($conn, $_POST['numcor']);
    
    // Update numcor for the specified code_enseingnat
    $sql = "UPDATE prof SET numcor = '$numcor' WHERE code_enseingnat = '$code_enseingnat'";
    if (mysqli_query($conn, $sql)) {
        echo "Numcor updated successfully";
    } else {
        echo "Error updating numcor: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
