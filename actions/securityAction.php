<?php 
session_start();
if(!$_SESSION['auth'])
{
    header('Location: signUp.php');
    
}?>