<?php

require_once 'inc/datenbank.inc.php';

$db->query(
    'CREATE TABLE zitate (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        autor VARCHAR(255),
        inhalt TEXT,
        erstellt_am DATETIME
    ) DEFAULT CHARSET = utf8'
);

$db->query(
    'CREATE TABLE log (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        zitat_id INTEGER,
        ip VARCHAR(32),
        browser VARCHAR(255),
        sprache VARCHAR(5),
        erstellt_am DATETIME
    ) DEFAULT CHARSET = utf8'
);



$zitate = [
    [
        'autor' => 'Johann Wolfgang von Goethe',
        'inhalt' => 'Erfolg hat drei Buchstaben: TUN!',           
    ],

    [
        'autor' => 'Homer Jay Simpson',
        'inhalt' => 'Stupidity got us into this mess, and stupidity will get us out.',        
    ],
    
];

$sql = 'INSERT INTO zitate (autor, inhalt, erstellt_am) VALUES (:autor, :inhalt, NOW())';

$statement = $db->prepare($sql);

$i = -1;

foreach ($zitate as $zitat) {     
    $i++;
    $statement->execute($zitate[$i]);
};

header('index.php');

