<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    include '_dbconnect.php';
    $u_email = $_POST['signupEmail'];
    $u_pass = $_POST['signuppassword'];
    $u_cpass = $_POST['signupcpassword'];

    $existSql = "SELECT * FROM `users` where u_email = '$u_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if ($numRows > 0) {
        $showError = "Email already in use";
    } else {
        if ($u_pass == $u_cpass) {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`u_email`, `u_pass`, `u_timestamp`) VALUES ('$u_email', '$hash', CURRENT_TIMESTAMP)";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("Location: /forum/index.php?signupsuccess=true");
                exit();
            }
        } else {
            $showError = "Password do not mathch";
        }
    }
    header("Location: /forum/index.php?signupsuccess=false&error=$showError");
}
?>

<?php
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $sql = "SELECT * FROM users WHERE u_email = '$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row['u_pass'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['usermail'] = $email;
            echo "logged in" . $email;
            // header("Location: /forum/index.php");
        } else {
            echo "unable to login";
        }
    }
}

?>