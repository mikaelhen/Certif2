<?php
require_once 'assets/includes/bdd.php';
if ((isset($_GET['id'])) and (!empty($_GET['id']))) {
    $getid = $_GET['id'];

    $recupProjets = $Bdd->prepare('SELECT * FROM projets WHERE id = ?');
    $recupProjets->execute(array($getid));
    if ($recupProjets->rowCount() > 0) {
        $projetsInfos = $recupProjets->fetch();
        $titre = $projetsInfos['titre'];
        $description = str_replace('<br />', '', $projetsInfos['description']);

        if (isset($_POST['valider'])) {
            $titre_saisi = htmlspecialchars($_POST['titre']);
            $description_saisi = nl2br(htmlspecialchars($_POST['description']));

            $majprojet = $Bdd->prepare('UPDATE projets SET titre = ?, description = ? WHERE id = ?');
            $majprojet->execute(array($titre_saisi, $description_saisi, $getid));

            header('Location: projet.php');
        }
    } else {
        $erreur = "Aucun projet trouvé";
    }
} else {
    $erreur = "Aucun projet trouvé";
}
include "assets/includes/head.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Projet</title>
</head>

<body>

    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <h1>Modifier un projet</h1>
            <form method="post" enctype="multipart/form-data">
                <div class=" mb-3">
                <label class="form-label">Titre</label>
                <input class="form-control" type="text" name="titre" placeholder="Titre" value="<?= $titre; ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <textarea class="form-control" type="text" name="description" placeholder="description" value="">
                        <?= $description; ?></textarea>
        </div>
        <div class="showimage">
            <input type="file" accept="image/jpeg, image/png" name="image">
        </div>
        <div class="mb-3">
            <button type="submit" name="valider" class="btn btn-primary">Valider</button>
        </div>
    </div>
    </div>

    </form>
</body>

</html>
<?php

if (isset($erreur)) {
    echo '<font color="red">' . $erreur . '</font>';
}
if (isset($erreur2)) {
    echo '<font color="green">' . $erreur2 . '</font>';
}


?>