<?php

require('actions/database.php');

//if not set -> not pass here asslan

$getAnswers = $db->prepare('SELECT * FROM answer WHERE id_question = ? ORDER BY id DESC');
$getAnswers->execute([
    $_GET['id']
]);



