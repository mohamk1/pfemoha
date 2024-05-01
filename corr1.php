<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professors</title>
    <link rel="stylesheet" href="corr.css">
</head>
<body>
    <div class="container">
        <h2>List of Professors with numcor = NULL</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Module Index</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            <?php include 'corr2.php'; ?>
        </table>
    </div>
    <script>
function updateNumcor(code_enseingnat, numcor) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_numcor.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Reload the page or update the table if needed
            location.reload();
        }
    };
    xhr.send("code_enseingnat=" + code_enseingnat + "&numcor=" + numcor);
}
</script>
<div class="container">
      
       
        
      <div class="circle-container">
          <?php include 'count2.php'; ?>
      </div>
  </div>
</body>
</html>


