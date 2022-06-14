<?php
require_once 'assets/includes/bdd.php';
if(isset($_POST['addimage'])){

    $dataImage = [
       'img_lien' => 'assets/img/' . $_FILES['image']['name'],
       'img_file' => $_FILES['image']['tmp_name']
    ];

   $data = [
       'titre' => htmlspecialchars($_POST['titre']),
        'img_lien' => $_FILES['image']['name']
   ];

  move_uploaded_file($dataImage['img_file'], $dataImage['img_lien']);

$addimage = $Bdd->prepare("INSERT INTO image (titre, lien) VALUES (:titre, :img_lien)");
$addimage->execute($data);
}

$getimage = $Bdd->prepare("SELECT * FROM image");
$getimage->execute();

$images = $getimage->fetchall(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/uploadimg.css">
    <title>Image</title>
</head>

<body>
    <div class="container">
        <div class="addimages">
            <h1>Ajouter une image</h1>
            <div class="addimages_form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="">
                        <label for="titre">Nom de la photo</label>
                        <input type="text" name="titre" id="titre">
                    </div>
                    <div class="">
                        <label for="photo">Choisir une photo</label>
                        <input type="file" accept="image/jpeg, image/png" name="image">
                    </div>
                    <button type="submit" name="addimage">Envoyer la photo</button>
                </form>
            </div>
        </div>
        <div class="showimage">
            <?php foreach($images as $image) { ?>
                <div class="photo">
                    <div class="photo_image">
                        <img src = "assets/img/<?php echo $image['lien']; ?>">
                    </div>
                </div>

            <?php
            }        
            
            ?>
        </div>
    </div>

</body>

</html>