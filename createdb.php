<?php

//Création de la base de données
    $pdo = new PDO('mysql:host=localhost;port=3306','root','root');
    $sql = "CREATE DATABASE IF NOT EXISTS `boutique` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci";
    $pdo->exec($sql);

try {
    $pdo = new PDO('mysql:host=localhost;dbname=boutique;port=3306','root','root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
//Création de la table utilisateurs
    $req1 = "CREATE TABLE IF NOT EXISTS `boutique`.`users`(
        `idUser`     INT  Auto_increment NOT NULL,
        `firstName`  VARCHAR (50) NOT NULL,
        `lastName`   VARCHAR (50) NOT NULL,
        `mail`       VARCHAR (50) NOT NULL,
        `password`   VARCHAR (50) NOT NULL,
        PRIMARY KEY (`idUser`));";
    
    $pdo->exec($req1);

//Création de la table produits
    $req2 = "CREATE TABLE IF NOT EXISTS `boutique`.`products`(
        `idProduct`  INT  Auto_increment NOT NULL,
        `idCategory` INT NOT NULL,
        `name`       VARCHAR (50) NOT NULL,
        `reference`  VARCHAR (10) NOT NULL,
        `price`      FLOAT NOT NULL,
        `image`      VARCHAR (50) NOT NULL,
        PRIMARY KEY (`idProduct`));";

    $pdo->exec($req2);

//Création de la table catégories
    $req3 = "CREATE TABLE IF NOT EXISTS `boutique`.`categories`(
        `idCategory` INT  Auto_increment NOT NULL,
        `type`       VARCHAR (50) NOT NULL,
	    PRIMARY KEY (`idCategory`));";

    $pdo->exec($req3);
}

catch (PDOException $e){
print "Erreur !: " . $e->getMessage() . "<br/>"; die();
}

?>