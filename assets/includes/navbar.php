<?php
session_start();

require_once 'assets/includes/bdd.php';

// if (isset($_GET['id']) AND $_GET['id'] > 0)
//  {
if (isset($_SESSION["id"])) {
    $getid = intval($_GET['id']);
    $requser = $Bdd->prepare('SELECT * FROM membres WHERE id = ?');
    $requser->execute(array($getid));
    $userinfo = $requser->fetch();
} else {
}

?>
<header>
    <div class="navbar">
        <div class="containnav">
            <div class="logo">

                <a href="index.php"><img src="assets/img/logo.png" alt="logo"></a>
            </div>

            <label for="toggle">☰</label>

            <input type="checkbox" id="toggle">
            <div class="main_pages">
                <?php
                if (isset($_SESSION["id"])) {
                ?>
                    <a href="#">Profil de : <?php echo $userinfo['pseudo']; ?></a>
                <?php
                }
                ?>

                <a href="index.php">Accueil</a>
                <a href="#">Projets</a>
                <a href="#">Me contacter</a>

                <?php
                if (isset($_SESSION["id"])) {
                ?>
                    <a href="deconnexion.php">Se déconnecter</a>

                <?php
                }
                // if (isset($_SESSION['id']) and $userinfo['id'] == $_SESSION['id']) {
                ?>

                <?php
                // }
                if (empty($_SESSION["id"])) {
                ?>

                <a href="inscription.php">Inscription</a>
                <a href="connexion.php">Connexion</a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</header>
<!-- <?php
        // }
        ?> -->