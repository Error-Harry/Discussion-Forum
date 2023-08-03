<?php
$showError = "false";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include("_dbconnect.php");
    $u_email = $_POST['signupEmail'];
    $u_pass = $_POST['signupPassword'];
    $u_cpass = $_POST['signupcPassword'];
    $u_password = md5($_POST['signupPassword']);

    $existSql = "SELECT * FROM `users` where u_email = '$u_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "Email already in use";
    } else {
        if ($u_pass == $u_cpass) {
            $qry = mysqli_query($conn, "INSERT INTO users (u_email, u_pass, 	u_timestamp) VALUES ('$u_email', '$u_password', CURRENT_TIMESTAMP)");

            if ($qry == true) {
                $showAlert = true;
                header("Location: /forum/index.php?signupsuccess=true");
                exit();
            } else {
                $showError = "true";
            }
        } else {
            $showError = "Password do not mathch";
        }
        header("Location: /forum/index.php?signupsuccess=false&error=$showError");
    }
}
?>