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
        width: 15%;
        margin-left: 12px;
    }
    input#message
    {
        width: 30%;
    }
    input#id
    {
        width: 30%;
        margin-left: 38px;
    }
    p
    {
        text-align: left;
    }
    </style>

    <body>
    <! --  ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨ for ENTER the message ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨-->
    <form action="01_minichat_post.php" method="post">
        <p>
        <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
        <label for="message">Message</label> : <input type="text" name="message" id="message" /><br />

        <input type="submit" value="Send" />
        </p>
    </form> <hr><! -- //¨¨¨¨¨end ENTER the message -->

    <! -- ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨ for MODIFY message acc ID ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨-->
    <form action="02_modify.php" method="post">
        <p>
            <label for="id">Enter ID number</label> : <input type="number" name="id" id="id" /><br />
            <label for="message">Message for changing</label> : <input type="text" name="message" id="message" /><br />
            <input type="submit" value="Modify" />
        </p>
    </form> <hr><! -- //¨¨¨¨¨end MODIFY message acc ID -->

    <! -- ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨ for DELETE message acc PSEUDO ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨-->
    <form action="03_delete_pseudo.php" method="post">
        <p>
            <label for="pseudo">Enter pseudo</label> : <input type="text" name="pseudo" id="pseudo" /><br />
            <label for="message">Enter message</label> : <input type="text" name="message" id="message" /><br />
            <input type="submit" value="Delete" />
        </p>
    </form> <hr><! -- //¨¨¨¨¨¨end DELETE message acc PSEUDO ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨-->

    <! -- ¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨¨ for DELETE message acc ID -->
    <form action="04_delete_ID.php" method="post">
        <p>
            <label for="id">Enter ID number</label> : <input type="number" name="id" id="id" /><br />
            <label for="message">Enter message</label> : <input type="text" name="message" id="message" /><br />
            <input type="submit" value="Delete" />
        </p>
    </form> <hr><! -- //¨¨¨¨¨¨end DELETE message acc ID -->




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

$reponse = $bdd->query('SELECT pseudo, message, ID FROM minichat ORDER BY ID DESC LIMIT 0, 10');

// Display all last 10 messages (all data are protected by htmlspecialchars
while ($donnees = $reponse->fetch())
{
    echo '<p>' . $donnees['ID'] .' . ' . '<strong>' . htmlspecialchars($donnees['pseudo']) . '</strong>: ' . htmlspecialchars($donnees['message']) . '</p>';
}
$reponse->closeCursor();

    ?>

    </body>
</html>