<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h1>Inscription</h1>
                <form method="post" action="traitement_inscription.php">
                    <div class="mb-3">
                        <label class="form-label">Pseudo</label>
                        <input class="form-control" type="text" name="pseudo" value="" placeholder="Pseudo">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input class="form-control" type="email" name="e-mail" value="" placeholder="E-mail">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mot de passe</label>
                        <input class="form-control" type="password" name="password" value="" placeholder="Mot de passe">
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="forminscription" class="btn btn-primary">Inscription</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>