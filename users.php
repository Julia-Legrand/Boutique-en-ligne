<?php
$pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $pdo->prepare("SELECT * FROM users");
$req->execute();

$users = $req->fetchAll(PDO::FETCH_ASSOC);

?>

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="Resources/CSS/style.css">
</head>

<body class="bodyAdmin">

    <header>
        <a class="brand" href="index.php">Mad Santiags</a>
    </header>

    <main class="mainUsers">
        <h2>Créer un compte</h2>

        <div class="mainBloc">
            <form action="newUserForm.php" method="POST">
                <div class="bloc">
                    <input type="text" class="input" name="firstName" placeholder="Prénom">
                    <input type="text" class="input" name="lastName" placeholder="Nom">
                </div>
                <div class="bloc">
                    <input type="text" class="input" name="mail" placeholder="Email">
                </div>
                <div class="bloc2">
                    <div class="bloc3">
                        <label for="password">Choisis un mot de passe avec :</label>
                        <ul>
                            <li>Au moins 8 caractères</li>
                            <li>Au moins une majuscule</li>
                            <li>Au moins une minuscule</li>
                            <li>Au moins un symbole</li>
                            <li>Au moins un chiffre</li>
                        </ul>
                    </div>
                    <input type="password" class="input" name="password" placeholder="Mot de passe">
                </div>
        </div>
        <div class="actions">
            <input type="submit" class="submit" value="Créer">
            <a href="login.php" class="submit">Retour</a>
        </div>
        </form>

        <h2>Utilisateurs actifs</h2>
        <table>
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Email</th>
                </tr>
            </thead>

            <?php foreach ($users as $key => $value) { ?>
                <tbody>
                    <tr>
                        <td data-label="PRÉNOM :"><?= $value['firstName'] ?></td>
                        <td data-label="NOM :"><?= $value['lastName'] ?></td>
                        <td data-label="EMAIL :"><?= $value['mail'] ?></td>
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