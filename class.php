<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Class</title>
    <style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

.container {
    width: 50%;
    margin: 0 auto;
    text-align: center;
}

h1 {
    color: #6a0dad;
    animation: moveUpDown 2s linear infinite alternate;
}

@keyframes moveUpDown {
    0% {
        transform: translateY(0);
    }
    100% {
        transform: translateY(-10px);
    }
}

.message {
    color: red;
    margin-top: 10px;
}

form {
    margin-top: 20px;
    text-align: left;
    background-color: #f2e6ff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

label {
    display: block;
    margin-bottom: 10px;
    font-size: 20px;
    color: #6a0dad;
}

.checkbox-container {
    display: flex;
    align-items: center;
}

.checkbox-custom {
    display: inline-block;
    position: relative;
    cursor: pointer;
    font-size: 20px;
    color: #6a0dad;
    margin-right: 10px;
}

.checkbox-custom input[type="checkbox"] {
    opacity: 0;
    position: absolute;
    cursor: pointer;
}

.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #fff;
    border: 1px solid #6a0dad;
    border-radius: 3px;
    transition: background-color 0.3s ease;
}

.checkbox-custom input:checked ~ .checkmark {
    background-color: #6a0dad;
    border: none;
}

.checkmark::after {
    content: "";
    position: absolute;
    display: none;
}

.checkbox-custom input:checked ~ .checkmark::after {
    display: block;
}

.checkbox-custom input:checked ~ .checkmark::after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid #fff;
    border-width: 0 3px 3px 0;
    transform: rotate(45deg);
}

.select-class {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    margin-bottom: 15px;
}

input[type="submit"] {
    background-color: #6a0dad;
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #4d007f;
}



    </style>
</head>
<body>
    <div class="container">
        <h1>Assign Class</h1>

        <form action="class.php" method="POST" id="assignClassForm">
            <!-- Professor selection -->
            <label for="prof_codes">Professors:</label><br>
            <?php
            // Database connection and fetching professors
            $hostname = "localhost";
            $username = "root";
            $password = "";
            $database = "pfe";
            $conn = mysqli_connect($hostname, $username, $password, $database);
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            $sql_professors = "SELECT code_enseingnat, CONCAT(nom, ' ', prenom) AS full_name FROM prof WHERE class IS NULL";

            $result_professors = mysqli_query($conn, $sql_professors);
            while ($row = mysqli_fetch_assoc($result_professors)) {
                echo "<input type='checkbox' name='prof_codes[]' value='" . $row['code_enseingnat'] . "'>" . $row['full_name'] . "<br>";
            }
            ?>
            <br>
            <!-- Student selection -->
            <label for="condidat_codes">Students:</label><br>
            <?php
            // Fetching students
            $sql_students = "SELECT code, CONCAT(nom, ' ', prenom) AS full_name FROM condidat WHERE class IS NULL";

            $result_students = mysqli_query($conn, $sql_students);
            while ($row = mysqli_fetch_assoc($result_students)) {
                echo "<input type='checkbox' name='condidat_codes[]' value='" . $row['code'] . "'>" . $row['full_name'] . "<br>";
            }
            ?>
            <br>
            <!-- Class selection -->
            <label for="num_class">Class:</label><br>
            <select name="class_num" id="num_class">
                <?php
                // Fetching classes
                $sql_classes = "SELECT numclass FROM class";
                $result_classes = mysqli_query($conn, $sql_classes);
                while ($row = mysqli_fetch_assoc($result_classes)) {
                    echo "<option value='" . $row['numclass'] . "'>Class " . $row['numclass'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <!-- Hidden input to store selected class -->
            <input type="hidden" name="selected_class" id="selected_class" value="">
            <!-- Form submission button -->
            <input type="submit" value="Assign">
        </form>

        <div id="message" class="message"></div>
    </div>
</body>
</html>

<?php
// Database connection
$hostname = "localhost";
$username = "root";
$password = "";
$database = "pfe";
$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve selected class
    if(isset($_POST['class_num'])) {
        $class_num = $_POST['class_num'];

        // Update professors
        if(isset($_POST['prof_codes'])) {
            foreach($_POST['prof_codes'] as $prof_code) {
                $update_prof_query = "UPDATE prof SET class = '$class_num' WHERE code_enseingnat = '$prof_code'";
                mysqli_query($conn, $update_prof_query);
            }
        }

        // Update students
        if(isset($_POST['condidat_codes'])) {
            foreach($_POST['condidat_codes'] as $condidat_code) {
                $update_condidat_query = "UPDATE condidat SET class = '$class_num' WHERE code = '$condidat_code'";
                mysqli_query($conn, $update_condidat_query);
            }
        }
    }
}

// Close connection
mysqli_close($conn);

// Redirect back to the HTML page

exit;
?>
<div id="message" class="message"></div>
