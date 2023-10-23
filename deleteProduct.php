<?php

$idProduct = $_GET['idProduct'];

$pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$req = $pdo->prepare("DELETE FROM products
                        WHERE idProduct = $idProduct");

$req->execute();

header('location:admin.php');

?>