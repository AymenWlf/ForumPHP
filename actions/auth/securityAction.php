<?php 

if(!$_SESSION['auth'])
{
    if(!$_SESSION)
    {
        session_start();
    }
    header('Location: logIn.php');
}
?>