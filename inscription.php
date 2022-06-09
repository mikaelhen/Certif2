<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Inscrption</title>
</head>

<body>
    <div class="container">
        <?php
        require_once 'assets/includes/bdd.php';


        if (isset($_POST['forminscription'])) {
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $mail = htmlspecialchars($_POST['mail']);
            $mail2 = htmlspecialchars($_POST['mail2']);
            $password = sha1($_POST['password']);
            $password2 = sha1($_POST['password2']);

            if (!empty($_POST['pseudo']) and !empty($_POST['mail']) and !empty($_POST['mail2']) and !empty($_POST['password'])) {
                $pseudoleng = strlen($pseudo);
                if ($pseudoleng <= 255) {
                    if ($mail == $mail2) {
                        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) 
                        {
                            $reqmail = $Bdd->prepare("SELECT * FROM membres WHERE email = ?");
                            $reqmail->execute(array($mail));
                            $mailexists = $reqmail->rowCount();
                            if($mailexists == 0) 
                            {
                                if ($password == $password2) 
                                {
                                    $insertmbr = $Bdd->prepare("INSERT INTO membres(pseudo, email, motdepasse) VALUES(?,?,?)");
                                    $insertmbr->execute(array( $pseudo,$mail,$password));                             
                                    $erreur = "Votre compte a bien été crée !";
                                    header("Location: index.php");
                                } 
                                else 
                                {
                                    $erreur = "Vos mot de passes ne correspondent pas !";
                                }
                            }
                            else
                            {
                                $erreur = "Adresse e-mail déjà utilisée !";
                            }
                        } else {
                            $erreur = "Votre adresse e-mail n'est pas valide !";
                        }
                    } else {
                        $erreur = "Vos adresses e-mail ne correspondent pas !";
                    }
                } else {
                    $erreur = "Votre pseudo ne doit pas dépasser 255 caractéres";
                }
            } else {
                $erreur = "Tous les champs doivent être complétés";
            }
        }

        ?>


        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h1>Inscription</h1>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Pseudo</label>
                        <input class="form-control" type="text" name="pseudo" value="<?php if (isset($pseudo)) {
                                                                                            echo $pseudo;
                                                                                        } ?>" placeholder="Pseudo">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">e-mail</label>
                        <input class="form-control" type="email" name="mail" value="<?php if (isset($mail)) {
                                                                                        echo $mail;
                                                                                    } ?>" placeholder="e-mail">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmation de votre e-mail</label>
                        <input class="form-control" type="email" name="mail2" value="<?php if (isset($mail2)) {
                                                                                            echo $mail2;
                                                                                        } ?>" placeholder="e-mail">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input class="form-control" type="password" name="password" value="" placeholder="Mot de passe">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmation de votre mot de passe</label>
                        <input class="form-control" type="password" name="password2" value="" placeholder="Mot de passe">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="forminscription" class="btn btn-primary">Inscription</button>
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

</html>