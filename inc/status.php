<?php

require_once 'inc/funktionen.inc.php';

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Zitate</title>
</head>

<body>

    <div>
        <?php if (userLoggedIn()): ?>

            <span>Hallo! Sie sind eingeloggt als <?= $_SESSION['eingeloggt'] ?>.</span><span> <a href="ausloggen.php">log out</a></span>
       
        <?php endif; ?>    
    </div>    
    
</body>

</html>