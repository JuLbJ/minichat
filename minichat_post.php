<?php
// connection with BDD
try{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'justyna24');
}
catch(Exception $e)
{
    die('Erreur : ' .$e->getMessage());
}

// insertion of the message using a prepared query
$req = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

// Redirection the visitors into the page minichat.php

header('Location: minichat.php');
?>