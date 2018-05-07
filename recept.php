<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 07/05/2018
 * Time: 09:22
 */
$errors=[];
if(isset($_POST["submitted"])){
    if(empty($_POST["prenom"])){
        array_push($errors, "Vous devez entrer un prénom");
    }

    if(empty($_POST["nom"])){
        array_push($errors, "Vous devez entrer un nom");
    }

    if(empty($_POST["mail"])) {
        array_push($errors, "Vous devez entrer un mail");
    }

    if(empty($_POST["password"])){
        array_push($errors, "Vous devez entrer un mdp");
    }
}
else{
    array_push($errors, "Vous devez envoyer l'inscription");
}

if(count($errors) === 0){
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=tryeval', "root", "", array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
        ));
    }
    catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
   $sql = "INSERT INTO users(Nom, Prenom, mail, password) VALUES ('$_POST[nom]', '$_POST[prenom]', '$_POST[mail]', '$_POST[password]')";
   $query=$pdo->prepare($sql);
   $query->execute();
}
else{
    var_dump($errors);
}