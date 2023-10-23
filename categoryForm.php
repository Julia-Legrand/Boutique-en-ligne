<?php
$pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306','root','root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ($_POST) {
    $type = $_POST['type'];

if ($type != "") {
    $req = $pdo->prepare("INSERT INTO categories(type) VALUES (:type)");

    $req->execute(array(
        ':type' => $type));
}
}

header('location:admin.php');

?>