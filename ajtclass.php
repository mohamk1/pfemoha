<!DOCTYPE html>
<html lang="en">
    <style>
     

      h2 {
    color: #6a0dad;
    text-align: center;
    margin-bottom: 20px;
    animation: moveUpDown 2s linear infinite alternate; /* Animation for moving up and down */
}

@keyframes moveUpDown {
    0% {
        transform: translateY(0); /* Start position */
    }
    100% {
        transform: translateY(-10px); /* End position */
    }
}

      
      body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

.container {
    width: 50%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
}

h2 {
    color: #6a0dad;
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

button[type="submit"] {
    background-color: #6a0dad;
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 18px;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #4d007f;
}
</style>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->
</head>
<body>
    <div class="container">
        <h2>Insert Data</h2>
        <form action="insert.php" method="post">
            <div class="form-group">
                <label for="numclass">Numclass:</label>
                <input type="text" id="numclass" name="numclass" required>
            </div>
            <button type="submit">Insert Data</button>
        </form>
     
    </div>
</body>
</html>

