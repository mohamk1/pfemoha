<?php
session_start();

// Check if user is logged in as admin, you may need to implement your own authentication logic here
$is_admin = true; // Set to true if user is admin, otherwise false

if (!$is_admin) {
    // Redirect to login page or show an error message
    header("Location: login.php");
    exit();
}

// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials

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

// Query to select rows where 'accepter' column is 1
$sql = "SELECT * FROM condidat WHERE accepter = 1";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style> 
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
            animation: moveUpDown 2s linear infinite alternate; /* Animation for moving up and down */
        }

        @keyframes moveUpDown {
            0% {
                transform: translateY(0); /* Start position */
            }
            100% {
                transform: translateY(-10px); /* End position */
            }
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
            background-color: #f2f2f2; /* Light gray for table background */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f5f5f5; /* Light gray for table header background */
        }

        tr:nth-child(even) {
            background-color: #ffffff; /* White for even rows */
        }

        tr:hover {
            background-color: #f0f0f0; /* Lighter gray on hover */
        }
    </style>
</head>
<body>
    <h2>Admin Page</h2>
    <table>
        <tr>
            <th>Code Primaire</th>
            <th>Code Correction</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Etablissement</th>
            <th>Email</th>
            <th>Num</th>
            <th>Pass</th>
            <th>Class</th>
            <th>Accepter</th>
        </tr>
        <?php
        // Loop through the result set and display rows in the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row["code"]."</td>";
            echo "<td>".$row["code correction"]."</td>";
            echo "<td>".$row["nom"]."</td>";
            echo "<td>".$row["prenom"]."</td>";
            echo "<td>".$row["etablissement"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["num"]."</td>";
            echo "<td>".$row["pass"]."</td>";
            echo "<td>".$row["class"]."</td>";
            echo "<td>".$row["accepter"]."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close connection
mysqli_close($conn);
?>
