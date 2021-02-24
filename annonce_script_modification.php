<?php
require('connexion_bdd.php');
// require('annexes\original\redimensionner.php');
$db = connexionBase();
if ( !empty($_POST['id'])) 
{ 
    $id = $_REQUEST['id']; 
    // var_dump($id);
} 

 // declaration des variables
$typeOffre = htmlentities(trim($_POST['typeOffre']));
$nbreP = htmlentities(trim($_POST['nbreP'])) ;
$reference = htmlentities(trim($_POST['reference'])) ;
$titre = htmlentities(trim($_POST['titre'])) ;
$description = htmlentities(trim($_POST['description'])) ;
$localisation = htmlentities(trim($_POST['localisation'])) ;
$surfaceHabitable = htmlentities(trim($_POST['surfaceHabitable'])) ;
$surfaceTotal = htmlentities(trim($_POST['surfaceTotal'])) ;
$option = htmlentities(trim($_POST['optionBouton']));
$prix = htmlentities(trim($_POST['prix'])) ;
$diagnosticBouton = htmlentities(trim($_POST['diagnosticBouton'])) ;
$photo = htmlentities(trim($_POST['photo']));

// *************************      requete annonce *******************************************************
$requete = $db->prepare("UPDATE annonces SET typeOffre= :typeOffre, nbreP = :nbreP, reference = :reference,
                                        titre = :titre, description = :description, localisation = :localisation,
                                        surfaceHabitable = :surfaceHabitable, surfaceTotal = :surfaceTotal ,
                                        prix = :prix, diagnosticBouton = :diagnosticBouton   ");
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
$requete->bindValue(':diagnosticBouton',$diagnosticBouton);

$requete->execute();
$requete->closeCursor();









