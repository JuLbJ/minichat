<?php
// C O N N E C T I O N with bdd
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test; charset=utf8', 'root', 'justyna24');
}
catch(Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

// 1_1. message's insertion using a prepared query DANS la condition:
$req = $bdd->prepare('DELETE FROM minichat WHERE nom='pseudo', nom='message'')


$req = $bdd->prepare('UPDATE minichat SET message = ? WHERE ID = ?');
$req->execute(array($_POST['message'], $_POST['id']));


// 2. redirection the visitors into the page: minichat.php

header('Location: minichat.php');
