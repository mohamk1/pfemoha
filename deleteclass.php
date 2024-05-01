<?php
// Check if the delete button was clicked and a value was sent
if(isset($_POST['delete'])) {
    // Database connection parameters
    $hostname = "localhost"; // Change this to your database hostname
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $database = "pfe"; // Change this to your database name
    
    // Establish a connection to the database
    $conn = mysqli_connect($hostname, $username, $password, $database);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the numclass value from the form submission
    $numclass = $_POST['delete'];

    // Prepare SQL statement to delete the record
    $sql = "DELETE FROM class WHERE numclass = $numclass";

    // Execute the SQL statement
    if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If the delete button was not clicked or no value was sent
    echo "Invalid request";
}
?>
