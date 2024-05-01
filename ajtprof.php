<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Professor</title>
    <style>
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* Prevent horizontal scrolling */
    background-color: #f4f4f4; /* Background color */
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 40px;
    background: linear-gradient(135deg, #6c5ce7, #ff6b6b); /* Gradient background */
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    text-align: center;
    color: #fff;
    opacity: 0; /* Initially hidden */
    animation: fadeInUp 1s ease forwards; /* Fade-in and slide-up animation */
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px) scale(0.9);
    }
    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

h1 {
    font-size: 48px;
    margin-bottom: 30px;
    text-transform: uppercase;
}
.newProfessor {
    color: #000; /* Change text color to black */
}

p {
    font-size: 18px;
    margin-bottom: 20px;
}

.professors {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
    background-color: rgba(255, 255, 255, 0.2);
}

.professors th,
.professors td {
    padding: 15px;
    border: none;
    border-bottom: 1px solid #fff;
}

.professors th {
    background-color: rgba(255, 255, 255, 0.1);
}

.professors td {
    background-color: rgba(255, 255, 255, 0.2);
}

.professors tr:hover {
    background-color: rgba(255, 255, 255, 0.3);
}

.buttons {
    margin-top: 40px;
}

.button {
    display: inline-block;
    padding: 15px 30px;
    background-color: transparent;
    color: #fff;
    text-decoration: none;
    border: 2px solid #fff;
    border-radius: 30px;
    transition: all 0.3s ease;
    font-size: 18px;
    text-transform: uppercase;
    margin-right: 20px;
}

.button:hover {
    background-color: #fff;
    color: #6c5ce7;
}

/* Customizing select dropdown */
.subjectSelect {
    padding: 12px 20px;
    font-size: 16px;
    border-radius: 25px;
    border: 2px solid #6c5ce7;
    background: linear-gradient(135deg, #6c5ce7, #ff6b6b);
    color: #fff;
    cursor: pointer;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    outline: none;
    transition: all 0.3s ease;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.4); /* Add text shadow for depth */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Add box shadow for depth */
}

/* Adjusting text color of all options */
.subjectSelect option {
    color: #000; /* Change text color to black */
}

.subjectSelect:hover,
.subjectSelect:focus {
    background: linear-gradient(135deg, #673ab7, #ff4081); /* Update gradient colors */
    border-color: #673ab7; /* Update border color */
}.deleteButton {
    padding: 8px;
    background-color: #ffccc7;
    border: none;
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.deleteButton:hover {
    background-color: #ffa5a0;
}

.deleteButton i {
    color: #ff6b6b;
}

    </style>
</head>
<body>
    <?php
    // PHP code
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
    }

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $name = $_POST['name'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $subjects = $_POST['subjects'];
        $numero=$_POST['numero'];

        // Insert professor into database
        $sql = "INSERT INTO prof (nom, prenom, email, module,num) VALUES ('$name', '$lastName', '$email', '$subjects' ,'$numero')";
        if (mysqli_query($conn, $sql)) {
            echo "Professor added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        header("Location: ajtprof.php");
    }

    ?>

    <!-- HTML content -->
    <div class="container">
        <h1>Add Professor</h1>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>


            <label for="numero">Numero:</label>
            <input type="text" id="numero" name="numero" required><br><br>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="subjects">Subjects:</label>
            <select id="subjects" name="subjects">
                <option value="1">Math</option>
                <option value="2">Science</option>
                <option value="3">History</option>
                <option value="4">Physics</option>
            </select><br><br>

            <button type="submit">Add Professor</button>
            <a href="adminprof.php">les profs</a>

        </form>
    </div>

    <?php
    // Close the connection
    mysqli_close($conn);
    ?>
</body>
</html>
