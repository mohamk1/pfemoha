<?php
// Check if the candidate ID is provided in the URL
if(isset($_GET['id'])) {
    $candidate_id = $_GET['id'];

    // Check if the form is submitted
    if(isset($_POST['submit'])) {
        // Get the note value from the form
        $note = $_POST['note'];
        
        // Validate note value if necessary
        
        // Database connection code
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

        // Update the corresponding cor field based on the value of $kk
        $kk = 1; 
        $ep=1;
        switch ($kk) {
            case 1:
                $update_score_sql = "INSERT INTO `note`(`note`, `cor1`, `cor2`, `cor3`, `epreuve`, `condidat`) VALUES ('','$note','','',' $ep',' $candidate_id')";
                break;
            case 2:
                $update_score_sql = "INSERT INTO `note`(`note`, `cor1`, `cor2`, `cor3`, `epreuve`, `condidat`) VALUES ('','','$note','',' $ep',' $candidate_id')";

                break;
            case 3:
                $update_score_sql = "INSERT INTO `note`(`note`, `cor1`, `cor2`, `cor3`, `epreuve`, `condidat`) VALUES ('','','','$note',' $ep',' $candidate_id')";

                break;
            default:
                echo "<p class='message'>Invalid value of $kk.</p>";
                exit; // Stop further execution if $kk is invalid
        }
        
        // Execute the update query
        if ($conn->query($update_score_sql) === TRUE) {
            echo "<p class='message'>Score updated successfully.</p>";
            header("Location: seasair.php");
            exit;
        } else {
            echo "<p class='message'>Error updating score: " . $conn->error . "</p>";
        }

        // Close database connection
        $conn->close();
    }
} else {
    echo "<p class='message'>Candidate ID is missing.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Candidate Score</title>
<style>
/* Basic CSS for styling */
.container {
    max-width: 400px;
    margin: 0 auto;
}

form {
    margin-bottom: 20px;
}

input[type="text"] {
    width: 100%;
    padding: 8px;
}

input[type="submit"] {
    padding: 8px 16px;
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.message {
    font-weight: bold;
    margin-top: 20px;
}
</style>
</head>
<body>
<div class="container">
    <h2>Update Candidate Score</h2>
    <form method="post" action="">
        <label for="note">Enter Note:</label>
        <input type="text" id="note" name="note" placeholder="Enter note">
        <input type="submit" name="submit" value="Update Score">
    </form>
</div>
</body>
</html>
