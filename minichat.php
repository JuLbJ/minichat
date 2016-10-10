<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mini_chat</title>
    </head>
    <style>
    form
    {
        text-align: center;
    }
    input#pseudo
    {
        width: 10%;
        margin-left: 12px;
    }
    input#message
    {
        width: 50%;
    }
    p
    {
        text-align: left;
    }
    </style>
    <body>

    <form action="minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> : <input type="text" name="message" id="message" /><br />
        <input type="submit" value="Envoyer" />
        </p>
    </form>

    <?php
    // connection with BDD

    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'justyna24');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
// 10 last messages recovery

$reponse = $bdd->query('SELECT pseudo, message FROM minichat ORDER BY ID DESC LIMIT 0, 10');

// Display all last 10 messages (all data are protected by htmlspecialchars
while ($donnees = $reponse->fetch())
{
    echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';
}
$reponse->closeCursor();

    ?>

    </body>
</html>