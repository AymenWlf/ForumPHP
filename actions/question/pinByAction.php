<?php

require('actions/database.php');

$findByUser = $db->prepare('SELECT title,content,created_at FROM question WHERE id_user = ? ORDER BY id DESC');
$findByUser->execute([
    $_SESSION['id'],
]);

