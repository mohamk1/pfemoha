<?php
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
    
    // You can execute your queries here
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['form_submitted'])) {
    // Retrieve form inputs
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    
    // Retrieve the selected value from the dropdown
    $etablissement = isset($_POST['etablissement']) ? $_POST['etablissement'] : '';
    echo "Selected Etablissement: " . $etablissement;

    // Check if there is a row with the same values in the 'prof' table
    $sql = "SELECT * FROM prof WHERE prenom='$first_name' AND nom='$last_name' AND email='$email' AND num='$phone'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // If a row with the same values exists, update the 'pass' column
        $row = $result->fetch_assoc();
        $prof_id = $row['id']; // Assuming 'id' is the primary key in the 'prof' table
        $sql_update = "UPDATE prof SET pass='$password' WHERE id='$prof_id'";
        if ($conn->query($sql_update) === TRUE) {
            echo "Password updated successfully for Prof";
        } else {
            echo "Error updating password for Prof: " . $conn->error;
        }
    } else {
        // If no row with the same values exists, insert into 'condidat' table
        $sql_insert = "INSERT INTO condidat (prenom, nom, email, num, pass, etablissement) VALUES ('$first_name', '$last_name', '$email', '$phone', '$password', '$etablissement')";

        if (mysqli_query($conn, $sql_insert)) {
            echo "New record created successfully for Condidat";
        } else {
            echo "Error: " . $sql_insert . "<br>" . mysqli_error($conn);
        }
    }
}

// Close the connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>


select {
    display: block;
    height: 40px;
    width: calc(100% - 20px); /* Adjust width to accommodate padding */
    background-color: rgba(255, 255, 255, 0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
    border: 1px solid #ccc; /* Add border for better visibility */
}

/* Style for the dropdown arrow */
select:after {
    content: '\25BC'; /* Unicode character for the down arrow */
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    pointer-events: none; /* Ensure the arrow does not interfere with click events */
}
        /* Add CSS styles for positioning the form */
        /* Remaining CSS styles... */

        /* Center the form horizontally and vertically */
        form {
            /* Remaining form styles... */
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body {
            background-image: url('img.jpg.jpg'); /* Fix the URL for the background image */
            color: rgb(39, 39, 39);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
        }
        .background {
            width: 520px;
            height: 520px;
            position: absolute;
            transform: translate(-50%, -50%);
            left: 50%;
            top: 50%;
        }
        .background .shape {
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }
        form {
            width: 350px;
            background-color: rgba(255, 255, 255, 0.13);
            position: absolute;
            transform: translate(-50%, -50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
            padding: 50px 35px;
            margin :auto;
            text-align: center; /* Center align the form elements */
        }
        form label {
            display: block;
            margin-top: 20px;
            font-size: 16px;
            font-weight: 500;
            text-align: left; /* Align labels to the left */
        }
        form input {
            display: block;
            height: 40px;
            width: calc(100% - 20px); /* Adjust width to accommodate padding */
            background-color: rgba(255, 255, 255, 0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
            border: 1px solid #ccc; /* Add border for better visibility */
        }
        ::placeholder {
            color: #5c4c4c;
        }
        button { margin-top: 20px; /* Adjust the top margin as needed */
    width: 100%;
    background-color: #4CAF50; /* Green background color */
    color: white; /* White text color */
    padding: 15px 0; /* Padding on top and bottom */
    font-size: 18px; /* Font size */
    font-weight: bold; /* Bold font weight */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Cursor style */
    transition: background-color 0.3s; /* Smooth color transition */
}

button:hover {
    background-color: #45a049; /* Darker green color on hover */
}
    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <form action="demo.php" method="post">
        <h3>Sign Up</h3>
        <input type="hidden" name="form_submitted" value="1"> <!-- Add a hidden input field to indicate form submission -->
        
        <!-- Form inputs... -->
        <!-- PHP code for etablissement dropdown... -->
      
        <label for="first_name">First Name</label>
        <input type="text" placeholder="First Name" id="first_name" name="first_name">
        <label for="last_name">Last Name</label>
        <input type="text" placeholder="Last Name" id="last_name" name="last_name">
        <label for="email">Email</label>
        <input type="text" placeholder="Email" id="email" name="email">
        <label for="phone">Phone</label>
        <input type="text" placeholder="Phone" id="phone" name="phone">
        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">
        <label for="etablissement">Etablissement</label>
        
        <?php
        // Database connection
        $servername = "localhost";
        $username = "root"; // Change to your database username
        $password = ""; // Change to your database password
        $dbname = "pfe"; // Change to your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Initialize $k variable
        $k = "";

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve the selected value from the form
            $k = isset($_POST['etablissement']) ? $_POST['etablissement'] : '';
        }

        // Query to fetch etablissement data
        $sql_etablissement = "SELECT `codee`, `nome` FROM `etablissement` ";
       
        // Execute the query
        $result = mysqli_query($conn, $sql_etablissement);
        
        echo "<select id='etablissement' name='etablissement'>";
        if ($result && mysqli_num_rows($result) > 0) {
            $k = ''; // Initialize $k variable
            while ($row_etablissement = mysqli_fetch_assoc($result)) {
                $selected = ($row_etablissement['codee'] == $k) ? 'selected' : '';
                echo "<option value='" . $row_etablissement['codee'] . "' $selected>" . $row_etablissement['nome'] . "</option>";
            }
        }
        echo "</select>";
        
          
      
    
        // Add a hidden input field to store the selected value
        echo "<input type='hidden' name='k' value='$k'>";
        ?>
        
        
        <!-- Button inside the form -->
        <button type="submit">Register</button>
    </form>
</body>
<?php  
?>
</html>
