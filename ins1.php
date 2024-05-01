<?php
session_start();
$code=$_SESSION['code']  ;  // Set session variables
$prenom=$_SESSION['prenom'] ;
$email=$_SESSION['email'] ;
$name=$_SESSION['name'] ;


?>
















<?php
if(isset($_FILES['pdf_file']) ) {
    $user_id = $code;
    $target_dir = "uploads/$user_id/";

    // Create the directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["pdf_file"]["name"]);
    $uploadOk = 1;
    $pdfFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow only PDF files
    if($pdfFileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["pdf_file"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["pdf_file"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
