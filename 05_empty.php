<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'justyna24');
}
catch(Exception $e)
{
    die('Erreur : ' .$e->getMessage());
}

//
