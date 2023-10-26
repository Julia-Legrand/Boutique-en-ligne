<?php
session_start();
include_once("fonctions-panier.php");

$erreur = false;

$action = (isset($_POST['action']) ? $_POST['action'] : (isset($_GET['action']) ? $_GET['action'] : null));
if ($action !== null) {
    if (!in_array($action, array('ajout', 'suppression', 'refresh')))
        $erreur = true;

    //récuperation des variables en POST ou GET
    $n = (isset($_POST['n']) ? $_POST['n'] : (isset($_GET['n']) ? $_GET['n'] : null));
    $p = (isset($_POST['p']) ? $_POST['p'] : (isset($_GET['p']) ? $_GET['p'] : null));
    $q = (isset($_POST['q']) ? $_POST['q'] : (isset($_GET['q']) ? $_GET['q'] : null));

    //Suppression des espaces verticaux
    if ($n !== null) {
        $n = preg_replace('#\v#', '', $n);
    }

    //On vérifie que $p soit un float
    $p = floatval($p);

    //On traite $q qui peut être un entier simple ou un tableau d'entiers
    if (is_array($q)) {
        $QteArticle = array();
        $i = 0;
        foreach ($q as $contenu) {
            $QteArticle[$i++] = intval($contenu);
        }
    } else
        $q = intval($q);
}

if (!$erreur) {
    switch ($action) {
        case "ajout":
            ajouterArticle($n, $q, $p);
            break;

        case "suppression":
            supprimerArticle($n);
            break;

        case "refresh":
            foreach ($_POST['q'] as $name => $quantity) {
                modifierQTeArticle($name, $quantity);
            }
            break;

        default:
            break;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>

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

<body class="bodyBasket">

    <header>
        <a class="brand" href="index.php">Mad Santiags</a>
    </header>

    <section class="basket" id="basket">

        <h4 style="color:white; font-size:50px; text-shadow:#f0d3e9 1px 0 30px; text-decoration:none;">Votre panier</h4>
        <form action="panier.php" method="POST">
            <table class="basketTable">
                <thead>
                    <tr>
                        <th>Article</th>
                        <th>Quantité</th>
                        <th>Prix Unitaire</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                if (creationPanier()) {
                    $nbArticles = count($_SESSION['panier']['name']);
                    if ($nbArticles <= 0) { ?>
                        <tr><td colspan="4"><?= "Votre panier est vide" ?></td></tr>
                    <?php
                    }
                    else {
                        for ($i = 0; $i < $nbArticles; $i++) { ?>
                            <tr>
                                <td data-label="ARTICLE :"><?= htmlspecialchars($_SESSION['panier']['name'][$i]) ?></td>
                                <td data-label="QUANTITÉ :"><input type='text' size='4' name='q[$i]' value=<?= htmlspecialchars($_SESSION['panier']['quantity'][$i]) ?> /></td>
                                <td data-label="PRIX UNITAIRE :"><?= htmlspecialchars($_SESSION['panier']['price'][$i]) ?> €</td>
                                <td><a href="panier.php?action=suppression&n=<?= rawurlencode($_SESSION['panier']['name'][$i]) ?>" class="adminSubmit" style="color: white;"><i class="fa-regular fa-trash-can"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                            <tr>
                                <td colspan='2'></td>
                                <td colspan='2'><?= "Total : " . MontantGlobal() ?></td>
                            </tr>
                            <tr>
                                <td colspan='4'>
                                    <input type="submit" class="submit" value="Rafraîchir"/>
                                    <input type="hidden" name="action" value="refresh"/>
                                </td>
                            </tr>
                        </tbody>
                    <?php
                    }
                }
                    ?>
            </table>
        </form>
        <a href="shop.php" class="submit">Annuler</a>
    </section>

    <!--SCRIPT-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>