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
    echo "ok";
}
else{
    var_dump($errors);
}