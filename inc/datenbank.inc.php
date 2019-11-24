<?php

$optionen = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // nur zur Entwicklung!
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
];

$db = new PDO(
    'mysql:host=https://www15681.webmasterkurse.de/phpmyadmin/db_structure.php?server=1&db=www15681_zitat_analyse&token=0d960b2b9428ae12c219fa3e0b03eb96;dbname=www15681_zitat_analyse', // neue DB!
    'root',
    '',
    $optionen
);

$db->query('SET NAMES utf8');
