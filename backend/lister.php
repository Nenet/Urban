<?php

$titrePage = 'Lister des Soins';

// Inclure le header html
include('layout/headerClient.php');

// tester le tri
$tri = "";
if (isset($_GET['tri']) && $_GET['tri'] != '') {
    $tri = $_GET['tri'];
}

// tester le sens du filtre
$sens = "";
if (isset($_GET['sens']) && $_GET['sens'] != '') {
    $sens = $_GET['sens'];
}

try {
    // Inclure les éléments de connexions à la DB
	require_once "libs/connection.php";
	
	// Appeler la librairie personnelle de rendu
	include('libs/renderFunctions.php');

	// Pérparer la requête SQL
	$sql = 'SELECT idSoins, Title, Price, Name
			FROM soins
			JOIN categories
			ON soins.Categories_id = id';
        
	// Gestion du tri et du sens de tri
	if ($tri!="") {
	    $sql .= ' ORDER BY '.$tri;
	} else {
	    $sql .= ' ORDER BY id';
	}
	
	// Vérifier le sens de tri
	if ($sens!="") {
	    $sql .= ' '.$sens;
	}
	
	// Effectuer la requête et stocker les valeurs dans $listePersonne
	$mesSoins 	= $monObjet->query($sql);
	$listeSoins 	= $mesSoins->fetchAll(PDO::FETCH_ASSOC);

?>
	<h1>Lister des Soins</h1>
	
<?php echo renduHtmlTable('idSoins', $listeSoins, $tri, $sens); ?>
	
	<hr>
	
	<a class="btn" href="ajouter.php">ajouter</a>
<?php 
	
} catch (PDOException $e) {
	echo $e->getMessage();  // Afficher le message d'erreur éventuel
	exit;
}

// Inclure le footer html
include('layout/footerClient.php');
?>