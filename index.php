<?php

session_start();

if (isset($_SESSION['mail'])) {
} else {
    header('location:login.php');
}

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
                <a class="navbar-brand" href="index.php"><img src="../Evaluation-TP-PHP/resources/images/logo.png" style="color: #4F376D; width:50px; height:50px;" alt="logo"></a>
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
            <h2><a href="shop.php" style="color:white; font-size:50px; text-shadow:#f0d3e9 1px 0 30px; text-decoration:none;">Let's go !</a></h2>
        </div>
    </header>

    <main>

        <!--CATEGORIES-->

        <section class="categoriesIndex" id="categoriesIndex">
            <h2>Catégories</h2>

            <div class="shoeCategories">
                <div class="boots">
                    <a href="shop.php" class="submit" style="font-size: 30px; margin-top:40px;">Bottes</a>
                </div>
                <div class="ankleBoots">
                    <a href="shop.php" class="submit" style="font-size: 30px; margin-top:40px;">Bottines</a>
                </div>
            </div>
        </section>

        <!--OUR STORY-->

        <section class="ourStory" id="ourStory">
            <h2>Notre histoire</h2>

            <div class="story">
                <div class="storyText">
                    <p>Bienvenue dans le monde de Mad Santiags, une marque de bottes pour femmes pétillantes et pleines de folie !</p>
                    <p>La créatrice, Robbie, a trouvé son inspiration lors de ses nombreux voyages aux Etats Unis, le pays de la santiag. Elle a une vraie sensibilité pour les pièces aux designs colorés et originaux.</p>
                    <p>Chez Mad Santiag, nous sélectionnons des pépites pour les femmes qui aiment se démarquer. Nous croyons que la mode devrait être amusante et expressive, et nos bottes et bottines sont choisies pour célébrer l’individualité.</p>
                    <p>Nous voulons que nos santiags soient aussi uniques que les femmes qui les portent, et nous sommes fières de proposer des pièces qui permettent à chacune de s’exprimer librement.</p>
                </div>
                <div class="storyPhoto"></div>
            </div>
        </section>

        <!--GUESTS COMMENTS-->

        <section class="comments" id="comments">
            <h2>Elles adorent !</h2>
            <div class="commentsLine">
                <div class="guest">
                    <div class="picture1"></div>
                    <div class="commentTitle">
                        <div class="nameGuest">
                            <p style="margin-left:5px; margin-bottom:0px;">Emilie du Châtelet</p>
                            <img src="../Evaluation-TP-PHP/resources/images/5stars.gif" style="height:40px; width: 120px;" alt="cinq étoiles">
                        </div>
                        <q>J'adore cette marque !</q>
                    </div>
                </div>

                <div class="guest">
                    <div class="picture2"></div>
                    <div class="commentTitle">
                        <div class="nameGuest">
                            <p style="margin-left:5px; margin-bottom:0px;">Katie Wild</p>
                            <img src="../Evaluation-TP-PHP/resources/images/5stars.gif" style="height:40px; width: 120px;" alt="cinq étoiles">
                        </div>
                        <q>I simply love them all!</q>
                    </div>
                </div>

                <div class="guest">
                    <div class="picture3"></div>
                    <div class="commentTitle">
                        <div class="nameGuest">
                            <p style="margin-left:5px; margin-bottom:0px;">Victoria Robinson</p>
                            <img src="../Evaluation-TP-PHP/resources/images/5stars.gif" style="height:40px; width: 120px;" alt="cinq étoiles">
                        </div>
                        <q>Best brand ever!</q>
                    </div>
                </div>
            </div>
        </section>

        <!--SERVICES-->

        <section class="services" id="services">
            <div class="guestService">
                <i class="fa-solid fa-truck-fast"></i>
                <h3>Livraison rapide</h3>
            </div>

            <div class="guestService">
                <i class="fa-regular fa-comment-dots"></i>
                <h3>Service client</h3>
            </div>

            <div class="guestService">
                <i class="fa-regular fa-credit-card"></i>
                <h3>Paiement sécurisé</h3>
            </div>
        </section>

        <!--NEWSLETTER-->

        <section class="newsletter" id="newsletter">
            <h2>Inscris-toi à la newsletter pour recevoir des réductions</h2>
            <form class="newsletterForm">
                <input type="mail" class="input" placeholder="Email">
                <input type="submit" class="submit" value="S'inscrire">
            </form>
        </section>

    </main>

    <footer>
        <div class="blocLeft">
            <a class="brand" href="index.php" style="color: #4F376D;">Mad Santiags</a>
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