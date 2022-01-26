<?php
if(session_start())
{
    if(isset($_SESSION['auth']))
    {
        header('Location: index.php');
    }
}

require('actions/database.php');

if(isset($_POST['submit']))
{
    if(!empty($_POST['username'] AND $_POST['password'] AND $_POST['lastname']))
    {
        $username = htmlentities($_POST['username']);
        $lastname = htmlentities($_POST['lastname']);
        $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
        
        $checkExistUser = $db->prepare('SELECT id FROM user WHERE username = ?');
        $checkExistUser->execute([
            $username
        ]);

        if($checkExistUser->rowCount() > 0)
        {
            $errorMSG = 'User Already exist !';
        }else
        {
            $insertInUser =  $db->prepare('INSERT INTO user(username,lastname,password) VALUES(?,?,?)');
            $insertInUser->execute([
                $username,
                $lastname,
                $password
            ]);

            $getInfosUser = $db->prepare('SELECT id,username,lastname FROM user WHERE username = ?');
            $getInfosUser->execute([
                $username
            ]);

            $infosUser = $getInfosUser->fetch();

            $_SESSION['auth'] = true;
            $_SESSION['username'] = $infosUser['username'];
            $_SESSION['lastname'] = $infosUser['lastname'];
            $_SESSION['id'] = $infosUser['id'];

            header('Location: index.php');

        }
    }else
    {
        $errorMSG = "Please complete all the champs !";
    }
}