<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>pfe</title>
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
  font-family: sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f0f0f0;
}

header {
  background-image:url(img.jpg.jpg) ;
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  color: rgb(39, 39, 39);
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

h1, h2 {
  margin-bottom: 5px;
}

nav {
  list-style: none;
  padding: 0;
  margin: 10px auto;
}

nav li {
  display: inline-block;
  margin-right: 20px;
}

nav a {
  color: #fff;
  text-decoration: none;
}

main {
  padding: 20px;
}



p {
  text-align: justify;
  line-height: 1.5;
}

footer {
  background-color: #333;
  color: #fff;
  padding: 10px;
  text-align: center;
}
body {
  font-family: sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f0f0f0;
}

header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align: center;
}

h1, h2 {
  margin-bottom: 5px;
}

nav {
  list-style: none;
  padding: 0;
  margin: 10px auto;
}

nav li {
  display: inline-block;
  margin-right: 20px;
}

nav a {
  color: #fff;
  text-decoration: none;
}




.container {
    max-width:100%;
    
    margin: 50px auto;
    padding: 40px;
    background: linear-gradient(135deg, #347c74, #2196F3); /* Gradient background */
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    text-align: center;
    color: #000; /* Text color */
    animation: slideIn 1s ease forwards; /* Slide-in animation */
}

@keyframes slideIn {
    from {
        opacity: 0;
        transform: translateY(-50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

h1 {
    font-size: 48px;
    margin-bottom: 30px;
    text-transform: uppercase;
}

.contact-info {
    margin-bottom: 30px;
}

.info-item {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 20px;
}

.info-item i {
    font-size: 24px;
    margin-right: 10px;
}

.info-item p {
    font-size: 18px;
    margin: 0;
}

.buttons {
    margin-top: 40px;
}

.button {
    display: inline-block;
    padding: 15px 30px;
    background-color: #0951d7; /* Button background color */
    color: #fff; /* Button text color */
    text-decoration: none;
    border: 2px solid #0951d7; /* Button border color */
    border-radius: 30px;
    transition: all 0.3s ease;
    font-size: 18px;
    text-transform: uppercase;
}

.button:hover {
    background-color: #FFA000; /* Button background color on hover */
    border-color: #FFA000; /* Button border color on hover */
}





  </style>
</head>
<body>
  <header>
    
    <h1>Welcome</h1>
    <h2>ecole superieure de commerce</h2>
    <nav>
     
    </nav>
  </header>
  
  <div class="container">
    <h1>Contact Us</h1>
    <div class="contact-info">
        <div class="info-item">
            <i class="fas fa-phone-alt"></i>
            <p>Main: +123 456 7890</p>
        </div>
        <div class="info-item">
            <i class="fas fa-phone-alt"></i>
            <p>Sales: +123 456 7891</p>
        </div>
        <div class="info-item">
            <i class="fas fa-phone-alt"></i>
            <p>Support: +123 456 7892</p>
        </div>
        <div class="info-item">
            <i class="fas fa-map-marker-alt"></i>
            <p>123 Company St, City, Country</p>
        </div>
    </div>
    <div class="buttons">
    <?php
    // Check if ID is received
    if(isset($_GET['id']) && $_GET['id'] == 1) {
        // If ID is 1, redirect to 'etdn.php'
        echo '<a href="../condidat/main etdn.php" class="button">Back to Main</a>';
    } else {
        // If ID is not received or not equal to 1, redirect to 'main.html'
        echo '<a href="main.html" class="button">Back to Home</a>';
    }
    ?>
</div>
</div>

</body>
</html>
