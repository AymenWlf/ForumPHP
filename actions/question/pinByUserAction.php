<?php

require('actions/database.php');

$findByUser = $db->prepare('SELECT * FROM question WHERE id_user = ? ORDER BY id DESC');
$findByUser->execute([
    $_SESSION['id'],
]);

$question = $findByUser->fetch();

