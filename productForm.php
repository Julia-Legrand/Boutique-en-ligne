<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestion des utilisateurs</title>

  <!--FONTS-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Montserrat:wght@300&family=Over+the+Rainbow&display=swap" rel="stylesheet">

  <!--STYLES-->
  <link rel="stylesheet" href="Resources/CSS/style.css">
</head>

<body class="bodyAdmin" style="height:100vh;">

  <?php
  $pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if ($_POST) {
    $name = htmlspecialchars($_POST['name']);
    $idCategory = (int)$_POST['idCategory'];
    $reference = htmlspecialchars($_POST['reference']);
    $price = (float)$_POST['price'];
    $image = $_FILES['image']['name'];

    if (!empty($name) && !empty($idCategory) && !empty($reference) && !empty($price) && !empty($image)) {

      $req = $pdo->prepare("INSERT INTO products(name, idCategory, reference, price, image)
                            VALUES(:name, :idCategory, :reference, :price, :image)");

      $req->execute(array(
        ':name' => $name,
        'idCategory' => $idCategory,
        'reference' => $reference,
        'price' => $price,
        'image' => $image
      ));

      //----------------SYSTEME D'UPLOAD D'IMAGES----------------------/
      $target_dir = "uploads/";
      $target_file = $target_dir . basename($_FILES["image"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // On vérifie si le fichier image est une image réelle ou une fausse image if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }

      // On vérifie si le fichier existe déjà
      if (file_exists($target_file)) {
        echo "Désolé, ce fichier existe déjà.";
        $uploadOk = 0;
      }

      // On vérifie la taille de l'image
      if ($_FILES["image"]["size"] > 500000) {
        echo "Désolé, ce fichier dépasse la limite de taille autorisée.";
        $uploadOk = 0;
      }

      // On vérifie le type de fichier
      if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Désolé, seuls les fichiers de type JPG, JPEG, PNG & GIF sont autorisés.";
        $uploadOk = 0;
      }

      // On vérifie si $uploadOk est à 0 à cause d'une erreur
      if ($uploadOk == 0) {
        echo "Désolé, votre fichier n'a pas été uploader";

        // Si tout est ok on essaye d'uploader le fichier
      } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
          echo "Le fichier " . basename($_FILES["image"]["name"]) . " a bien été importé.";
        } else {
          echo "Désolé, il y a eu une erreur lors de l'importation.";
        }
      }

      //---------------------FIN SYSTEME D'UPLOAD D'IMAGES------------------------------/

      header('location:admin.php');
      exit();
    } else {
      // Les champs sont vides, affichez un message d'erreur
      echo '<div style="margin:50px; display:flex; flex-direction:column; align-items:center;">
                    <p style="color:white; text-align:center; font-size:40px;">Tous les champs doivent être remplis</p>
                    <a href="admin.php" class="submit">Retour</a>
                    </div>';
    }
  }

  ?>

</body>

</html>