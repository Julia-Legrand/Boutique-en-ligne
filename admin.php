<?php
$pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*** Affichage des catégories ***/
$req1 = $pdo->prepare("SELECT * FROM categories");
$req1->execute();

$categories = $req1->fetchAll(PDO::FETCH_ASSOC);

/*** Affichage des produits ***/
$req2 = $pdo->prepare("SELECT * FROM products");
$req2->execute();

$products = $req2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des produits</title>

    <!--ICONS-->
    <script src="https://kit.fontawesome.com/d977b1f38d.js" crossorigin="anonymous"></script>

    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Montserrat:wght@400;700&display=swap" rel="stylesheet">

    <!--STYLES-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/CSS/style.css">
</head>

<body>
    <h1>Gestion des produits</h1>

    <div class="categories">
        <h2>Ajouter une catégorie</h2>
        <form action="categoryForm.php" method="POST">
            <label for="type">Type de catégorie :</label>
            <input type="text" name="type">
            <input type="submit" value="Créer une nouvelle categorie">
        </form>
        <h3>Catégories existantes</h3>
        <ul>
            <?php
                foreach ($categories as $key => $value) { ?>
                    <li><?= $value['type'] ?><a href="deleteCategory.php?idCategory=<?= $value['idCategory'] ?>"> Supprimer</a><li>
            <?php
            }
            ?>
        </ul>
    </div>

    <div class="productsForm">
        <h2>Ajouter un produit</h2>
        <form action="productForm.php" method="POST" enctype="multipart/form-data">
            <label for="name">Nom :</label>
            <input type="text" name="name">
            <label for="category">Catégorie :</label>
                <select name="idCategory">
                    <option disabled>--Choisissez une catégorie--</option>
                    <?php
                    foreach ($categories as $key => $value) { ?>
                    <option value="<?= $value['idCategory']?>"><?= $value['type']?></option>
                    <?php
                    }
                    ?>
                </select>
            <label for="reference">Référence :</label>
            <input type="text" name="reference">
            <label for="price">Prix :</label>
            <input type="number" name="price">
            <label for="image">Photo :</label>
            <input type="file" name="image">

            <input type="submit" value="Ajouter un nouveau produit">
        </form>
    </div>

    <div class="productsInStock">
        <h3>Produits en stock</h3>
        <table>
            <th>Identification</th>
            <th>Nom</th>
            <th>Catégorie</th>
            <th>Référence</th>
            <th>Prix</th>
            <th>Photo</th>
            
            <?php foreach ($products as $key => $value) { ?>
                <tr>
                    <td><?= $value['idProduct'] ?></td>
                    <td><?= $value['name'] ?></td>
                    <td><?= $value['idCategory']?><?= $value['type'] ?></td>
                    <td><?= $value['reference'] ?></td>
                    <td><?= $value['price'] ?></td>
                    <td><img src="uploads/<?= $value['image'] ?>" width=auto height=80 alt="photo du produit"></td>
                    <td><a href="deleteProduct.php?idProduct=<?= $value['idProduct'] ?>">Supprimer</a>
                        <a href="updateProduct.php?idProduct=<?= $value['idProduct'] ?>">Modifier</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>

</html>