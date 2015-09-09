<?php

$titrePage = 'Détail du Soins';

include "layout/headerClient.php";

// Si aucun id n'est passé alors....
if ($_GET['id'] == '' || !isset($_GET['id'])) {
	// ...on fait une redirection vers la liste
	header('Location: lister.php');
}

$message = '';
// Si un message est passé alors...
if (isset($_GET['message']) && $_GET['message'] != '') {
    $message = $_GET['message'];
}

require 'libs/renderFunctions.php';

try {
	// Création de l'objet PDO et connexion au serveur MySQL
	require_once "libs/connection.php";

	// Construction de la requête SQL
		$sql = 'SELECT idSoins, Title, Price, Name
			FROM soins
			JOIN categories
			ON soins.Categories_id = id
			WHERE idSoins = '.$_GET['id'];
	
	// Exécution de la requête sur l'objet PDO connecté et récupération des valeurs dans un statement (état)
	$mesSoins = $monObjet->query($sql);
	
	// Transformer l'état en un tableau associatif contenant tous les enregistrements
	$listeSoins = $mesSoins->fetchAll(PDO::FETCH_ASSOC);
	
	$liensVersAjouter  = 'ajouter';             // Assigner un label de bouton
	
	// Gestion des boutons
	$boutonModifier    = '<a class="btn" href="modifier.php?id='.$_GET['id'].'">modifier</a> ';
	$boutonEffacer     = '<a class="btn" href="effacer.php?id='.$_GET['id'].'">effacer</a> ';
	$boutonLister      = '<a class="btn" href="lister.php">retour</a>';	
?>

<h1>Détail du Soins</h1>

<?php if ($message != '') { ?>
<div id="message" class="alert alert-success">
	<strong>Succès:</strong> <?php echo $message; ?>
</div>
<?php } ?>

<?php echo renduHtmlTable('idSoins', $listeSoins); ?>

<hr>

<?php echo $boutonModifier; ?>
<?php echo $boutonEffacer; ?>

<hr>

<?php echo $boutonLister; ?>

<script>
$(document).ready(function() {
	$('#message').delay(2000).fadeOut("slow" );
}); 
</script>

<?php 
} catch (PDOException $e) {
	echo $e->getMessage(); // Afficher le message d'erreur éventuel)
	exit;
}

include "layout/footerClient.php";
?>