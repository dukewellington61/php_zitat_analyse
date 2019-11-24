<?php

require_once 'inc/konfiguration.inc.php';
require_once 'inc/funktionen.inc.php';

session_start();


// Prüfe alle Benutzer auf Übereinstimmung der übergebenen Daten
foreach (BENUTZER_DATEN as $benutzername => $daten) {
    if (
        ($benutzername === trim($_POST['benutzername'])) &&
        ($daten['passwort'] === trim($_POST['passwort']))
    ) {
        // Wenn ja, logge den Benutzer ein
        logInUser($benutzername);
    }
}
 
redirect('auswertungen.php');
