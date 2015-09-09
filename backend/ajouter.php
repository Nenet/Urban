<?php
$titrePage = 'Ajouter un client';

// Inclure le header html
include('layout/headerClient.php');

require "libs/renderFunctions.php";

try {
    require_once "libs/connection.php";

    $sql = 'SELECT     id, Name
			FROM categories
			ORDER BY Name';

    $mesSoins = $monObjet->query($sql);
    $listeSoins = $mesSoins->fetchAll(PDO::FETCH_ASSOC);
    $selectCategorie = renduHtmlSelect($listeSoins, 'id', 'Categories_id');

    $liensVersAjouter = 'ajouter';   // Assigner un label de bouton
    $liensVersAnnuler = 'annuler';   // Assigner un label de bouton
    ?>
    <h1>Ajouter un nouveaux Soins</h1>

    <form id="form1" name="form1" method="post" action="add_client.php">
        <table>
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
                        <input type="number" name="Price" id="Price" value="" maxlength="50">
                        <label for="Price" class="error" id="Price-error"></label>
                    </td>
                </tr>
                <tr>
                    <th>Catégories</th>
                    <td><?php echo $selectCategorie; ?></td>
                </tr>
                <tr>
                    <th scope="row">&nbsp;</th>
                    <td>
                        <input class="btn" type="submit" name="ajouter" id="ajouter" value="ajouter"> 
                        <a class="btn" href="lister.php">retour</a>
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