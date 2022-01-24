<?php

require('actions/database.php');

if(isset($_POST['submit']))
{
    if(!empty($_POST['username'] AND $_POST['password']))
    {
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        
        $checkUsernameExist = $db->prepare('SELECT * FROM user WHERE username = ?');
        $checkUsernameExist->execute([
            $username
        ]);

        if($checkUsernameExist->rowCount() == 0)
        {
            $errorMSG = 'Username incorrect !';
        }else
        {
            $infosUser = $checkUsernameExist->fetch();

            if(password_verify($password,$infosUser['password']))
            {
                $_SESSION['auth'] = true;
                $_SESSION['username'] = $infosUser['username'];
                $_SESSION['lastname'] = $infosUser['lastname'];
                $_SESSION['id'] = $infosUser['id'];

                header('Location: index.php');
            }else
            {
                $errorMSG = "Password Incorrect !";
            }

        }
    }else
    {
        $errorMSG = "Please complete all the champs !";
    }
}