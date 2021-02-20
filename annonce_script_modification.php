<?php
require('connexion_bdd.php');
// require('annexes\original\redimensionner.php');
$db = connexionBase();

// // declaration des variables
$typeOffre = $_POST["typeOffre"];
$nbreP = $_POST["nbreP"];
$reference = $_POST["reference"];
$titre = $_POST["titre"];
$description = $_POST["description"];
$localisation = $_POST["localisation"];
$surfaceHabitable = $_POST["surfaceHabitable"];
$surfaceTotal = $_POST["surfaceTotal"];
$prix = $_POST["prix"];
$diagnosticBouton = $_POST["diagnosticBouton"];
$photo = $_POST["photo"];
$dateAjout = $_POST["dateAjout"];
$id = $_POST['identifiantId'];
$pdoStat = $objetPDO -> prepare('SELECT * FROM annonces where id = :an_id ');

$pdoStat ->bindValue(' :id', $id, PDO::PARAM_INT);

$executeIsOk = $pdoStat ->execute();



