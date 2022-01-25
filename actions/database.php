<?php

try
{
    session_start();
    $db = new PDO("mysql:host=localhost;dbname=forumPHP;charset=utf8","root","");
}catch(Exception $e)
{
    die("Error to make the connexion with the database, for more informations : ".$e->getMessage());
}