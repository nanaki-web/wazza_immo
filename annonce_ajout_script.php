<?php
session_start();
require('connexion_bdd.php');
$db = connexionBase();
if(isset($_POST['submit']))
{
        $option = implode(',',$_POST['anoption']);
        $typeBien = $_POST["typeBien"];
}
if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST))
{
        // declaration des variables
        $errors = [];
        $typeOffre = $_POST["typeOffre"];
        $typeBien = $_POST["typeBien"];
        $nbrePiece = $_POST["nbrePiece"];
        $reference = $_POST["an_ref"];
        $titre = $_POST["an_titre"];
        $description = $_POST["an_description"];
        $localisation = $_POST["an_local"];
        $surfaceHabitable = $_POST["an_surf_hab"];
        $surfaceTotal = $_POST["an_surf_tot"];
        $option = implode(',',$_POST['anoption']);
        // var_dump($option);
        $prix = $_POST["an_prix"];
        $diagnosticBouton = $_POST["an_diagnostic"];
        // $photo = $_POST["an_photo"];
        
        // on vérifie nos champs 
        //On crée notre message d’erreur
        // $valid = true;
        // if(empty($typeOffre))
        // {
        //         $errors['typeOffre'] = "Veuillez cocher un type d'offre";
        //         $valid = false;
        // }

        // if(empty($typeBien == 0))
        // {
        //         $errors['typeBien'] = "Veuillez choisir un type de bien ";
        //         $valid = false;
        // }
        // if(empty($nbrePiece))
        //         $errors['nbrePiece'] = "Veuillez choisir le nombre de pièces";
        //         $valid = false;

        // if(empty($reference))
        // {
        //         $errors['reference'] = "Veuillez entrer une référence";
        //         $valid =false;
        // }
        // else if (!preg_match("/^[0-9]{2}[A-Z]{1}[0-9]{3}$/",$reference))
        // {
        //         $errors['reference'] = "Veuillez respecter le nombre de chiffres et lettres respectives ";
                
        // }

        // if(empty($titre))
        // {
        //         $errors['titre'] = "Veuillez mettre un titre a l'annonce";
        //         $valid = false;
        // }
        // if(empty($description))
        // {
        //         $errors['description'] = "Veuillez mettre une description du bien";
        //         $valid = false;
        // }

        // if(empty($localisation))
        // {
        //         $errors['localisation'] = "Veuillez mettre ou ce trouve ce bien";
        //         $valid = false;
        // }
        // else if(!preg_match("/^[a-zA-Z0-9 :.éàùèîï]{1,100}+$/",$localisation))
        // {
        //         $errors['localisation'] = "Veuillez ne pas dépasser 100 caractères";
        // }

        // if(!preg_match("/[0-9]/",$surfaceHabitable))
        // {
        //         $errors['surfaceHabilable'] = "Veuillez mettre que des chiffres ";
        // }

        // if(empty($surfaceTotal))
        // {
        //         $errors['surfaceTotal'] = "VEuillez remplir le champs surface totale qu'avec des nombres ";
        //         $valid = false ;
        // }
        // else if(!preg_match("/[0-9]/",$surfaceTotal))
        // {
        //         $errors['surfaceTotal'] = "Veuillez remplir qu'avec des chiffres";
        // }

        // // if($option= 0)
        // // {
        // //         $errors = "Veuillez choisir une option ";
        // //         $valid =false;
        // // }
        // // si il y a des erreurs dans le tableau alors on envois les messages .
        // if(!empty($errors))
        // {
        
        //         $errors['errors']= $errors;
        //         $errors['typeOffre'] = $typeOffre;
        //         $errors['typeBien'] = $typeBien;
        //         $errors['nbrePiece'] = $nbrePiece;
        //         $errors['reference'] = $reference;
        //         $errors['titre'] = $titre;
        //         $errors['description'] = $description;
        //         $errors['localisation'] = $localisation;
        //         $errors['surfaceHabitable'] = $surfaceHabitable;
        //         $errors['surfaceTotal'] = $surfaceTotal;
        //         header("Location: annonce_ajout.php");

        // }
        // else
        {
                // if($valid)
                {
                //  ********************************* requête **************************************************


                        // preparation de la requete d'insertion sans injection sql
                        $pdoStat = $db->prepare("INSERT INTO annonces (an_offre,an_type,an_pieces,an_ref,an_titre,an_description,an_local,an_surf_hab,an_surf_tot,options,an_prix,an_diagnostic,an_d_ajout) 
                        VALUES(:typeOffre,:typeBien, :nbrePiece,:reference,:titre, :description ,:localisation, :surfaceHabitable, :surfaceTotal,:options ,:prix,:diagnosticBouton,CURDATE())"); 

                        // on lie chaque marqueur à une valeur
                        $pdoStat->bindValue(':typeOffre',$typeOffre);                   
                        $pdoStat->bindValue(':typeBien',$typeBien,PDO::PARAM_INT);
                        $pdoStat->bindValue(':nbrePiece',$nbrePiece,PDO::PARAM_INT);                      
                        $pdoStat->bindValue(':reference',$reference);                      
                        $pdoStat->bindValue(':titre',$titre);                          
                        $pdoStat->bindValue(':description',$description);
                        $pdoStat->bindValue(':localisation',$localisation);                     
                        $pdoStat->bindValue(':surfaceHabitable',$surfaceHabitable,PDO::PARAM_INT);
                        $pdoStat->bindValue(':surfaceTotal',$surfaceTotal,PDO::PARAM_INT);
                        $pdoStat->bindValue(':options',$option);
                        $pdoStat->bindValue(':prix',$prix,PDO::PARAM_INT);
                        $pdoStat->bindValue(':diagnosticBouton',$diagnosticBouton);                        

                        $pdoStat->execute();



                        // $requeteOption = $db->prepare("INSERT INTO annonces (options)
                        //         VALUES (:options) ");
                        //         var_dump($requeteOption);
                        // $requeteOption->bindValue(':options',$option,PDO::PARAM_INT);
                        // $requeteOption->execute(array(implode("")));


                        //libère la connection au serveur de BDD
                        $pdoStat->closeCursor();

                        //redirection vers la page index.php
                        header("Location: index.php");

                }
        }










        
}

                

















