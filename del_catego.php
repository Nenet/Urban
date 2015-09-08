 <?php

require_once 'libs/connection.php';

try {
	// Construction de la requête de modification
	$sql = "DELETE FROM urban WHERE id = ?";

	// Préparation de la requête
	$q = $monObjet->prepare($sql);
	
	// Exécution de la requête en lui passant
	// les valeurs en provenance du formulaire
	$q->execute(array($_POST['id']));
	
	header('Location: lister.php');

} catch (PDOException $e) {
	echo "Il y a une erreur: " . $e->getMessage();
	die();
}