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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique de santiags</title>

    <!--ICONS-->
    <script src="https://kit.fontawesome.com/d977b1f38d.js" crossorigin="anonymous"></script>

    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caprasimo&family=Montserrat:wght@300&family=Over+the+Rainbow&display=swap" rel="stylesheet">

    <!--STYLES-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/CSS/style.css">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="navSearch">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Trouve ton produit" aria-label="Search">
                    <button class="navSubmit" type="submit" style="margin-left:5px;"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>

            <div class="navBrand">
                <a class="navbar-brand" href="index.php" style="color: #4F376D;">Mad Santiags</a>
            </div>

            <div class="navIcones">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="users.php" style="color: #4F376D;"><i class="fa-regular fa-user"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="admin.php" style="color: #4F376D;"><i class="fa-solid fa-bag-shopping"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logout.php" style="color: #4F376D;"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="home-title">
            <h1>Mad Santiags</h1>
        </div>
    </header>

    <main>

        <section class="shoeCategories">

            <?php
            foreach ($categories as $key => $value1) {
            ?>
                <h4><?= $value1['type']; ?></h4>

                <?php
                foreach ($products as $key => $value2) {
                    if ($value1['idCategory'] == $value2['idCategory']) { ?>

                        <div class="card" style="width: 18rem;">
                            <img src="uploads/<?= $value2['image'] ?>" class="card-img-top" alt="photo du produit">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value2['name']; ?></h5>
                                <p class="card-reference">Réf. <?= $value2['reference']; ?></p>
                                <p class="card-price"><?= $value2['price']; ?> €</p>
                            </div>
                        </div>
            <?php
                    }
                }
            }
            ?>
        </section>

    </main>

    <footer>
        <div class="blocLeft">
            <a class="navbar-brand" href="index.php" style="color: #4F376D;">Mad Santiags</a>
            <div class="socials">
                <a href="https://github.com/Julia-Legrand/Evaluation-TP-PHP.git" style="color: #4F376D;"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.instagram.com" style="color: #4F376D;"><i class="fa-brands fa-instagram"></i></a>
                <a href="https://www.linkedin.com" style="color: #4F376D;"><i class="fa-brands fa-linkedin"></i></a>
            </div>
        </div>
        <div class="blocRight">
            <a href="/">Mentions légales</a>
            <a href="/">CGDV</a>
            <a href="/">Politique de confidentialité</a>
        </div>
    </footer>

    <!--SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>