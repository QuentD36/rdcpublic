<?php

if(!is_dir('mod_log')){
    mkdir('mod_log');
}
// Début de la session
session_start();

// Import des fichiers de conf & pdf
require_once('include/configuration.php');
require('public/tfpdf/tfpdf.php');

// Import autoloader
Autoloader::chargerClasses();

// Affichage des infos php si besoin
//phpinfo();
//die();

// Détection du navigateur : Si IE alors error dans le rooting plus bas
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$browser        = "Inconnu";
$browser_array = array(
    '/msie/i'      => 'Internet Explorer',
    '/trident/i'   => 'Internet Explorer',
);
foreach ($browser_array as $regex => $value){
    if (preg_match($regex, $user_agent)){
        $browser = $value;
    }
}

// Gestion du rooting, si pas connecté accès seulement à login, sinon accueil par défaut
if (!isset($_SESSION['login'])){

    if ($browser == 'Internet Explorer'){
        $_REQUEST['gestion'] = 'browser';
    }else{
        $_REQUEST['gestion'] = 'login';
    }
}else if(!isset($_REQUEST['gestion'])){ // S'il n'existe pas la variable gestion
    $_REQUEST['gestion'] = 'accueil';
}


$oRouteur = new $_REQUEST['gestion']($_REQUEST);

$oRouteur->choixAction();