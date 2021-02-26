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



$requete->closeCursor();//on ferme la bdd
//redirection vers la page index.php
// trouver un moyen d'envoi les données sur modification . 

header("Location: modification.php?an_id=$id");//probleme 

// ************************* photo************************************************************************************








