<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Connexion</title>
</head>

<body>
    <div class="container">
        <?php
        session_start();

        require_once 'assets/includes/bdd.php';


        if (isset($_POST['formconnexion'])) 
        {
            $pseudocon = htmlspecialchars($_POST['pseudocon']);
            $mailcon = htmlspecialchars($_POST['mailcon']);
            $passwordcon = sha1($_POST['passwordcon']);
            if (!empty($pseudocon) and !empty($mailcon) and !empty($passwordcon))
            {
                $requser = $Bdd->prepare("SELECT * FROM membres WHERE pseudo = ? and email = ? and motdepasse = ?");
                $requser->execute(array($pseudocon, $mailcon, $passwordcon));
                $userexist = $requser->rowCount();
                if($userexist == 1)
                {
                    $userinfo = $requser->fetch();
                    $_SESSION['id'] = $userinfo ['id'];
                    $_SESSION['pseudo'] = $userinfo ['pseudo'];
                    $_SESSION['email'] = $userinfo ['email'];
                    $_SESSION['password'] = $userinfo ['password'];
                    header("Location:index.php?id=".$_SESSION['id']);
                }
                else
                {
                   $erreur = "Mauvais e-mail ou de passe";

                }
            }
            else
            {
                $erreur =  "Tous les champs doivent être complétés !";
            }

        }


        ?>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h1>Connexion</h1>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Pseudo</label>
                        <input class="form-control" type="text" name="pseudocon" value="" placeholder="Pseudo">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">e-mail</label>
                        <input class="form-control" type="email" name="mailcon" value="" placeholder="e-mail">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input class="form-control" type="password" name="passwordcon" value="" placeholder="Mot de passe">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="formconnexion" class="btn btn-primary">Inscription</button>
                    </div>
                </form>

                <?php

                if (isset($erreur)) {
                    echo '<font color="red">' . $erreur . '</font>';
                }


                ?>
            </div>
        </div>
    </div>
</body>

</htm