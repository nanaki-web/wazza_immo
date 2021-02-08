<?php
require 'connexion_bdd.php';
$db = connexionBase();
include ('entete.php');
require_once("function.php");


if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST))
{
    //on initialise nos messages d'erreurs;
    $errors = [];
    $nom =htmlentities(trim($_POST['nom']));
    $prenom =htmlentities(trim($_POST['prenom']));
    $adresse =htmlentities(trim($_POST['adresse']));
    $ville = htmlentities(trim($_POST['ville']));
    $codePostal = htmlentities(trim($_POST['codePostal']));
    $telephone = htmlentities(trim($_POST['telephone']));
    $email = htmlentities(trim($_POST['email']));
    $metier= htmlentities(trim($_POST['metier']));
    $commentaire = htmlentities(trim($_POST['commentaire']));

    // on vérifie nos champs 
    //On crée notre message d’erreur
    $valid = true ;
    if(empty($nom))
    {
        $errors['nom'] = "Veuillez saisir le nom";
        $valid = false;
    }
    else if (!preg_match("/^[a-zA-Z ]*$/",$nom))
    {
        $errors['nom'] = "Seulement des lettres et des espaces autorisé";
    }


    if(empty($prenom))
    {
        $errors['prenom'] = "Veuillez saisir le prénom";
        $valid = false;
    }
    else if (!preg_match("/^[a-zA-Z ]*$/",$prenom))
    {
        $errors['prenom'] = "Seulement des lettres et des espaces autorisé";
    }

    if (empty($adresse)) 
    { 
        $errors['adresse'] = "s'il vous plait ,entrer l'adresse"; 
        $valid = false; 
    }
    else if (!preg_match("/^[a-zA-Z 0-9']*$/",$adresse)) 
    { 
        $errors['adresse'] = "Seulement des lettres, des chiffres et des espaces autorisé"; 
    }

    if (empty($codePostal)) 
    { 
        $errors['codePostal'] = "s'il vous plait ,entrer le code postale"; 
        $valid = false; 
    }
    else if (!preg_match("/^[0-9]{5}$/",$codePostal)) 
    { 
        $errors['codePostal'] = "Seulement 5 chiffres uniquement"; 
    }

    if (empty($ville)) 
    { 
        $errors['ville']= "s'il vous plait ,entrer la ville"; 
        $valid = false; 
    }
    else if (!preg_match("/^[a-zA-Z ]*$/",$ville)) 
    { 
        $errors['ville'] = "Seulement des lettres, des espaces autorisé et des chiffres"; 
    } 

    if (empty($telephone)) 
    { 
        $errors['telephone']= "s'il vous plait ,entrer le téléphone"; 
        $valid = false; 
    }
    else if (!preg_match(!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#",$telephone))) 
    { 
        $errors['telephone'] = "Seulement 10 chiffres autorisé "; 
    } 

    if (empty($email)) 
    { 
        $errors['email']= "s'il vous plait ,entrer l'email'"; 
        $valid = false; 
    }
    else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) 
    { 
        $errors['email'] = "Veuillez saisir une adresse valide"; 
    } 

    if (empty($metier)) 
    { 
        $errors['metier']= "s'il vous plait ,entrer le métier "; 
        $valid = false; 
    }
    else if (!preg_match("/^[a-zA-Z ]*$/",$metier)) 
    { 
        $errors['metier'] = "Seulement des lettres, des espaces autorisé et des chiffres"; 
    } 

    if (!preg_match("/^[a-zA-Z ]*$/",$commentaire)) 
    { 
        $errors['commentaire'] = "Seulement des lettres, des espaces autorisé et des chiffres"; 
    } 

    if (!empty($errors))
    {
        session_start();
        $_SESSION['errors'] = $errors;
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['adresse'] = $adresse;
        $_SESSION['codePostal'] = $codePostal;
        $_SESSION['ville'] = $ville;
        $_SESSION['telephone'] = $telephone;
        $_SESSION['email'] = $email;
        $_SESSION['metier'] = $metier;
        $_SESSION['commentaire'] = $commentaire;
        header("Location: clientsAjout.php");
    }
}
?>