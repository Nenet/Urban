<?php

$titrePage = 'Effacer un client';

// Inclure le header html
include('layout/headerClient.php');

require "libs/renderFunctions.php";

// tester l'id s'il est défini et non vide
if ($_GET['id'] == '' || !isset($_GET['id'])) {
	// ...on fait une redirection vers la liste
	header('Location: lister.php');
}

// essayer de faire une requête allant chercher les données de l'enregistrement en cours
try {
	require_once "libs/connection.php";
	
	// Construction de la requête SQL
	$sql = 'SELECT * FROM soins WHERE idSoins = '.$_GET['id'];

	// Exécution de la requête sur l'objet PDO connecté et récupération des valeurs
	// dans un statement (état)
	$mesClients = $monObjet->query($sql);

	// Transformer l'état en un tableau associatif contenant tous les enregistrements
	$listePersonne = $mesClients->fetch(PDO::FETCH_ASSOC);
	
	//echo renduHtmlTable('id', $listePersonne);
	$liensVersAjouter  = 'effacer'; // Assigner un label de bouton
	$liensVersAnnuler  = 'annuler'; // Assigner un label de bouton
	$id                = $_GET['id']; // Assigner l'identifiant de l'enregistrement à effacer
	
?>

<h1><?php echo $titrePage; ?></h1>
<form method="post" action="del_client.php">
	<p>Etes-vous sur de vouloir effacer ce client?
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<input class="btn" type="button" onclick="window.history.back();" value="annuler">
	<input class="btn" type="submit" value="effacer">
</form>

<?php
} catch (PDOException $e) {
	echo $e->getMessage(); // Assigner le message d'erreur éventuel)
}

// Inclure le footer html
include('layout/footerClient.php');
?>