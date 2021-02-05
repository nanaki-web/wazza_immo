<?php
require('connexion_bdd.php');
$db = connexionBase();
require("function.php");

if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST))
{
    $errors = [];
    $vNom =htmlentities(trim($_POST['nom'])); $vPrenom =htmlentities(trim($_POST['prenom']));
    $vEmail =htmlentities(trim($_POST['email']));$vMdp =htmlentities(trim($_POST['mdp']));
    $vMdpConfirmer =htmlentities(trim($_POST['mdpConfirmer']));

    if(empty($vNom) || !preg_match('/^[a-zA-Z-]+$/',$vNom))
    {
        $errors['cNom']="Vous n'avez pas entrer de nom";
    }
    else
    {
        //verification du nom qu'il apparait une seule fois dans la base de donnée
        $pdoStat = $db -> prepare ('SELECT id FROM utilisateurs WHERE nom = :nom');
        $pdoStat->execute([$vNom]);
        //fetch permet de recuperer le premier enrregistrement (celui de utilisateurs )
        $utilisateur = $pdoStat->fetch();
        // debug($utilisateur);
        // die();
        if($utilisateur)
        {
            $errors['cNom'] = 'Ce nom est deja pris ';
        }
    }
    // debug($errors);
    if(empty($vPrenom) || !preg_match('/^[a-zA-Z-]+$/',$vPrenom))
    {
        $errors['cPrenom'] = "Vous n'avez pas entrer de prénom";
    }
    // debug($errors);
    if(empty($vEmail) || !filter_var($vEmail,FILTER_VALIDATE_EMAIL))
    {
        $errors['cEmail'] = "Votre email n'est pas valide ";
    }
    else
    {
        //verification du nom qu'il apparait une seule fois dans la base de donnée
        $pdoStat = $db -> prepare ('SELECT id FROM utilisateurs WHERE email = ? ');
        $pdoStat->execute([$vEmail]);
        //fetch permet de recuperer le premier enrregistrement (celui de utilisateurs )
        $utilisateur = $pdoStat->fetch();
        // debug($utilisateur);
        // die();
        if($utilisateur)
        {
            $errors['cEmail'] = 'Cette email est deja utilisé pour un autre compte';
        }
    }
    // debug($errors);
    if(empty($vMdp)|| $vMdp != $vMdpConfirmer)
    {
        $errors['cMdp'] = "Vous devez entrer un mot de passe valide";
    }
        // debug($errors);
    if(!empty($errors))  
    {
        session_start();
        $_SESSION['errors'] = $errors;
    }  
    if(empty($errors))
    {
        $pdoStat = $db -> prepare ("INSERT INTO utilisateurs (nom,prenom,email,motDePasse)
                                    VALUES (?,?,?,?)");
        //hacher le mot de passe dans la base de donner
        $scriptageMdp = password_hash($vMdp,PASSWORD_BCRYPT);
        $pdoStat->execute(array($vNom,$vPrenom,$vEmail,$scriptageMdp));
        die('Notre compte a bien été créé');
    }
    
}