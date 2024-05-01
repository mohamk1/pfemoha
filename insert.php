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
} else {
    echo "Connected successfully";
    // You can execute your queries here
}

// Get data from the form
$numclass = $_POST['numclass'];

// Prepare SQL statement to insert data into the 'class' table
$sql = "INSERT INTO `class`(`numclass`) VALUES ('$numclass')";

// Execute SQL statement
if (mysqli_query($conn, $sql)) {
    echo "Data inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
