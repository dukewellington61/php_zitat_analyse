<?php

error_reporting(E_ALL ^ E_WARNING); 
// error_reporting(E_ALL); 
date_default_timezone_set('Europe/Berlin'); // oder php.ini

require_once dirname(__FILE__) . '/datenbank.inc.php';

const BENUTZER_DATEN = [
    'atothek' => [
        'vorname' => 'Andreas',
        'nachname' => 'Koeth',
        'passwort' => 'saigon',
    ],
    'testuser' => [
        'vorname' => 'Test',
        'nachname' => 'User',
        'passwort' => 'testuser',
    ],    
];

