<!DOCTYPE html>
<html>
<head>
    <title>Class Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        h2 {
            color: #663399;
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto;
            border: 2px solid #663399;
        }
        th, td {
            border: 1px solid #663399;
            text-align: center;
            padding: 8px;
        }
        th {
            background-color: #663399;
            color: white;
        }
        form {
            display: inline-block;
        }
        button {
            padding: 5px 10px;
            background-color: #663399;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #7e57c2;
        }
    </style>
</head>
<body>

<h2>Class Table</h2>

<table>
    <tr>
        <th>Num Class</th>
        <th>Action</th>
    </tr>

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
       
        // You can execute your queries here
    }

    // Fetch data from database
    $sql = "SELECT numclass FROM class";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["numclass"] . "</td>";
            echo "<td><form method='post' action='deleteclass.php'><button type='submit' name='delete' value='" . $row["numclass"] . "'>Delete</button></form></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>0 results</td></tr>";
    }

    // Close connection
    $conn->close();
    ?>

</table>

</body>
</html>
