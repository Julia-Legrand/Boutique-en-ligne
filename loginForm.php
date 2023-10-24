<?php

$pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

$mail = $_POST['mail'];

// Récupération de l'utilisateur et de son password hashé
$req = $pdo->prepare("SELECT * FROM users WHERE mail = :mail");

$req->execute(array(
    'mail' => $mail
));

$resultat = $req->fetch();

if ($resultat) {
    // Comparaison du password envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

    if ($isPasswordCorrect) {
        session_start();

        $_SESSION['idUser'] = $resultat['idUser'];
        $_SESSION['mail'] = $mail;
        header("location:index.php");
    } else {
        echo '<p>Mauvais email ou mot de passe</p><a href="login.php">Retour</a>';
    }
} else {
    echo '<p>Utilisateur non trouvé</p><a href="login.php">Retour</a>';
}

?>