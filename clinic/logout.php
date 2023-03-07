<?php
session_start();

if(isset($_SESSION['user']))
{
    unset($_SESSION['user']);
   
}
else
{
    unset($_SESSION['user_token']);
    session_destroy();
}
header("location:login.php");
?>