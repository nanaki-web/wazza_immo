<?php
require('connexion_bdd.php');
$db = connexionBase();
if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST))
{
    $errors = [];

    $nom =htmlentities(trim($_POST['nomconnect'])); 
    $prenom  =htmlentities(trim($_POST['prenomconnect']));
    $email = htmlentities(trim($_POST['emailconnect']));
    $mdp = htmlentities(trim($_POST['mdpconnect']));
    if(!empty($nom) AND !empty($prenom) AND !empty($email) AND !empty($mdp))
    {
        $requser = $db -> prepare ("SELECT * 
                                    FROM Utilisateurs 
                                    WHERE nom= ? AND prenom=? AND email = ? AND motDePasse = ?");
        $requser ->execute(array($nom,$prenom,$email,$mdp));
        //compter le nombre de ligne 
        $userexist = $requser -> rowCount();
        if($userexist == 1)
        {
            $userinfo =$requser -> fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['email'] = $userinfo['email'];
            header("location:profile.php?id=".$_SESSION['id']);


        }
        else
        {
            $errors['erreurs'] = "identifiant ou mail ou mot de passe ne correspondent pas  ";
        }
    }
    else
    {
        $errors['erreur'] = "Tout les champs doivent être complétés !";
    }

    if(!empty($errors))  
    {
        session_start();
        $_SESSION['errors'] = $errors;
        header("location:connection.php");
    } 
}


