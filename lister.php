<?php

$titrePage = 'Liste des prix';

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
	$sql = 'SELECT soins.idSoins, Title, Price, Categories_id
			FROM soins
			JOIN categories
			ON soins.Categories_id = categories.id';

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
	$soins  	= $monObjet->query($sql);
	$pricelist	= $soins->fetchAll(PDO::FETCH_ASSOC);

?>
	<h1>Lister les prix</h1>
	
<?php echo renduHtmlTable('id', $PriceListe, $tri, $sens); ?>
	
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

