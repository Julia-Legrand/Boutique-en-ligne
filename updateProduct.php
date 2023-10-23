<?php

$idProduct = $_GET['idProduct'];

$pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $pdo->prepare("SELECT * FROM products WHERE idProduct = $idProduct");
$req->execute();

$products = $req->fetch(PDO::FETCH_ASSOC);

if ($_POST) {
    $name = $_POST['name']; 
    $idCategory = $_POST['idCategory'];
    $reference = $_POST['reference'];
    $price = $_POST['price'];
    $image = $_FILE['image']['name'];

    $req2 = $pdo->prepare("UPDATE products
                        SET name = :name,
                            idCategory = :idCategory,
                            reference = :reference,
                            price = :price,
                            image = :image
                        WHERE idProduct = $idProduct");

    $req2->execute(array(
        ':name' => $name,
        ':idCategory' => $idCategory,
        ':reference' => $reference,
        ':price' => $price,
        ':image' => $image,
    ));

header('location:admin.php');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un produit</title>

    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <!--STYLES-->
    <link rel="stylesheet" href="Resources/CSS/style.css">
</head>

<body>

    <h3>Quelle information souhaitez-vous mettre à jour ?</h3>

        <form action="updateProduct.php?idProduct=<?= $idProduct ?>" method="POST" enctype="multipart/form-data">
            <label for="name">Nom :</label>
            <input type="text" name="name" value="<?= $products['name']?>">

            <label for="idCategory">Catégorie :</label>
            <input type="text" name="idCategory" value="<?= $value['idCategory']?>"><?= $value['type']?>">

            <label for="reference">Référence :</label>
            <input type="text" name="reference" value="<?= $products['reference']?>">
   
            <label for="price">Prix :</label>
            <input type="number" name="price" value="<?= $products['price']?>">
   
            <div class="actions">
                <input type="submit" value="Valider">
                <a href="admin.php">Annuler</a>
            </div>
        </form>

</body>

</html>