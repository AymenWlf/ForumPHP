<?php 
require('../auth/securityAction.php');
require('../database.php');

if(isset($_GET['id']) AND !empty($_GET['id']))
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
        header('Location: ../../pinByUser.php');
    }

    $deleteById = $db->prepare('DELETE FROM question WHERE id = ? AND id_user = ?');
    $deleteById->execute([
        $id,
        $idUser
    ]);

    if($deleteById)
    {
        $successMSG = "Question deleted successfuly !";
        header('Location: ../../pinByUser.php');
    }else
    {
        $errorMSG = "Error in deleting your question, please try again";
        header('Location: ../../pinByUser.php');
    }
}else
{
    header('Location: ../../pinByUser.php');
}
