<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Candidate note</title>
<style>
/* Basic CSS for styling */
.container {
    max-width: 600px;
    margin: 0 auto;
}

form {
    margin-bottom: 20px;
}

input[type="text"] {
    width: 70%;
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

.candidate {
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
}

.candidate-info {
    display: inline-block;
}

.button-saisir {
    display: inline-block;
    padding: 8px 16px;
    background-color: #008CBA;
    color: white;
    border: none;
    cursor: pointer;
    text-decoration: none;
}

.button-saisir:hover {
    background-color: #005F6B;
}
</style>
</head>
<body>
<div class="container">
    <h2>Update Candidate note</h2>
    <form method="post" action="">
        <input type="text" name="search_query" placeholder="Enter candidate name or code">
        <input type="submit" name="submit" value="Search">
    </form>
    <?php
    $lr=1;
    // PHP code to handle form submission and database operations
    if(isset($_POST['submit'])) {
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

        // Get search query and score type from form submission
        $search_query = $_POST['search_query'];
        
        // SQL query to search for candidate based on name or code
        $sql = "SELECT * FROM condidat WHERE nom LIKE '%$search_query%' OR code = '$search_query'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="candidate">
                    <div class="candidate-info">
                        <p>Name: <?php echo $row['nom']; ?></p>
                        <p>Code: <?php echo $row['code']; ?></p>
                    </div>
                    <a href="sais.php?id=<?php echo $row['code']; ?>" class="button-saisir">Saisir</a>
                </div>
                <?php
            }
        } else {
            echo "<p class='message'>No candidate found with the provided name or code.</p>";
        }
        
        // Close database connection
        $conn->close();
    }
    ?>
</div>
</body>
</html>
