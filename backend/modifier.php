<?php
$titrePage = 'Modifier un Soins';

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
    $sql = 'SELECT * FROM soins WHERE idSoins = '.$_GET['id'];
    // Exécution de la requête sur l'objet PDO connecté et récupération des valeurs
    // dans un statement (état)
    $mesSoins = $monObjet->query($sql);
    // Transformer l'état en un tableau associatif contenant tous les enregistrements
    $listeSoins = $mesSoins->fetch(PDO::FETCH_ASSOC);

    //Récupération de la liste des catégories
    $sqlCategories = 'SELECT * FROM categories ORDER BY Name';
    // Exécution de la requête sur l'objet PDO connecté et récupération des valeurs
    // dans un statement (état)
    $mesCategories = $monObjet->query($sqlCategories);
    // Transformer l'état en un tableau associatif contenant tous les enregistrements
    $listeCategories = $mesCategories->fetchAll(PDO::FETCH_ASSOC);

    $liensVersModifier = 'modifier';   // Assigner un label de bouton
    $liensVersAnnuler = 'annuler';   // Assigner un label de bouton
    $id = $_GET['id'];   // Assigner l'identifiant de l'enregistrement à effacer
    ?>

    <h1>Modifier un Soins</h1>

    <form id="form1" name="form1" method="post" action="mod_client.php">
        <table width="100%" border="0">
            <thead>
            <th>Label</th>
            <th>Valeur</th>
            </thead>
            <tbody>
                <tr>
                    <th width="16%" scope="row">Titre</th>
                    <td width="84%">
                        <input type="text" name="Title" id="Title" value="" maxlength="50">
                        <label for="Title" class="error" id="Title-error"></label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Prix</th>
                    <td>
                        <input type="text" name="Price" id="Price" value="" maxlength="50">
                        <label for="Price" class="error" id="Price-error"></label>
                    </td>
                </tr>
            <th scope="row">Soins</th>
            <td>
                <select name="Categories_id" id="Categories_id">
                    <?php
                    foreach ($listeCategories AS $key => $value) {
                        ?>
                        <option value="<?php echo $value['id']; ?>" <?php if ($listeSoins['Categories_id'] == $value['id']) { ?> selected="selected" <?php } ?>><?php echo $value['Name']; ?></option>
                        <?php
                    }
                    ?>
                </select></td>
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
        $(function () {
            $("#form1").validate({
                rules: {
                    Title: {
                        required: true
                    },
                    Price: {
                        required: true
                    }
                },
                messages: {
                    Title: {
                        required: "Veuillez entrer un Titre"
                    },
                    Price: {
                        required: "Veuillez entrer un prix"
                    }
                }
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