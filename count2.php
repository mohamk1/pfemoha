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
}

// Query to count occurrences of numcor values
$sql = "SELECT numcor, COUNT(*) as count FROM prof GROUP BY numcor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $count = $row["count"];
        $color = "";
        if ($row["numcor"] == 1) {
            $color = "red";
        } elseif ($row["numcor"] == 2) {
            $color = "blue";
        } elseif ($row["numcor"] == 3) {
            $color = "black";
        }
        echo "<div class='circle' style='background-color: $color;'>$count</div>";
    }
} else {
    echo "No data found";
}

$conn->close();
?>
