<?php

require_once 'inc/konfiguration.inc.php';
require_once 'inc/funktionen.inc.php';

session_start();

if (userLoggedIn()) {

    $sql = 'SELECT DATE(erstellt_am) FROM log';

    $statement = $db->query($sql);
    $dateArrayAll = $statement->fetchAll(PDO::FETCH_COLUMN);
    unset($statement);

    $dateArrayUnique = array_unique($dateArrayAll); 

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

    <?php if (userLoggedIn()): ?>       

        <?php foreach ($dateArrayUnique as $date): ?>
            <p><a href="details.php?date=<?= $date ?>"><?= $date ?></a></p>
        <?php endforeach; ?>  
        
    <?php else: ?>

        <form action="einloggen.php" method="post">
            <input type="text" name="benutzername" id="benutzername" required="required" placeholder="Benutzername" />
            <input type="password" name="passwort" id="passwort" required="required" placeholder="Passwort" />
            <input type="submit" value="Einloggen" class="button" />
        </form>
        
    <?php endif; ?>    

</body>

</html>