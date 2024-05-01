<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        // Retrieve form data
        $prof_id = $_POST['prof_id'];
        $name = $_POST['name'];
        $prenom = $_POST['prenom'];
        $numero = $_POST['numero'];
        $grade = $_POST['grade'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        // Update professor's information in the database
        $sql = "UPDATE prof SET nom='$name', prenom='$prenom', num='$numero', module='$grade', password='$password', email='$email' WHERE `code_enseingnat` = '$prof_id'";

        if (mysqli_query($conn, $sql)) {
            echo "Professor information updated successfully";
        } else {
            echo "Error updating professor information: " . mysqli_error($conn);
        }
    }
    // Close connection
    mysqli_close($conn);
} else {
    echo "Invalid request";
}
?>
