<?php
session_start();


?>
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
    echo "Connected successfully";
    // You can execute your queries here

}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    // Retrieve form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the credentials match the 'prof' table
    $sql_prof = "SELECT * FROM prof WHERE (email='$username' ) AND password='$password'";
    $result_prof = mysqli_query($conn, $sql_prof);
    if (mysqli_num_rows($result_prof) > 0) {
        $row = mysqli_fetch_assoc($result_prof);
        $name = $row['nom'];
        $prenom= $row['prenom'];  // Assuming the column name for name is 'nom'
        $codeenseingnat = $row['code enseingnat '];

        $_SESSION['codeenseingnat'] = $codeenseingnat;// Set session variables
        $_SESSION['prenom'] = $prenom;
        $_SESSION['email'] = $username;
        $_SESSION['name'] = $name;
        $_SESSION['user_type'] = 'prof';
        // Redirect to prof.php if login is successful
        header("Location: prof.php");
        exit();
    }

    // Check if the credentials match the 'condidat' table
    $sql_condidat = "SELECT * FROM condidat WHERE (email='$username' OR num='$username') AND pass='$password'";
    $result_condidat = mysqli_query($conn, $sql_condidat);
    if (mysqli_num_rows($result_condidat) > 0) {
        // Redirect to tt.php if login is successful
        $row = mysqli_fetch_assoc($result_condidat);
        $name = $row['nom'];
        $prenom = $row['prenom'];
        $code = $row['code'];
        
         // Assuming the column name for name is 'nom'

         $_SESSION['code'] = $code;      // Set session variables
        $_SESSION['prenom'] = $prenom;
        $_SESSION['email'] = $username;
        $_SESSION['name'] = $name;
        $_SESSION['user_type'] = 'condidat'; // Indi
        header("Location: ../condidat/main etdn.php");
        exit();
    }


    // If login is not successful, redirect back to the login page
    
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    // Retrieve form inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the credentials match the 'admin' table
    $sql_admin = "SELECT * FROM admin WHERE email='$username' AND pass='$password'";
    $result_admin = mysqli_query($conn, $sql_admin);
    if (mysqli_num_rows($result_admin) > 0) {
        // Redirect to admin.php if login is successful
        $_SESSION['email'] = $username;
        header("Location:../admin/main/admin.php");
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  
    <title>log</title>
 
  
  
    <style media="screen">

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}



.animated-heading {
    animation: slideFromLeft 1s ease forwards;
    opacity: 0; /* Initially hidden */
}

@keyframes slideFromLeft {
    from {
        transform: translateX(-100%);
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
























      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background-image:url(img.jpg.jpg) ;
  color: rgb(39, 39, 39);
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;

  
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}

form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #0f0d0d;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #5c4c4c;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.text-center{

padding: 30px 40px 0;
}

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
  




    <form method="post" action="login.php">
    <div class="container">
        <h3 class="animated-heading">Login</h3>
        <!-- Other login form elements go here -->
    </div>

    <label for="username">Username</label>
    <input type="text" placeholder="Email or Phone" id="username" name="username">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password">

    <button type="submit">Log In</button>
    <p class="text-center">Not a member? <a data-toggle="tab" href="sing.php">Sign Up</a></p>
</form>

       
</body>
</html>