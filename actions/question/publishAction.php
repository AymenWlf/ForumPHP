<?php

require('actions/database.php');

if(isset($_POST['submit']))
{
    if(!empty($_POST['title'] AND $_POST['content']))
    {
        $title = htmlentities($_POST['title']);
        $content = htmlentities($_POST['content']);
        $date = date('d/m/Y H:i');
        $idUser = $_SESSION['id'];

        $publish = $db->prepare('INSERT INTO question(title,content,id_user,created_at)VALUES(?,?,?,?)');
        $isPublished = $publish->execute([
            $title,
            $content,
            $idUser,
            $date
        ]);
        if($isPublished)
        {
            $successMSG = "Your question is published successfuly !";
        }else
        {
            $errorMSG = "Error in posting your question, please try again !";
        }
        
    }else
    {
        $errorMSG = "Please complete all the champs !";
    }
}