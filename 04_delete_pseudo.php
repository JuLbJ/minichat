<?php
// C O N N E C T I O N with bdd
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=table;charset=utf8', 'root', 'justyna24');
}
catch(Exception $e)
{
    die('Erreur : ' .$e->getMessage());
}

//
