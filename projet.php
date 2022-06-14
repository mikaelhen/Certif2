<?php
session_start();
require_once 'assets/includes/bdd.php';
if ($_SESSION['password']) {
    header('Location:connexion.php');
}
include "assets/includes/head.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher projets</title>
</head>


<body>
    <?php
    $recupProjets = $Bdd->query("SELECT * FROM projets");
    while ($projets = $recupProjets->fetch()) {
    ?>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 d-flex flex-column justify-content-center align-items-center" style="border: 1px solid black;">
                <h1><?= $projets['titre']; ?></h1>
                <p><?= $projets['description']; ?></p>
                <div class="col-3 d-flex flex-column justify-content-center">
                    <img src=" assets/img/<?= $projets['image']; ?>">
                </div>
                <div class="bouton">
                    <a href="supprimerProjet.php?id=<?= $projets['id']; ?>"><button type="button" class="btn btn-sm btn-outline-secondary bg-danger text-white my-2">
                            Supprimer le projet
                        </button></a>
                    <a href="modifierProjet.php?id=<?= $projets['id']; ?>"><button type="button" class="btn btn-sm btn-outline-secondary bg-success text-white my-2">
                            Modifier le projet
                        </button></a>
                </div>
            </div>

        </div>

        <?php
        if (isset($_GET['a'])) {
            if ($_GET['a'] == 'v') {
                $erreur2 = '<div class="col-12"></div>
            <div class="col-12 d-flex justify-content-center">Votre projet est bien supprimé</div>';
            }
        }

        ?>
        <br>
    <?php
    }
    ?>
    <?php

    if (isset($erreur)) {
        echo '<font color="red">' . $erreur . '</font>';
    }
    if (isset($erreur2)) {
        echo '<font color="green">' . $erreur2 . '</font>';
    }

    ?>

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6 d-flex flex-column justify-content-center align-items-center">
            <h1></h1>
            <p></p>
            <div class="bouton">
                <a href="ajouterProjet.php"><button type="button" class="btn btn-sm btn-outline-secondary bg-primary text-white my-2">
                        Ajouter un Projet
                    </button></a>
                <a href="index.php"><button type="button" class="btn btn-sm btn-outline-secondary bg-secondary text-white my-2">
                        Accueil
                    </button></a>
            </div>
        </div>

    </div>
</body>

</html>