<?php

// Création de l'objet PDO et connexion au serveur MySQL

$monObjet = new PDO('mysql:host=localhost;dbname=urban', 'root', '',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
