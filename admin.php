<?php

$pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/*** Affichage des catégories ***/
$req1 = $pdo->prepare("SELECT * FROM categories");
$req1->execute();

$categories = $req1->fetchAll(PDO::FETCH_ASSOC);

/*** Affichage des produits et de leur catégorie ***/
$req2 = $pdo->prepare("SELECT * FROM products INNER JOIN categories ON products.idCategory = categories.idCategory");

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

    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Montserrat:wght@300&family=Over+the+Rainbow&display=swap" rel="stylesheet">

    <!--STYLES-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/CSS/style.css">
</head>

<body class="bodyAdmin">

    <header>
        <a class="brand" href="index.php">Mad Santiags</a>
    </header>

    <main class="mainAdmin">

        <div class="addItems">
            <div class="categoriesForm">
                <h2>Ajouter une catégorie</h2>
                <form action="categoryForm.php" method="POST">
                    <div class="bloc">
                        <label for="type">Type de catégorie :</label>
                        <input type="text" class="input" name="type">
                    </div>
                    <input type="submit" class="submit" value="Créer une nouvelle categorie">
                </form>
                <h3 style="margin-top:50px;">Catégories existantes</h3>
                <table>
                    <?php
                    foreach ($categories as $key => $value) { ?>
                        <tr>
                            <td style="width:150px;"><?= $value['type'] ?></td>
                            <td style="width:150px;"><a href="deleteCategory.php?idCategory=<?= $value['idCategory'] ?>" class="adminSubmit">Supprimer</a></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>

            <div class="productsForm">
                <h2>Ajouter un produit</h2>
                <form action="productForm.php" method="POST" enctype="multipart/form-data">
                    <div class="mainBloc">
                        <div class="bloc">
                            <label for="name">Nom :</label>
                            <input type="text" class="input" name="name">
                        </div>
                        <div class="bloc">
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
                        </div>
                        <div class="bloc">
                            <label for="reference">Référence :</label>
                            <input type="text" class="input" name="reference">
                        </div>
                        <div class="bloc">
                            <label for="price">Prix :</label>
                            <input type="number" class="input" name="price">
                        </div>
                        <div class="bloc">
                            <label for="image">Photo :</label>
                            <input type="file" class="input" name="image" class="submit">
                        </div>
                    </div>
                    <input type="submit" class="submit" value="Ajouter un nouveau produit">
                </form>
            </div>
        </div>

        <div class="productsInStock">
            <h2>Produits en stock</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Référence</th>
                        <th>Prix</th>
                        <th>Photo</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <?php foreach ($products as $key => $value) { ?>
                    <tbody>
                        <tr>
                            <td data-label="NOM :"><?= $value['name'] ?></td>
                            <td data-label="CATÉGORIE :"><?= $value['type'] ?></td>
                            <td data-label="RÉF. :"><?= $value['reference'] ?></td>
                            <td data-label="PRIX :"><?= $value['price'] ?></td>
                            <td data-label="PHOTO :"><img src="uploads/<?= $value['image'] ?>" width=auto height=80 alt="photo du produit"></td>
                            <td data-label="ACTIONS :"><a href="deleteProduct.php?idProduct=<?= $value['idProduct'] ?>" class="submit">Supprimer</a>
                                <a href="updateProduct.php?idProduct=<?= $value['idProduct'] ?>" class="submit">Modifier</a>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
    </main>

    <!--SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>