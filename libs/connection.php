<?php
// Connexion 
// Création de l'objet PDO et connexion au serveur MySQL
try {
    $monObjet = new PDO("mysql:host=localhost;dbname=urban", 'root', '',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $monObjet->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur'.$e->getMessage());
}

// Enregistrement 
// Création de l'objet PDO et connexion au serveur MySQL
try {
    $monObjet = new PDO("mysql:host=localhost;dbname=enregistrement", 'root', '',
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $monObjet->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur'.$e->getMessage());
}
