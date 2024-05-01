<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Professor</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Additional styles */
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
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            padding: 8px;
            margin: 0 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #6a0dad; /* Purple color for the button */
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #4b057e; /* Darker purple on hover */
        }

        .professors {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .professors th, .professors td {
            padding: 10px;
            text-align: right; /* Right align text */
            border-bottom: 1px solid #ddd;
        }

        .professors th {
            background-color: #d9c8ff; /* Light purple for table header */
        }

        .professors td:last-child {
            text-align: center;
        }

        .professors a {
            color: #6a0dad; /* Purple color for links */
            text-decoration: none;
        }

        .professors a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Modify Professor</h1>
        <form method="post" action="">
            <label for="searchName">Search by Name:</label>
            <input type="text" id="searchName" name="searchName">
            <button type="submit">Search</button>
        </form>

        <?php
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
                // Retrieve the search name from the form
                $searchName = $_POST['searchName'];

                // Query to search for the professor by name
                $sql = "SELECT * FROM prof WHERE nom LIKE '%$searchName%'";

                // Execute the query
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    // Display a table with the search results
                    echo "<table class='professors'>";
                    echo "<tr><th>Code Enseignant</th><th>Name</th><th>Prénom</th><th>Numéro</th><th>Grade</th><th>Password</th><th>Email</th><th>Action</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['code_enseingnat'] . "</td>";
                        echo "<td>" . $row['nom'] . "</td>";
                        echo "<td>" . $row['prenom'] . "</td>";
                        echo "<td>" . $row['num'] . "</td>";
                        echo "<td>" . $row['module'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td><a href='edit_prof.php?id=" . $row['code_enseingnat'] . "'>Edit</a></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No professors found with the name '$searchName'";
                }
            }
        }
        ?>

    </div>
</body>
</html>
