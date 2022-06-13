<?php
session_start();
require_once 'assets/includes/bdd.php';
if($_SESSION['password']){
    header('Location:connexion.php');
}
include "assets/includes/head.php";
?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets</title>
</head>

<body>

    <div class="row">
        <?php
        if (isset($_POST['envoi'])) {
            if (!empty($_POST['titre']) and !empty($_POST['description'])) {
                $titre = htmlspecialchars($_POST['titre']);
                $description = nl2br(htmlspecialchars($_POST['description']));

                $insererProjet = $Bdd->prepare('INSERT INTO projets(titre, description)VALUES(?, ?)');
                $insererProjet->execute(array($titre, $description));

                $erreur2 = "le projet a éte envoyé !";
            } else {
                $erreur = "Veuillez completer tous les champs !";
            }
        }

        ?>
        <div class="col-3"></div>
        <div class="col-6">
            <h1>Publier un projets</h1>

            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Titre</label>
                    <input class="form-control" type="text" name="titre" value="" placeholder="Titre">
                </div>

                <div class="mb-3">
                    <label class="form-label">Titre</label>
                    <textarea class="form-control" type="text" name="description" value="" placeholder="description"></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" name="envoi" class="btn btn-primary">Envoyer</button>
                </div>
            </form>
            <?php

            if (isset($erreur)) {
                echo '<font color="red">' . $erreur . '</font>';
            }
            if (isset($erreur2)) {
                echo '<font color="green">' . $erreur2 . '</font>';
            }

            ?>
        </div>
    </div>
</body>

</html>