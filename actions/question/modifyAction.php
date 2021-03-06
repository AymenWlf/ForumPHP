<?php

require('actions/database.php');

function getData($db)
{
    //Pulling data
    $id = $_GET['id'];
    $idUser = $_SESSION['id'];

    $findById = $db->prepare('SELECT * FROM question WHERE id = ? AND id_user = ?');
    $findById->execute([
        $id,
        $idUser
    ]);

    if($findById->rowCount() == 0)
    {
        header('Location: pinByUser.php');
    }

    $question = $findById->fetch();

    return $question;
}

if(isset($_GET['id']) AND !empty($_GET['id']))
{
    $question = getData($db);
}else
{
    header('Location: pinByUser.php');
}

//Updating
if(isset($_POST['submit']))
{
    if(!empty($_POST['title'] AND $_POST['content']))
    {
        $id = $_GET['id'];
        $title = htmlspecialchars($_POST['title']);
        $content = htmlspecialchars($_POST['content']);
        $modifDate = date('d/m/Y H:i');
        $idUser = $_SESSION['id'];

        $update = $db->prepare('UPDATE question set title = ?,content = ?,modified_at = ? WHERE id = ? AND id_user = ?');
        $isUpdated = $update->execute([
            $title,
            $content,
            $modifDate,
            $id,
            $idUser
        ]);
        if($isUpdated)
        {
            $successMSG = "Your question is updated successfuly !";
            $question = getData($db);
        }else
        {
            $errorMSG = "Error in updating your question, please try again !";
        }
        
    }else
    {
        $errorMSG = "Please complete all the champs !";
    }
}