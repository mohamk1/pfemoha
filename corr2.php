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

// Query to fetch professors with numcor = NULL
$sql = "SELECT * FROM prof WHERE numcor IS NULL";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["code_enseingnat"] . "</td>";
        echo "<td>" . $row["nom"] . "</td>";
        echo "<td>" . $row["prenom"] . "</td>";
        echo "<td>" . $row["module"] . "</td>";
        echo "<td>" . $row["num"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td><button class='action-btn1' onclick='updateNumcor(" . $row["code_enseingnat"] . ", 1)'>1</button>";
        echo "<button class='action-btn2' onclick='updateNumcor(" . $row["code_enseingnat"] . ", 2)'>2</button>";
        echo "<button class='action-btn3' onclick='updateNumcor(" . $row["code_enseingnat"] . ", 3)'>3</button></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No professors found with numcor = NULL</td></tr>";
}

$conn->close();
?>

