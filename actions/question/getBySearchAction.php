<?php

require('actions/database.php');

if(isset($_GET['submit']) AND !empty($_GET['text']))
{
    $text = $_GET['text'];
    $getQuestions = $db->query('SELECT * FROM question WHERE (title LIKE "%'.$text.'%") OR (content LIKE "%'.$text.'%") ORDER BY id DESC');
}



