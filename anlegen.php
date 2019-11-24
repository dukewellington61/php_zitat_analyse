<?php

require_once 'inc/konfiguration.inc.php';
require_once 'inc/funktionen.inc.php';

session_start();

if (!empty($_POST)) {    
    
    $sql = 'INSERT INTO zitate (autor, inhalt, erstellt_am) VALUES (:autor, :inhalt, NOW())';

    $statement = $db->prepare($sql);
    $statement->execute($_POST);

    header('location: index.php');
    
};



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Zitate</title>
    <link href="css/stylesheet.css" type="text/css" rel="stylesheet" />
</head>

<body>

    <div>
        <?php require 'inc/status.php'; ?> 
    </div>  

    <header>
        <h1>Zitat anlegen</h1>
    </header>    

    <section>

        <h2>Schreiben Sie hier ein neues Zitat:</h2>

        <form action="<?= makeSave($_SERVER['PHP_SELF']) ?>" method="post">
            <p>
                <input type="text" required="required" name="autor" id="autor" placeholder="Autor"/>
            </p>

            <p>
                <textarea cols="30" rows="10" required="required" name="inhalt" id="inhalt" placeholder="Schreiben Sie das Zitat hier."></textarea>    
            </p>           

            <p>
                <input type="submit" value="Eintragen"/>
            </p>
        </form>

    </section>

</body>

</html>