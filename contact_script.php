<?php
require('connexion_bdd.php');
$db = connexionBase();

if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST))
{
    //on initialise nos messages d'erreurs;

    // $nomError = '';$prenomError = '';$adresseError ='';$code_postaleError = '';$villeError = ''; $telephoneError = '';
    // $emailError = '' ;$sujetError = '';$question = '' ;
    $errors = [];
    
    // on recupère nos valeurs 
// var_dump($_POST);
    $nom=htmlentities(trim($_POST['nom']));$prenom=htmlentities(trim($_POST['prenom']));
    $adresse=htmlentities(trim($_POST['adresse']));$code_postale=htmlentities(trim($_POST['postal']));
    $ville=htmlentities(trim($_POST['ville']));$telephone=htmlentities(trim($_POST['tel']));
    $email=htmlentities(trim($_POST['email']));$sujet=htmlentities(trim($_POST['sujet']));
    $question=htmlentities(trim($_POST['question']));
    
    // on vérifie nos champs 
    //On crée notre message d’erreur
    $valid = true;
    if (empty($nom)) 
    { 
        $errors['nom'] = "s'il vous plait ,entrer votre nom"; 
        $valid = false; 
    }
    else if (!preg_match("/^[a-zA-Z ]*$/",$nom)) 
    { 
        $errors['nom'] = "Seulement des lettres et des espaces autorisé"; 
    } 
    
    if (empty($prenom)) 
    { 
        $errors['prenom'] = "s'il vous plait ,entrer votre prénom"; 
        $valid = false; 
    }
    else if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) 
    { 
        $errors['prenom'] = "Seulement des lettres et des espaces autorisé"; 
    } 

    if (empty($adresse)) 
    { 
        $errors['adresse'] = "s'il vous plait ,entrer votre adresse"; 
        $valid = false; 
    }
    else if (!preg_match("/^[a-zA-Z 0-9']*$/",$adresse)) 
    { 
        $errors['adresse'] = "Seulement des lettres, des chiffres et des espaces autorisé"; 
    }

    if (empty($code_postale)) 
    { 
        $errors['code_postale'] = "s'il vous plait ,entrer votre code postale"; 
        $valid = false; 
    }
    else if (!preg_match("/^[0-9]{5}$/",$code_postale)) 
    { 
        $errors['code_postale'] = "Seulement des lettres, des espaces autorisé et des chiffres"; 
    }  

    if (empty($ville)) 
    { 
        $errors['ville']= "s'il vous plait ,entrer votre ville"; 
        $valid = false; 
    }
    else if (!preg_match("/^[a-zA-Z ]*$/",$ville)) 
    { 
        $errors['ville'] = "Seulement des lettres, des espaces autorisé et des chiffres"; 
    } 

    if (empty($telephone)) 
    { 
        $errors['telephone'] = "s'il vous plait ,entrer votre numéro de téléphone"; 
        $valid = false; 
    }
    else if (!preg_match("#^0[1-68]([-. ]?[0-9]{2}){4}$#",$telephone)) 
    { 
        $errors['telephone'] = "s'il vous plaît, Entrer un téléphone valide"; 
    }

    if (empty($email)) 
    { 
        $emailError = "S'il vous plaît entrer votre adresse email"; 
        $valid = false; 
    } 
    else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) 
    { 
        $errors['email'] = 'Please enter a valid Email Address'; 
        $valid = false; 
    } 

    if (!isset($sujet)) 
    { 
        $errors['sujet'] = 'Please select a country'; 
        $valid = false; 
    } 
   

    if (empty($question)) 
    { 
        $errors['question'] = "S'il vous plaît poser votre question"; 
        $valid = false; 
    }
    
    
    if(!empty($errors))
    {
        session_start();
        $_SESSION['errors'] = $errors;
        $_SESSION['nom'] = $nom;
        $_SESSION['prenom'] = $prenom;
        $_SESSION['adresse'] = $adresse;
        $_SESSION['postal'] = $postale;
        $_SESSION['ville'] = $ville;
        
        header("Location: contact.php");
    }
   else
   {
        if ($valid) 
        {
            // $pdo = base::connect();
            $pdoStat = $db -> prepare ("INSERT INTO contacts (nom,prenom,adresse,code_postale,ville,telephone,email,sujet,question)
                                        VALUES (?,?,?,?,?,?,?,?,?)");


            //  var_dump($_POST);
            $pdoStat->execute(array($nom,$prenom,$adresse,$code_postale,$ville,$telephone,$email,$sujet,$question));
            // Database::disconnect();
            header("Location: index.php");
        }
   }
   
        
}  
    // si les données sont présentes et bonnes, on se connecte à la base*

    
//     else{
//         header("Location: contact.php");
//     }
// }









// var_dump($_POST);



