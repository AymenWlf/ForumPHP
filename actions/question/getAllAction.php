<?php

require('actions/database.php');

$getQuestions = $db->query('SELECT * FROM question ORDER BY id DESC');
