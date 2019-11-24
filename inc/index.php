<?php

require_once 'inc/konfiguration.inc.php';
require_once 'inc/funktionen.inc.php';

session_start();

$sql = 'SELECT * FROM zitate ORDER BY RAND() LIMIT 1';

$statement = $db->query($sql);
$zitat = $statement->fetch();
unset($statement);

$log = [
        'zitat_id' => $zitat['id'],
        'ip' => anonymisiereIp($_SERVER['REMOTE_ADDR']) ,
        'browser' => $_SERVER['HTTP_USER_AGENT'],
        'sprache' => explode(',', $_SERVER['HTTP_ACCEPT_LANGUAGE'])[0]
];

$sql = 'INSERT INTO log (zitat_id, ip, browser, sprache, erstellt_am) VALUES (:zitat_id, :ip, :browser, :sprache, NOW())';

    $statement = $db->prepare($sql);
    $statement->execute($log);


?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Zitate</title>
</head>

<body>

    <div>
        <?php require 'inc/status.php'; ?> 
    </div>       

    <header>
        <h1>Zitate</h1>
    </header>

    <?php require 'inc/hauptmenu.tpl.php'; ?>

    <section>
      
        <?php require 'inc/eintrag.tpl.php'; ?>      

    </section>

</body>

</html>