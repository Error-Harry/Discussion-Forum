<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $qry = mysqli_query($conn, "INSERT INTO users (c_name, c_email, c_subject, c_message) VALUES ('$name', '$email', '$subject', '$message')");
    if ($qry == true) {
        $showAlert = true;
        header("Location: /forum/index.php?contsuccess=true");
        exit();
    } else {
        $showError = "true";
    }
}
?>