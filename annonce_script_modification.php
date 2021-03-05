<?php
require('connexion_bdd.php');
// require('annexes\original\redimensionner.php');
$db = connexionBase();
// $id=$_GET["id"];

if ( !empty($_POST['id'])) 
{ 
    $id = $_REQUEST['id']; 
    // var_dump($_REQUEST['id']);
} 

 // declaration des variables
$typeOffre = htmlentities(trim($_POST['typeOffre']));
$typeBien = htmlentities(trim($_POST["typeBien"]));
$nbrePiece = htmlentities(trim($_POST['nbreP'])) ;
$reference = htmlentities(trim($_POST['reference'])) ;
$titre = htmlentities(trim($_POST['titre'])) ;
$description = htmlentities(trim($_POST['description'])) ;
$localisation = htmlentities(trim($_POST['localisation'])) ;
$surfaceHabitable = htmlentities(trim($_POST['surfaceHabitable'])) ;
$surfaceTotal = htmlentities(trim($_POST['surfaceTotal'])) ;
$option = $_POST['optionBouton'];

$prix = htmlentities(trim($_POST['prix'])) ;
$diagnosticBouton = $_POST['diagnosticBouton'];
// $photo = htmlentities(trim($_POST['photo']));

// *************************      requete annonce *******************************************************
$requete = $db->prepare("UPDATE annonces SET an_Offre= :typeOffre,an_type = :typeBien, an_pieces = :nbrePiece, an_ref = :reference,
                                        an_titre = :titre, an_description = :description, an_local = :localisation,
                                        an_surf_hab = :surfaceHabitable, an_surf_tot = :surfaceTotal ,
                                        an_prix = :prix, an_diagnostic = :diagnosticBouton 
                                        WHERE an_id = :id");
$requete->bindValue(':typeOffre',$typeOffre);
$requete->bindValue(':typeBien',$typeBien,PDO::PARAM_INT);
$requete->bindValue(':nbrePiece',$nbrePiece,PDO::PARAM_INT);    
$requete->bindValue(':reference',$reference);
$requete->bindValue(':titre',$titre);                          
$requete->bindValue(':description',$description);
$requete->bindValue(':localisation',$localisation);                     
$requete->bindValue(':surfaceHabitable',$surfaceHabitable,PDO::PARAM_INT);
$requete->bindValue(':surfaceTotal',$surfaceTotal,PDO::PARAM_INT);
$requete->bindValue(':prix',$prix,PDO::PARAM_INT);
$requete->bindValue(':diagnosticBouton',$diagnosticBouton,PDO::PARAM_STR);
$requete->bindValue(':id',$id,PDO::PARAM_INT);
$requete->execute();

// *************** requete update pour les options*********************************************************************

//on efface toute les checkbox coché au préalable
$requete = $db->prepare("DELETE FROM annonce_option WHERE an_id = :an_id");
$requete->bindValue(':an_id',$id,PDO::PARAM_INT);
$requete->execute();

//ensuite ,dans une bouble , on parcourt le tableau $option . et A chaque tour de boucle ,on met un element dans $opt.
foreach($option as $opt)
{
    
    $requete = $db->prepare("INSERT INTO annonce_option (an_id,opt_id) VALUES (:an_id, :opt_id)");//on prepare la requete
    $requete->bindValue(':an_id',$id,PDO::PARAM_INT);//on attribue les marqueurs
    $requete->bindValue(':opt_id',$opt,PDO::PARAM_INT);
    $requete->execute();//on execute

}
// *************************************   photo  *****************************************************************
// $requete = $db ->prepare("DELETE FROM photo WHERE an_id = :an_id");
// $requete->bindValue(':an_id',$id,PDO::PARAM_INT);
// $requete->execute();


        //telecharger les images
        $fichier = $_FILES['fichier'];
        //lecture de table photo
        $photoLecture = $db->prepare("SELECT count(pho_id)as nbre FROM photo WHERE an_id= :an_id");
        $photoLecture->bindValue(':an_id',$id,PDO::PARAM_INT);
        $photoLecture->execute();
        $rowLecture = $photoLecture->fetch(PDO::FETCH_OBJ);
        //je recupere le resultat de l'alias +1 pour compter le nombre de photo
        $numeroPhoto = $rowLecture->nbre + 1 ;
        // var_dump($rowLecture);
        // var_dump($rowLecture->nbre);
        // var_dump($numeroPhoto);
        

                                                         //boucle sur [$_files ][name] et elle recupere la clé et sa valeur 
                        foreach ($_FILES["fichier"]["name"] as $key => $value) 
                        {
                            
                                
                                $extension = pathinfo($value, PATHINFO_EXTENSION);
                                // var_dump($value);
                                if ($value ) 
                                {
                                        $tmp_name = $_FILES["fichier"]["tmp_name"][$key];

                                        // basename() peut empêcher les attaques "filesystem traversal";
                                        
                                        $name = basename($_FILES["fichier"]["name"][$key]);
                                                                    
                                                $move = move_uploaded_file($_FILES["fichier"]["tmp_name"][$key],"annexes/photos/annonce_".$id."/".$id. "-" .$numeroPhoto.".".$extension);
                                                $photo = $db -> prepare("INSERT INTO photo (pho_nom, an_id) VALUE (:pho_nom, :an_id)");
                                                $photo->execute([
                                                        ':pho_nom' => $id. "-" .$numeroPhoto,
                                                        ':an_id' => (int) $id
                                                ]);
                                                $numeroPhoto++;
                                }

                        }    

                        // if (isset($_POST['idToDelete'])) {
                        //     $idToDelete = $_POST['idToDelete'];
                        //     if()
                        //     {

                        //     }
                        // }

$requete->closeCursor();//on ferme la bdd

header("Location: modification.php?an_id=$id");//revois sur modification.php l'id de l'annonce
?>
 <!-- ************************* photo************************************************************************************ -->








