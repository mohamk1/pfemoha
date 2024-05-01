<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professors List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>/* styles.css */

/* styles.css */

/* styles.css */
.actions {
    display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .actions a {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 10px;
            text-decoration: none;
            color: #fff;
            background-color: #f4f4f4; /* Change to the desired background color */
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .actions a:hover {
            background-color: #ddd; /* Darker color on hover */}
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #6a0dad; /* Purple color for the title */
    position: relative;
    animation: bounceLetters 2s ease-in-out infinite alternate;
}

@keyframes bounceLetters {
    0%, 100% {
        transform: translateY(0); /* Start and end position */
    }
    50% {
        transform: translateY(-10px); /* Move up */
    }
}

.professors {
    width: 100%;
    border-collapse: collapse;
    background-color: #f2f2f2; /* Light gray for table background */
}

.professors th, .professors td {
    padding: 10px;
    text-align: right; /* Right align text */
    border-bottom: 1px solid #ddd;
}

.professors th {
    background-color: #d9c8ff; /* Light purple for table header */
}

.actions {
    text-align: center;
    margin-top: 20px;
}

.actions a {
    display: inline-block;
    padding: 10px 20px;
    margin: 0 10px;
    text-decoration: none;
    color: #fff;
    background-color: #6a0dad; /* Dark purple for action buttons */
    border-radius: 5px;
    transition: background-color 0.3s;
}

.actions a:hover {
    background-color: #4b057e; /* Darker purple on hover */
}

</style>
<body>
    <div class="container">
        <h1>Professors List</h1>
        <table class="professors">
            <tr>
                <th>Code Enseignant</th>
                <th>Name</th>
                <th>Prénom</th>
                <th>Numéro</th>
                <th>Grade</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
            <?php
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
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

            // Fetch data from the 'prof' table
            $sql = "SELECT * FROM prof";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['code_enseingnat'] . "</td>";
                    echo "<td>" . $row['nom'] . "</td>";
                    echo "<td>" . $row['prenom'] . "</td>";
                    echo "<td>" . $row['num'] . "</td>";
                    echo "<td>" . $row['module'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No professors found</td></tr>";
            }

            // Close connection
            mysqli_close($conn);
            ?>
        </table>
        <div class="actions">
        <a href="../ajouter prof/ajtprof.php">ajouter</a>
        <a href="../modifier prof/modprof.php">modifier</a>
        <a href="../suprimer prof/supprof.php">suprimer</a>
        </div>
    </div>
</body>
</html>
