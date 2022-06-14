<?php
require_once 'assets/includes/bdd.php';
if ((isset($_GET['id'])) and (!empty($_GET['id']))) {
    $getid = $_GET['id'];
    $recupProjets = $Bdd->prepare('SELECT * FROM projets WHERE id = ?');
    $recupProjets->execute(array($getid));
    if($recupProjets->rowCount() > 0){
        $suppresionprojet = $Bdd->prepare('DELETE FROM projets WHERE id = ?');
        $suppresionprojet->execute(array($getid));
        header('location: projet.php?a=v');
    }
    else
    {
        $erreur = "Aucun projet trouvé";
    }
} 
include "assets/includes/head.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer projet</title>
</head>

<body>
    <?php

    if (isset($erreur)) {
        echo '<font color="red">' . $erreur . '</font>';
    }
    if (isset($erreur2)) {
        echo '<font color="green">' . $erreur2 . '</font>';
    }


    ?>
</body>

</html>