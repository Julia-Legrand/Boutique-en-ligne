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
$password_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insertion dans la table
$req = $pdo->prepare("INSERT INTO users(firstName, lastName, mail, password)
                        VALUES(:firstName, :lastName, :mail, :password)");

$req->execute(array(
        ':firstName' => $firstName,
        ':lastName' => $lastName,
        ':mail' => $mail,
        ':password' => $password_hache       
));
}

} catch (PDOException $e) {
echo "Erreur : " . $e->getMessage(); }

header('location:users.php');

?>