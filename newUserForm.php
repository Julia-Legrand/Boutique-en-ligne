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

    try {
        $pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($_POST) {
            $firstName = htmlspecialchars($_POST['firstName']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $mail = htmlspecialchars($_POST['mail']);
            $password = $_POST['password'];

            // Hachage du mot de passe
            $password_hache = password_hash($password, PASSWORD_DEFAULT);

            // Vérification si les champs ne sont pas vides
            if (!empty($firstName) && !empty($lastName) && !empty($mail)) {
                // Insertion dans la table
                $req = $pdo->prepare("INSERT INTO users (firstName, lastName, mail, password) VALUES (:firstName, :lastName, :mail, :password)");

                $req->execute(array(
                    ':firstName' => $firstName,
                    ':lastName' => $lastName,
                    ':mail' => $mail,
                    ':password' => $password_hache
                ));

                // Redirection après l'insertion
                header('Location: users.php');
                exit();
            } else {
                // Les champs sont vides, affichez un message d'erreur
                echo '<div style="margin:50px; display:flex; flex-direction:column; align-items:center;">
                    <p style="color:white; text-align:center; font-size:40px;">Tous les champs doivent être remplis</p>
                    <a href="users.php" class="submit">Retour</a>
                    </div>';
            }
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    ?>
</body>

</html>