<?php


// Directory where uploaded files are stored
$upload_directory = "../../condidat/uploads";

// Get all files in the upload directory
$files = glob($upload_directory . "*");

// Handle accept action
if (isset($_GET['accept']) && isset($_GET['file'])) {
    $file_to_accept = $_GET['file'];
    // Update the 'accepter' column in the 'condidat' table to 1 for the corresponding file
    // Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
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
    }
        // You can execute your queries here
    // Escape the file name to prevent SQL injection
    $escaped_file_name = $conn->real_escape_string($file_to_accept);

    // Update the 'accepter' column to 1 for the corresponding file
    $sql = "UPDATE condidat SET accepter = 1 WHERE code = '$escaped_file_name'";
    if ($conn->query($sql) === TRUE) {
        // File accepted successfully
        // You can add a success message here if needed
    } else {
        // Error updating file acceptance status
        // You can add an error message here if needed
    }

    // Close connection
    $conn->close();
}

?>

















<?php
session_start();

// Check if user is logged in as admin, you may need to implement your own authentication logic here
$is_admin = true; // Set to true if user is admin, otherwise false

if (!$is_admin) {
    // Redirect to login page or show an error message
    header("Location: login.php");
    exit();
}

// Directory where uploaded files are stored
$upload_directory = "../../condidat/uploads/";

// Get all files in the upload directory
$files = glob($upload_directory . "*");

// Filter files based on 'accepter' column in the 'condidat' table
// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials
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

// Query to select files where 'accepter' column is 0
$sql = "SELECT code FROM condidat WHERE accepter = 0";
$result = mysqli_query($conn, $sql);

// Array to store file names that need to be displayed
$files_to_display = array();

// Fetch file names from the result set
while ($row = mysqli_fetch_assoc($result)) {
    $files_to_display[] = $row['code'];
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
            color: #6a0dad; /* Purple color for the title */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .accept-button {
            background-color: #6a0dad; /* Purple color for the button */
            color: #fff;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
        }

        .accept-button:hover {
            background-color: #4b057e; /* Darker purple on hover */
        }

        .download-link {
            text-decoration: none;
            color: #6a0dad; /* Purple color for links */
        }
    </style>
</head>
<body>
    <h2>Admin Page</h2>
    <table>
        <tr>
            <th>File Name</th>
            <th>Download Link</th>
            <th>Accepter</th>
        </tr>
        <?php
        // Loop through files and display only those that need to be accepted
        foreach ($files as $file) {
            // Get the file name
            $file_name = basename($file);
            // Check if the file needs to be accepted
            if (in_array($file_name, $files_to_display)) {
                echo "<tr>";
                echo "<td>".$file_name."</td>";
                echo "<td><a href='".$file."' download>Download</a></td>";
                // Add accepter column with a link to accept the file
                echo "<td><a href='?accept=true&file=".$file_name."'>Accept</a></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>
