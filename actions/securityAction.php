<?php 
session_start();
if(!$_SESSION['auth'])
{
    header('Location: logIn.php');
}
?>