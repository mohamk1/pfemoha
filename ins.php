







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* Prevent horizontal scrolling */
    
    background-size: cover;
    background-position: center;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    padding: 40px;
    background-color:transparent;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    text-align: center;
    color: #000000;
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

.form-group {
    margin-bottom: 20px;
    text-align: left;
}

label {
    display: block;
    font-size: 20px;
    margin-bottom: 5px;
    
}
input{
    display: block;
    
    background-color: rgba(255,255,255,0.07);
    
}

input[type="text"],
input[type="file"],
select {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    font-size: 16px;
    background-color: rgba(255,255,255,0.07);
}

.buttons {
    margin-top: 40px;
}

.button {
    display: inline-block;
    padding: 15px 30px;
    background-color: transparent;
    color: #000000;
    text-decoration: none;
    border: 2px solid #000000;
    border-radius: 30px;
    transition: all 0.3s ease;
    font-size: 18px;
    text-transform: uppercase;
    margin-right: 10px;
}

.button:hover {
    background-color: #d79f9f;
    color: #211f34;
}



    </style>
</head>
<body>
    <div class="container">
        <h1>Inscription Form</h1>
        <form action="update_files.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="birth-certificate">Birth Certificate:</label>
                <input type="file" id="birth-certificate" name="birth-certificate" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="school-certificate">School Certificate:</label>
                <input type="file" id="school-certificate" name="school-certificate" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="score-sheet">Score Sheet:</label>
                <input type="file" id="score-sheet" name="score-sheet" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="profile-pic">Profile Picture:</label>
                <input type="file" id="profile-pic" name="profile-pic" accept="image/*" required>
            </div>
            <div class="buttons">
                <button type="submit" class="button">Submit</button>
                <a href="main etdn.html" class="button">Back to Home</a>
            </div>
        </form>
    </div>
</body>
</html>
