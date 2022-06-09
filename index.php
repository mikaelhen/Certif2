<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <?php
    include "assets/includes/head.php"; ?>
</head>

<body>
    <?php
    include "assets/includes/navbar.php";
    ?>
    <!-- accueil -->
    <section class="accueil bg-dark d-flex w-100  flex-column justify-content-center align-items-center">
        <!-- <img src="../Certfif/assets/img/projet.jpg"> -->
        <h1 class="display-1 text-white text-center">Site de projets</h1>
        <p class="lead text-center text-white px-4">Je me nomme Mikaël Henaux, je suis acuellement en formation de
            <span style="font-weight: bold;">developpeur
                web</span>.<br>
            Dans le cadre de ma formation, il m'a été demandé de réaliser des projets.<br>
            Ce site a pour but de partager avec vous ces projets.
        </p>
        <p class="lead mb-5">
            <a href="#" class="btn btn-secondary">En savoir plus</a>
        </p>

    </section>

    <!-- grille responsive -->

    <div class="container-fluid py-5 px-5 bg-dark">

        <h2 class="display-4 text-center text-white mb-5 text-decoration-underline">Exercices Réalisés </h2>
        <!-- 576 xs - > 576px S - > 768px M - > 992px L - > 1200px Extra large -->
        <hr>
        <div class="row justify-content-center">

            <div class="col-md-3 col-sm-6">

                <div class="card mb-4 shadow-sm">

                    <img src="assets/img/figma.PNG" alt="figma" class="w-100">
                    <div class="div card-body">
                        <p class="card-text">
                            Maquette du site
                        </p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                Contact
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary mx-2">
                                Découvrir
                            </button>
                        </div>
                    </div>
                </div>

            </div>



        </div>

    </div>
    </div>


    <div class="container-fluid py-5 px-5 bg-light">

        <h2 class="display-4 text-center mb-5 text-decoration-underline">Projets réalisés</h2>
        <!-- 576 xs - > 576px S - > 768px M - > 992px L - > 1200px Extra large -->

        <div class="row justify-content-center">

            <div class="col-md-3 col-sm-6">

                <div class="card mb-4 shadow-sm">

                    <img src="assets/img/ardennemetropole.PNG" alt="ardennes_metropole" class="w-100">
                    <div class="div card-body">
                        <p class="card-text">
                            Site dédié à la recherche d'emploi.<br>
                            Réalisé au sein d'Ardenne Métropole.<br>
                            Stage du 02 au 30 mai 2002.
                        </p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                Contact
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary mx-2">
                                Découvrir
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-3 col-sm-6">

                <div class="card mb-4 shadow-sm">

                    <img src="assets/img/tips.PNG" alt="tips" class="w-100">
                    <div class="div card-body">
                        <p class="card-text">
                            Site dédié au truc et astuce du codage informatique.<br>
                            Réalisé au sein du CCI des ardennes.<br>
                            Cursus de formation
                        </p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                Contact
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary mx-2">
                                Découvrir
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-3 col-sm-6">

                <div class="card mb-4 shadow-sm">

                    <img src="assets/img/fil_rouge.PNG" alt="ardennes_metropole" class="w-100">
                    <div class="div card-body">
                        <p class="card-text">
                            Site dédié à la vidéo à la demande (V.O.D).<br>
                            Réalisé au sein du CCI des ardennes.<br>
                            Cursus de formation
                        </p>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">
                                Contact
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary mx-2">
                                Découvrir
                            </button>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php

    include "../Certfif/assets/includes/footer.php";

    ?>



</body>

</html>