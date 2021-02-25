<?php
session_start();
require('connexion_bdd.php');
$db = connexionBase();

if($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST))
{
        // declaration des variables
        $errors = [];
        $typeOffre = $_POST["typeOffre"];
        $typeBien = $_POST["typeBien"];
        $nbrePiece = $_POST["nbrePiece"];
        // var_dump($nbrePiece);
        $reference = $_POST["an_ref"];
        $titre = $_POST["an_titre"];
        $description = $_POST["an_description"];
        $localisation = $_POST["an_local"];
        $surfaceHabitable = $_POST["an_surf_hab"];
        $surfaceTotal = $_POST["an_surf_tot"];
        $option = $_POST['anoption'];
        
        $prix = $_POST["an_prix"];
        $diagnosticBouton = $_POST["an_diagnostic"];
        
        
        // on vérifie nos champs 
        //On crée notre message d’erreur
        $valid = true;
        if(empty($typeOffre))
        {
                $errors['typeOffre'] = "Veuillez cocher un type d'offre";
                var_dump($errors['typeOffre']);
                $valid = false;
        }

        if($typeBien == 0)
        {
                $errors['typeBien'] = "Veuillez choisir un type de bien ";
                var_dump($errors['typeBien']);
                $valid = false;
        }
        if(empty($nbrePiece))
        {
                $errors['nbrePiece'] = "Veuillez choisir le nombre de pièces";
                // var_dump($errors['nbrePiece']);
                $valid = false;
        }
                

        if(empty($reference))
        {
                $errors['reference'] = "Veuillez entrer une référence exemple:42H458";
                // var_dump($errors['reference']);
                $valid =false;
        }
        else if (!preg_match("/^[0-9]{2}[A-Z]{1}[0-9]{3}$/",$reference))
        {
                $errors['reference'] = "Veuillez respecter le nombre de chiffres et lettres respectives pour la référence ,exemple:42H458 ";
                // var_dump($errors['reference']);
                
        }

        if(empty($titre))
        {
                $errors['titre'] = "Veuillez mettre un titre a l'annonce";
                // var_dump($errors['titre']);
                $valid = false;
        }
        if(empty($description))
        {
                $errors['description'] = "Veuillez mettre une description du bien";
                // var_dump($errors['description']);
                $valid = false;
        }

        if(empty($localisation))
        {
                $errors['localisation'] = "Veuillez remplir le champ localisation";
                // var_dump($errors['localisation']);
                $valid = false;
        }
        else if(!preg_match("/^[a-zA-Z0-9 :.éàùèîï]{1,100}+$/",$localisation))
        {
                $errors['localisation'] = "Veuillez ne pas dépasser 100 caractères pour le champ de localisation";
                // var_dump($errors['localisation']);
        }

        if(empty($surfaceHabitable))
        {
                $errors['surfaceTotal'] = "Veuillez remplir le champs surface habitable qu'avec des nombres ";
                var_dump($errors['surfaceTotal']);
                $valid = false ;
        }
        else if(!preg_match("/[0-9]/",$surfaceHabitable))
        {
                $errors['surfaceHabilable'] = "Veuillez mettre que des chiffres ";
                var_dump($errors['surfaceHabilable']);
        }

        if(empty($surfaceTotal))
        {
                $errors['surfaceTotal'] = "Veuillez remplir le champs surface totale qu'avec des nombres ";
                // var_dump($errors['surfaceTotal']);
                $valid = false ;
        }
        else if(!preg_match("/[0-9]/",$surfaceTotal))
        {
                $errors['surfaceTotal'] = "Veuillez remplir qu'avec des chiffres";
                // var_dump($errors['surfaceTotal']);
        }
        //checkbox caché value == 0
        if(!empty($option=="0"))
        { 
                $errors['option']='Veuillez selectionner une option'; 
                // var_dump($errors['option']);
                $valid= false; 
        } 

        if(empty($prix))
        {
                $errors['prix'] = "Veuillez remplir le champs prix qu'avec des nombres ";
                // var_dump($errors['prix']);
                $valid = false ;
        }
        else if(!preg_match("/[0-9]/",$prix))
        {
                $errors['surfaceHabilable'] = "Veuillez remplir le champ prix qu'avec des chiffres ";
                // var_dump($errors['surfaceHabilable']);
        }

        //checkbox caché value == 0
        if(!empty($diagnosticBouton=="0"))
        { 
                $errors['diagnostic']='Veuillez selectionner cocher un diagnotic'; 
                // var_dump($errors['diagnostic']);
                $valid= false; 
        }
        
        // $_FILES["fichier"];
        // var_dump($_FILES);
        
        




        
      
        if(!empty($errors))
        {
                //dans le tableau $_session , dans ce tableau je rajoute une ligne qui portera l'indice errors 
                // dans cette ligne ,je met la valeur de $errors .
                $_SESSION['errors']= $errors;

                header("Location: annonce_ajout.php");

        }
        else
        
        {
                // var_dump($valid);
                // var_dump($errors);
                if($valid)
                {
                        // var_dump($valid);
                //  ********************************* requête pour l'annonce **************************************************

                        
                        // preparation de la requete d'insertion sans injection sql
                        $pdoStat = $db->prepare("INSERT INTO annonces (an_offre,an_type,an_pieces,an_ref,an_titre,
                                                                        an_description,an_local,an_surf_hab,an_surf_tot
                                                                        ,an_prix,an_diagnostic,an_d_ajout) 
                                                VALUES(:typeOffre,:typeBien, :nbrePiece,:reference,:titre,
                                                        :description ,:localisation, :surfaceHabitable, :surfaceTotal
                                                        ,:prix,:diagnosticBouton,CURDATE() )"); 

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
                        $pdoStat->bindValue(':prix',$prix,PDO::PARAM_INT);
                        $pdoStat->bindValue(':diagnosticBouton',$diagnosticBouton);

                        $pdoStat->execute();
                        // var_dump($pdoStat);
                        $an_id= $db->lastInsertId();//recuperation du dernier id inserer

//************************requete pour les options ********************************************************************* */


                       //pour chaque objet $newValueOption dans la variable option
                        foreach($option as $newValueOption)
                        {//prepare la requete d'insertion
                                $requete = $db->prepare("INSERT INTO annonce_option (an_id,opt_id) VALUES (:an_id, :opt_id)");
                

                                $requete->execute([
                                        ':an_id' => (int) $an_id,//recuperation du dernier id inserer en bdd
                                        ':opt_id' => (int) $newValueOption
                                ]);
                        }
                                //$requete->bindvalue(':an_id',$an_id,PDO::PARAM_INT);
                                //bindvalue donne la valeur a la requete preparer // :an_id est remplacé dans la requete  $an_id
                                // $requete->bindvalue(':opt_id',$newValueOption,PDO::PARAM_INT);
//********************** requete pour la photo**************************************************************************
                        
                
                        $fichier = $_FILES['fichier'];
                        $mk = mkdir("annexes/photos/annonce_".$an_id);

                        var_dump($fichier);
                        //boucle sur [$_files ][name] et elle recupere la clé et sa valeur 
                        foreach ($_FILES["fichier"]["name"] as $key => $value) 
                        {
                                $extension = pathinfo($value, PATHINFO_EXTENSION);
                                // var_dump($value);
                                if ($value ) 
                                {
                                        $tmp_name = $_FILES["fichier"]["tmp_name"][$key];
                                    // basename() peut empêcher les attaques "filesystem traversal";
                                    // une autre validation/néttoyage du nom de fichier peux être appropriée
        
                                        $name = basename($_FILES["fichier"]["name"][$key]);
                                        if($mk)
                                        {
                                                $move = move_uploaded_file($_FILES["fichier"]["tmp_name"][$key],"annexes/photos/annonce_".$an_id."/".$an_id. "-" .$key.".".$extension);
                                                $photo = $db -> prepare("INSERT INTO photo (pho_nom, an_id) VALUE (:pho_nom, :an_id)");
                                                $photo->execute([
                                                        ':pho_nom' => $an_id. "-" .$key,
                                                        ':an_id' => (int) $an_id
                                                ]);
                                        }

                                        //     var_dump($move);
                                        //     var_dump($_FILES["fichier"]["tmp_name"][$key]);
                                        //     var_dump($an_id);
                                        //     var_dump($key);
                                        //     var_dump($extension);
                                }
                        }


                         //libère la connection au serveur de BDD
                        $pdoStat->closeCursor();
                        //redirection vers la page index.php
                        header("Location: index.php");

                }
        }

}








 

                

















