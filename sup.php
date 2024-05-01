<?php
// Check if the ID parameter is provided in the URL
if(isset($_GET['id'])) {
    // Database credentials
    $hostname = "localhost"; // Change this to your database hostname
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $database = "pfe"; // Change this to your database name

    // Attempt to connect to the database
    $conn = mysqli_connect($hostname, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        // Retrieve the professor ID from the URL parameter
        $prof_id = $_GET['id'];

        // Query to delete the professor from the database
        $sql = "DELETE FROM prof WHERE `code_enseingnat` = '$prof_id'";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            echo "Professor deleted successfully";
        } else {
            echo "Error deleting professor: " . mysqli_error($conn);
        }
    }
    // Close connection
    mysqli_close($conn);
} else {
    echo "Professor ID not provided.";
}
?>
