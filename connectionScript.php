<?php
session_start();
require('connexion_bdd.php');
$db = connexionBase();

if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST))
{
    // var_dump($db);
    $errors = [];
    
    
    
    $email = htmlentities(trim($_POST['emailconnect']));
    $mdp = htmlentities(trim($_POST['mdpconnect']));
    
    // var_dump($email,$mdp);
    
    
    $req= $db -> prepare ("SELECT id,motDePasse,email,prenom 
                            FROM Utilisateurs 
                            WHERE  email = :email"
                        );
        $req->execute(array('email'=>$email));
        $resultat = $req->fetch();
        // Comparaison du pass envoyé via le formulaire avec la base
        // password_verify est fonction va en fait hacher le mot de passe de l'utilisateur qui vient de se connecter, 
        // et le comparer à celui qui était stocké en base de données.
        $isPasswordCorrect = password_verify($mdp, $resultat['motDePasse']);
        // var_dump($isPasswordCorrect);
        // var_dump($req);
        // var_dump($resultat);
        $_SESSION['prenom']="test";
        if(!$resultat)
        {
           
            // echo "mauvais identifiant ou de mot de passe";
            $errors ['erreurId'] = "mauvais identifiant ou de mot de passe";
            
            $_SESSION['errors'] = $errors;
            // header("location:connection.php");
                // var_dump($_SESSION['errors']);
            
            // var_dump($errors);

        }
        else
        {
            if($isPasswordCorrect)
            {
                // session_start();
                $_SESSION['id'] = $resultat['id'];
                $_SESSION['email'] = $resultat['email'];
                $prenom = $resultat['prenom'];
                var_dump($resultat);
                var_dump($_SESSION['prenom']);
                // var_dump($_SESSION['email']);
                // var_dump($resultat['email']);
                // var_dump($_SESSION['id']);
                // var_dump($resultat);
                // header("location:index.php");
                // echo "vous êtes connecté !";
                $messages['msgconnection'] = "vous êtes connecté !";
                // header("location:index.php");
            }
            else
            {
                // header("location:connection.php");
                $errors['erreurId'] = "mauvais identifiant ou de mot de passe";
                echo "mauvais identifiant ou de mot de passe";
            }
            // var_dump($errors);
            if(!empty($errors))  
            {
                
                $_SESSION['errors'] = $errors;
                // header("location:connection.php");
                // var_dump($_SESSION['errors']);
            } 
            
            if (isset($_SESSION['id']) AND isset($_SESSION['email']))
            {
                $_SESSION['prenom']=$prenom;
                $_SESSION['messageid'] = 'Bonjour'.$_SESSION['prenom'];
                // var_dump($_SESSION);
                header("location:index.php");
            }
            
            // if(!empty($messages))
            // {
            //     session_start();
            //     $_SESSION["msgconnection"] = $messages;
            //     header("location:connection.php");

            // }
            
        
        }

}


















        //hacher le mot de passe dans la base de donner
    //     $scriptageMdp = password_hash($mdp,PASSWORD_BCRYPT);
    //     $requser ->execute(array('email'=>$email,
    //                              'mdp'=>$scriptageMdp));
    //     var_dump($requser);
    //     var_dump($scriptageMdp);
    //     //compter le nombre de ligne 
    //     $userexist = $requser -> rowCount();
    //     if($userexist == 1)
    //     {
    //         $userinfo =$requser -> fetch();
    //         session_start(); //on ouvre la session
           
    //         $_SESSION['prenom'] = $userinfo['prenom'];
    //         $_SESSION['email'] = $userinfo['email'];
    //         // header("location:profile.php?id=".$_SESSION['id']);


    //     }
    //     else
    //     {
    //         $errors['erreurs'] = "identifiant ou mail ou mot de passe ne correspondent pas  ";
    //     }
    // }
    // else
    // {
    //     $errors['erreur'] = "Tout les champs doivent être complétés !";
    // }

    // if(!empty($errors))  
    // {
    //     session_start();
    //     $_SESSION['errors'] = $errors;
    //     // header("location:connection.php");
    // } 



