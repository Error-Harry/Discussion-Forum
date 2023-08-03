<?php
session_start();

if(isset($_SESSION['loggedin']))
{
    unset($_SESSION['loggedin']);

    if(!isset($_SESSION['loggedin']))
    {
        header("location:/forum/index.php");
    }
}
?>