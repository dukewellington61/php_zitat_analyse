<?php

function makeSave($benutzerEingabe, $encoding = 'UTF-8')
{
    return htmlspecialchars(
        strip_tags($benutzerEingabe),
        ENT_QUOTES | ENT_HTML5,
        $encoding
    );
};

function logInUser($benutzername) {
    $_SESSION['eingeloggt'] = $benutzername;        
};

function logOutUser() {
    unset($_SESSION['eingeloggt']);
    redirect('index.php');
};

function userLoggedIn() {
    return isset($_SESSION['eingeloggt']);
};

function redirect($url) {
    header('Location: ' . $url);
    exit;
}

function anonymisiereIp ($ip) {
    $hash =  md5($ip);
    return substr($hash, 0, 15);
};
