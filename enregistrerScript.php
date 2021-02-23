<?php
require('connexion_bdd.php');
$db = connexionBase();
require_once("function.php");

if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST))
{
    $errors = [];
    $vNom =htmlentities(trim($_POST['nom'])); 
    $vPrenom =htmlentities(trim($_POST['prenom']));
    $vEmail =htmlentities(trim($_POST['email']));
    $vMdp =htmlentities(trim($_POST['mdp']));
    $vMdpConfirmer =htmlentities(trim($_POST['mdpConfirmer']));
    
    // $compte =  [];
    if(empty($vNom) || !preg_match('/^[a-zA-Z-]+$/',$vNom))
    {
        $errors['cNom']="Vous n'avez pas entrer de nom";
    }
    else
    {
        //verification du nom qu'il apparait une seule fois dans la base de donnée
        $pdoStat = $db -> prepare ('SELECT id FROM utilisateurs WHERE nom = ?');
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
        //verification du email qu'il apparait une seule fois dans la base de donnée
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
        header("location:enregistrer.php");
    } 
    else
    {
       
        if(empty($errors))
        {
            
            $pdoStat = $db -> prepare ("INSERT INTO utilisateurs (nom, prenom, email, motDePasse,confirmation_token)
                                        VALUE (:nom, :prenom, :email,:motDePasse, :confirmation_token)");
            //hacher le mot de passe dans la base de donner
            $scriptageMdp = password_hash($vMdp,PASSWORD_BCRYPT);
            $token = str_random(60);
            // debug($token);// pour tester la fonction
            // die;

            $pdoStat->bindValue(':nom',$vNom);
            $pdoStat->bindValue(':prenom',$vPrenom);
            $pdoStat->bindValue(':email',$vEmail);
            $pdoStat->bindValue(':motDePasse',$scriptageMdp);
            $pdoStat->bindValue(':confirmation_token',$token);


            $pdoStat->execute();

            //nous renvoie le dernier id entrer
            $utilisateur_id = $db->lastInsertId();

            //envoi du mail 

            ob_start();
            require 'mail.php';
            $content = ob_get_clean();

            // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

            mail($_POST['email'], ' Confirmation de votre compte', $content, $headers);
            header('location:index.php');
            exit();
   


            
            
            
            
            
            
            

            
            // mail($email,'confirmation de votre compte',"enfin de valider votre compte,merci de cliquez sur ce lien\n\nhttp://wazaaimmo/enregistrerScript.php?id=$utilisateur_id&token=$token");
            // header('location:enregistrer.php');
            
            // session_start();
            // $compte['compte'] = 
            // die('Notre compte a bien été créé');
            // $_SESSION['compte'] = $compte;
           
            
        }
    } 
    
    
}