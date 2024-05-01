<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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

.company-info {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
}

.company-description,
.company-attributes {
    flex-basis: 48%;
}

.company-description h2,
.company-attributes h2 {
    font-size: 32px;
    margin-bottom: 20px;
    color: #fff;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* Text shadow */
    opacity: 0; /* Initially hidden */
    animation: fadeInUp 1s ease forwards; /* Fade-in and slide-up animation */
    animation-delay: 0.5s; /* Delay for sequential animation */
}

.company-description p,
.company-attributes ul {
    font-size: 18px;
    line-height: 1.6;
    color: #fff;
    opacity: 0; /* Initially hidden */
    animation: fadeInUp 1s ease forwards; /* Fade-in and slide-up animation */
    animation-delay: 1s; /* Delay for sequential animation */
}

.company-attributes ul {
    list-style-type: none;
    padding: 0;
}

.company-attributes li {
    margin-bottom: 15px;
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
}

.button:hover {
    background-color: #fff;
    color: #6c5ce7;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>About Our Company</h1>
        <div class="company-info">
            <div class="company-description">
                <h2>Our Vision</h2>
                <p>Welcome to a world of innovation and excellence. At Our Company, we dare to dream big and make those dreams a reality. Our vision is to revolutionize industries, inspire change, and leave a lasting impact on the world.</p>
            </div>
            <div class="company-attributes">
                <h2>Our Values</h2>
                <ul>
                    <li><strong>Passion:</strong> We are driven by passion, enthusiasm, and a relentless pursuit of excellence.</li>
                    <li><strong>Innovation:</strong> We embrace creativity and innovation to challenge the status quo and drive meaningful progress.</li>
                    <li><strong>Integrity:</strong> We uphold the highest standards of integrity, honesty, and ethical conduct in all our endeavors.</li>
                    <li><strong>Collaboration:</strong> We believe in the power of collaboration, teamwork, and diversity to achieve remarkable results.</li>
                </ul>
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