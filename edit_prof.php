<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Professor</title>
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
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4; /* Light gray background for the form */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #6a0dad; /* Purple color for labels */
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: calc(100% - 22px); /* Adjusting for padding and border */
            padding: 8px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Professor</h1>
        
        <?php
        // Check if an ID parameter is provided in the URL
        if(isset($_GET['id'])) {
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
                // Retrieve the professor's details from the database based on the ID parameter
                $prof_id = $_GET['id'];
                $sql = "SELECT * FROM prof WHERE `code_enseingnat` = '$prof_id'";


                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) == 1) {
                    // Display the professor's details in an edit form
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <form method="post" action="update_prof.php">
                        <input type="hidden" name="prof_id" value="<?php echo $row['code_enseingnat']; ?>">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" value="<?php echo $row['nom']; ?>"><br>
                        <label for="prenom">Prénom:</label>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $row['prenom']; ?>"><br>
                        <label for="numero">Numéro:</label>
                        <input type="text" id="numero" name="numero" value="<?php echo $row['num']; ?>"><br>
                        <label for="grade">Grade:</label>
                        <input type="text" id="grade" name="grade" value="<?php echo $row['module']; ?>"><br>
                        <label for="password">Password:</label>
                        <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>"><br>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br>
                        <button type="submit">Save Changes</button>
                    </form>
                    <?php
                } else {
                    echo "Professor not found.";
                }
            }
        } else {
            echo "Professor ID not provided.";
        }
        ?>

    </div>
</body>
</html>
