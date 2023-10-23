<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique en ligne</title>

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

    <header>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Trouver votre produit" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>

                <a class="navbar-brand">Mad Santiags</a>

                <div class="menu-bloc-right">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#myMenu" aria-controls="myMenu" aria-expanded="false" aria-label="Menu for mobile">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="myMenu">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link" href="login.php"><i class="fa-regular fa-user"></i></a>
                            <a class="nav-item nav-link" href="shop.php"><i class="fa-regular fa-star"></i></a>
                            <a class="nav-item nav-link" href="/"><i class="fa-solid fa-basket-shopping"></a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div class="home-title">
            <h1>Mad Santiag</h1>
            <h2><a href="shop.php">Let's go !</a></h2>
        </div>
    </header>

<main>

    <!--CATEGORIES-->

    <section class="categories" id="categories">
        <h2>Catégories</h2>
        
        <div class="shoeCategories">
            <div class="boots">
                <a href="shop.php">Bottes</a>
            </div>
            <div class="ankleBoots">
                <a href="shop.php">Bottines</a>
            </div>
        </div>
    </section>

    <!--OUR STORY-->

    <section class="ourStory" id="ourStory">
        <h2>Notre histoire</h2>
        
        <div class="story">
            <div class="storyText">
                <p>Bienvenue dans le monde de Mad Santiags, une marque de bottes pour femmes pétillante et pleine de folie !</p>
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
                        <p>Victoria Robinson</p>
                        <img src="../Evaluation-TP-PHP/resources/images/clients/client1.png"
                    </div>
                    <div class="commentText">
                        <p>I simply love them all!</p>
                    </div>
                </div>
            </div>

            <div class="guest">
                <div class="picture2"></div>
                <div class="commentTitle">
                    <div class="nameGuest">
                        <p>Emilie du Châtelet</p>
                        <img src="../Evaluation-TP-PHP/resources/images/clients/client2.png"
                    </div>
                    <div class="commentText">
                        <p>J'adore cette marque !</p>
                    </div>
                </div>
            </div>

            <div class="guest">
                <div class="picture3"></div>
                <div class="commentTitle">
                    <div class="nameGuest">
                        <p>Katy Wild</p>
                        <img src="../Evaluation-TP-PHP/resources/images/clients/client3.png"
                    </div>
                    <div class="commentText">
                        <p>Best boots ever!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--ADVANTAGES-->

    <section class="advantages" id="advantages">
        <div class="shipping">
            <i class="fa-solid fa-truck-fast"></i>
            <h3>Livraison rapide</h3>
        </div>

        <div class="guestService">
            <i class="fa-regular fa-comment-dots"></i>
            <h3>Service client</h3>
        </div>

        <div class="payment">
            <i class="fa-regular fa-credit-card"></i>
            <h3>Paiement sécurisé</h3>
        </div>

        <div class="quality">
            <i class="fa-light fa-certificate"></i>
            <h3>Qualité certifiée</h3>
        </div>
    </section>

    <!--NEWSLETTER-->

    <section class="newsletter" id="newsletter">
        <h2>Inscrivez-vous à la newsletter pour recevoir des réductions</h2>
        <form class="newsletterForm">
            <input type="mail" placeholder="Email">
            <input type="submit" value="S'inscrire">
        </form>
    </section>

</main>

<footer>
    <div class="blocLeft">
        <a class="navbar-brand">Mad Santiags</a>
        <div class="socials">
            <a href="https://github.com/Julia-Legrand/Evaluation-maquette-Central-Perk.git"><i class="fa-brands fa-github"></i></a>
            <a href="https://www.instagram.com"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.linkedin.com"><i class="fa-brands fa-linkedin"></i></a>
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