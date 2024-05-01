<?php
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
    echo "Connected successfully";
    // You can execute your queries here
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_submitted'])) {
    // Retrieve form inputs
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    // Retrieve the selected value from the hidden input field
    $etablissement = isset($_POST['etablissement']) ? $_POST['etablissement'] : '';
    echo "Selected Etablissement: " . $etablissement;
    // Check if there is a row with the same values in the 'prof' table
    $sql = "SELECT * FROM prof WHERE prenom='$first_name' AND nom='$last_name' AND email='$email' AND num='$phone'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // If a row with the same values exists, update the 'pass' column
        $row = $result->fetch_assoc();
        $prof_id = $row['id']; // Assuming 'id' is the primary key in the 'prof' table
        $sql_update = "UPDATE prof SET pass='$password' WHERE id='$prof_id'";
        if ($conn->query($sql_update) === TRUE) {
            echo "Password updated successfully for Prof";
        } else {
            echo "Error updating password for Prof: " . $conn->error;
        }
    } else {
        // If no row with the same values exists, insert into 'condidat' table
        $sql_insert = "INSERT INTO condidat (prenom, nom, email, num, pass, etablissement) VALUES ('$first_name', '$last_name', '$email', '$phone', '$password', '$etablissement')";

        if (mysqli_query($conn, $sql_insert)) {
            echo "New record created successfully for Condidat";
        } else {
            echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
        }
    }
    header("Location: login.php");
}

// Close the connection
mysqli_close($conn);
?>
