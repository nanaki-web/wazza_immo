<?php
require('connexion_bdd.php');
// require('annexes\original\redimensionner.php');
$db = connexionBase();
// $id=$_GET["id"];

if ( !empty($_POST['id'])) 
{ 
    $id = $_REQUEST['id']; 
    // var_dump($id);
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
$requete = $db->prepare("UPDATE annonce_option")
$requete->closeCursor();









