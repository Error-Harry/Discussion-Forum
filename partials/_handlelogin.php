<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];
    $password = md5($pass);
    $sql = "SELECT * FROM users WHERE u_email = '$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);

    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($password == $row['u_pass']) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['u_id'] = $row['u_id'];
            $_SESSION['usermail'] = $email;
            // echo "logged in" . $email;
        }
        header("Location: /forum/index.php");
    }
    header("Location: /forum/index.php");
}
?>