<?php

require_once 'libs/connection.php';

try {

    // Construction de la requête de modification
    $sql = "UPDATE soins
	        SET 	Title=?,
                        Price=?,
			Categories_id=?
	        WHERE   idSoins=?";

    // Préparation de la requête
    $q = $monObjet->prepare($sql);

    // Exécution de la requête en lui passant
    // les valeurs en provenance du formulaire
    $q->execute(array(
        $_POST['Title'],
        $_POST['Price'],
        $_POST['Categories_id'],
        $_POST['id']
    ));

    header('Location: lister.php');

} catch (PDOException $e) {
    echo "Il y a une erreur: ".$e->getMessage();
    die();
}