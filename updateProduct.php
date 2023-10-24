<?php

$idProduct = $_GET['idProduct'];

$pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*** Affichage des catégories ***/
$req1 = $pdo->prepare("SELECT * FROM categories");
$req1->execute();

$categories = $req1->fetchAll(PDO::FETCH_ASSOC);

/*** Affichage du produit sélectionné et de sa catégorie ***/
$req = $pdo->prepare("SELECT * FROM products 
                     INNER JOIN categories ON products.idCategory = categories.idCategory 
                     WHERE products.idProduct = $idProduct");

$req->execute();

$products = $req->fetch(PDO::FETCH_ASSOC);

if ($_POST) {
    $name = htmlspecialchars($_POST['name']);
    $idCategory = (int)$_POST['idCategory'];
    $reference = htmlspecialchars($_POST['reference']);
    $price = (float)$_POST['price'];

    $req2 = $pdo->prepare("UPDATE products
                        SET name = :name,
                            idCategory = :idCategory,
                            reference = :reference,
                            price = :price
                        WHERE idProduct = $idProduct");

    $req2->execute(array(
        ':name' => $name,
        ':idCategory' => $idCategory,
        ':reference' => $reference,
        ':price' => $price
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Nothing+You+Could+Do&display=swap" rel="stylesheet">

    <!--STYLES-->
    <link rel="stylesheet" href="Resources/CSS/style.css">
</head>

<body style="height: 100vh;" class="body3">

    <header>
        <a class="brand" href="index.php">Mad Santiags</a>
    </header>

    <main class="main2">
        <h3>Quelle information souhaitez-vous mettre à jour ?</h3>

        <form action="updateProduct.php?idProduct=<?= $idProduct ?>" method="POST">
            <label for="name">Nom :</label>
            <input type="text" name="name" value="<?= $products['name'] ?>">

            <label for="category">Catégorie :</label>
            <select name="idCategory">
                <option disabled>--Choisissez une catégorie--</option>
                <?php
                foreach ($categories as $key => $value) { ?>
                    <option value="<?= $value['idCategory'] ?>"><?= $value['type'] ?></option>
                <?php
                }
                ?>
            </select>

            <label for="reference">Référence :</label>
            <input type="text" name="reference" value="<?= $products['reference'] ?>">

            <label for="price">Prix :</label>
            <input type="number" name="price" value="<?= $products['price'] ?>">

            <div class="actions">
                <input type="submit" value="Valider">
                <a href="admin.php">Annuler</a>
            </div>
        </form>
    </main>

</body>

</html>