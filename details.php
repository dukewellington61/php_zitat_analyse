<?php

require_once 'inc/konfiguration.inc.php';
require_once 'inc/funktionen.inc.php';

session_start();

if (!userLoggedIn()) {
    redirect('auswertungen.php');
}; 

$dateArray = $_GET;

$date = implode(", ", $dateArray);

$sql = 'SELECT zitat_id FROM log WHERE DATE(erstellt_am) = "' . $date . '"';

$statement = $db->query($sql);
$quoteIDs = $statement->fetchAll();



$sql = 'SELECT browser FROM log WHERE DATE(erstellt_am) = "' . $date . '" AND browser LIKE "%Win%"';

$statement = $db->query($sql);
$win = $statement->fetchAll();


$sql = 'SELECT browser FROM log WHERE DATE(erstellt_am) = "' . $date . '" AND browser LIKE "%Mac%"';

$statement = $db->query($sql);
$mac = $statement->fetchAll();


$sql = 'SELECT sprache FROM log WHERE DATE(erstellt_am) = "' . $date . '" AND sprache="de-DE" OR DATE(erstellt_am) = "' . $date . '" AND sprache="de"';

$statement = $db->query($sql);
$language = $statement->fetchAll();


// logic für Arbeitsschritt 7.4
$flatArray = array_values($quoteIDs);

$idArray[] = null;

foreach ($quoteIDs as $id) {
    $idArray[] = $id['zitat_id'];
};

$idArrayCountValues = array_count_values($idArray);

$keysArray = array_keys($idArrayCountValues);      

$counter = 0;




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
        <h1>Details</h1>
    </header>

    <p>
        Anzahl der Sichten: <?= count($quoteIDs) ?> 
    </p>

    <p>
        davon Windows-User: <?= count($win) ?> (<?= round(count($win)  * 100 / count($quoteIDs), 0) ?> %)
    </p>

    <p>
        davon Mac-User: <?= count($mac) ?> (<?= round(count($mac)  * 100 / count($quoteIDs), 0) ?> %)
    </p>

    <p>
        davon mit Deutsch als bevorzugter Browser Sprache: <?= count($language) ?> (<?= round(count($language)  * 100 / count($quoteIDs), 0) ?> %)
    </p>

    <table> 
        <tr>              
            <th style="border-style:solid; border-width:2px;">zitat_id</th>
            <th style="border-style:solid; border-width:2px;">Anzahl</th> 
            <th style="border-style:solid; border-width:2px;">Anteil</th>  
        </tr>   
           
        <?php foreach ($idArrayCountValues as $id): ?>                
            <tr> 
                <td style="border-style:solid; border-width:2px;"><?= $keysArray[$counter++] ?></td>   
                <td style="border-style:solid; border-width:2px;"><?= $id ?></td>
                <td style="border-style:solid; border-width:2px;"><?= round($id  * 100 / count($quoteIDs), 0) ?> % </td>
            </tr>   
                      
        <?php endforeach; ?>  
    </table>
       
   
</body>

</html>
