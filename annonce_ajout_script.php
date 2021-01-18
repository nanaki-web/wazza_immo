<?php
require('connexion_bdd.php');



$db = connexionBase();
// declaration des variables
// $typeOffre = $_POST["an_type"];
// $typeBien = $_POST["an_offre"];
// $nbreP = $_POST["an_pieces"];
// $reference = $_POST["an_ref"];
// $titre = $_POST["an_titre"];
// $description = $_POST["an_description"];
// $localisation = $_POST["an_local"];
// $surfaceHabitable = $_POST["an_surf_hab"];
// $surfaceTotal = $_POST["an_surf_tot"];
// $prix = $_POST["an_prix"];
// $diagnosticBouton = $_POST["an_diagnostic"];
// $photo = $_POST["an_photo"];
// $dateAjout = $_POST["an_d_ajout"];

// var_dump($_POST);
// var_dump($nbreP);
var_dump($_POST);
?>

<!-- ********************************* requête 1********************************************************************************************* -->
<!-- une entrée pour la table annonce -->
<?php
// preparation de la requete d'insertion sans injection sql
$pdoStat = $db -> prepare('INSERT INTO annonces (an_offre,an_type,an_pieces,an_ref,an_titre,an_description,an_local,an_surf_hab,an_surf_tot,an_prix,an_diagnostic,an_d_ajout) 
                                VALUES(:typeOffre,:typeBien, :nbreP;:reference,:titre, :description ,:localisation, :surfaceHabitable, :surfaceTotal, :prix,:diagnosticBouton,:dateAjout)');
var_dump($pdoStat);
$pdoStat->execute([
    
    ':typeOffre' => $_POST['an_type'],
    ':typeBien' => $_POST['an_offre'],
    ':nbreP' => $_POST['an_pieces'],
    ':reference' => $_POST['an_ref'],
    ':titre' => $_POST['an_titre'], 
    ':description' => $_POST['an_description'], 
    ':localisation' => $_POST['an_local'], 
    ':surfaceHabitable' => $_POST['an_surf_hab'],
    ':surfaceTotal' => $_POST['an_surf_tot'],
    ':prix' => $_POST['an_prix'],
    ':diagnosticBouton' => $_POST['an_diagnostic'],
    ':photo' => $_POST['an_photo'],
    ':dateAjout' => $_POST['an_d_ajout']

    
]);
var_dump($pdoStat);










// on lie chaque marqueur à une valeur
// $pdoStat ->bindvalue(' :typeOffre', $typeOffre, PDO::PARAM_STR);
// $pdoStat ->bindvalue(' :nbreP', $nbreP, PDO::PARAM_INT);
// $pdoStat ->bindvalue(' :reference', $reference, PDO::PARAM_STR);
// $pdoStat ->bindvalue(' :titre', $titre, PDO::PARAM_STR);
// $pdoStat ->bindvalue(' :description', $description, PDO::PARAM_STR);
// $pdoStat ->bindvalue(' :localisation', $localisation, PDO::PARAM_STR);
// $pdoStat ->bindvalue(' :surfaceHabitable', $surfaceHabitable, PDO::PARAM_INT);
// $pdoStat ->bindvalue(' :surfaceTotale', $surfaceTotal, PDO::PARAM_INT);
// $pdoStat ->bindvalue(' :prix', $prix, PDO::PARAM_INT);
// $pdoStat ->bindvalue(' :diagnosticBouton', $diagnosticBouton, PDO::PARAM_STR);
// $pdoStat ->bindvalue(' :photo', $photo, PDO::PARAM_STR);
// $pdoStat ->bindvalue(' :dateAjout', $dateAjout,PDO::PARAM_STR);










// éxécuter une requête préparée 

// $insertIsOk = $pdoStat->execute();
var_dump($_POST);
// var_dump($pdoStat);
// if($insertIsOk)
// {
//     $message = "le formulaire a été envoyé";
// }
// else
// {
//     $message = "échec de l'envoi ";
// }

// var_dump($insertIsOk);
?>

<p><?php echo $message ?></p>