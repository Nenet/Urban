<?php

$titrePage = 'Modifier une catégories';

// Inclure le header html
include('layout/headerClient.php');

require "libs/renderFunctions.php";

// tester l'id
if ($_GET['id'] == '' || !isset($_GET['id'])) {
	// ...on fait une redirection vers la liste
	header('Location: lister.php');
}

try {
	require_once "libs/connection.php";
	
	// Construction de la requête SQL
	$sql = 'SELECT * FROM urban WHERE id = '.$_GET['id'];
	// Exécution de la requête sur l'objet PDO connecté et récupération des valeurs
	// dans un statement (état)
	$mesCategories= $monObjet->query($sql);
	// Transformer l'état en un tableau associatif contenant tous les enregistrements
	$listeCategories= $mesCategories->fetch(PDO::FETCH_ASSOC);
	
	//Récupération de la liste des categories 
	$sqlcategories = 'SELECT * FROM categories ORDER BY Title';
	// Exécution de la requête sur l'objet PDO connecté et récupération des valeurs
	// dans un statement (état)
	$mesCategories = $monObjet->query($sqlpays);	
	// Transformer l'état en un tableau associatif contenant tous les enregistrements
	$listeCategories = $mesCategories->fetchAll(PDO::FETCH_ASSOC);
	
	$liensVersModifier = 'modifier'; 		// Assigner un label de bouton
	$liensVersAnnuler  = 'annuler'; 		// Assigner un label de bouton
	$id                = $_GET['id']; 		// Assigner l'identifiant de l'enregistrement à effacer
        
	
?>

<h1>Modifier une catégorie </h1>

<form id="form1" name="form1" method="post" action="mod_catego.php">
  <table width="100%" border="0">
  	<thead>
  		<th>Label</th>
  		<th>Valeur</th>
  	</thead>
    <tbody>
      <tr>
        <th width="16%" scope="row">Titre</th>
        <td width="84%">
        <input maxlength="50" type="text" name="titre" id="title" value="<?php echo $listeCategories['Title']; ?>"></td>
      </tr>
     <tr>
 
        <th scope="row">&nbsp;</th>
        <td>
        	<input class="btn" type="submit" name="modifier" id="modifier" value="modifier"> 
          	<a class="btn" href="lister.php">retour</a>
        	<input type="hidden" name="id" value="<?php echo $id; ?>">
		</td>
      </tr>
    </tbody>
  </table>
</form>
<script>
  $(function() 
    
    $("#form1").validate({
		rules: {
			titre: {
				required: 	true,
				minlength: 	2,
				maxlength: 	50

		},
		messages: {
			nom: {
				required: 	"Veuillez entrer la catégorie,
				minlength: 	"Votre titre est cours",
				maxlength: 	"Votre titre est trop long"
			},
		
	});
  });
</script>


<?php
} catch (PDOException $e) {
	echo $e->getMessage(); // Assigner le message d'erreur éventuel)
}

// Inclure le footer html
include('layout/footerClient.php');
?>