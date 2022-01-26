<?php

require('actions/database.php');

$getQuestion = $db->prepare('SELECT * FROM question WHERE id = ?');
$getQuestion->execute([
    $_GET['id']
]);

if(isset($_GET['id']) AND !empty($_GET['id']) AND ($getQuestion->rowCount() > 0) )
{
    $findById = $db->prepare('SELECT * FROM question WHERE id = ?');
    $findById->execute([
        $_GET['id']
    ]);

    $question = $findById->fetch();
}else
{
    header('Location: index.php');
}



if(isset($_GET['successMSG']))
{
    $successMSG = $_GET['successMSG'];
}