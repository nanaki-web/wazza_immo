<?php
// session_start();
require('connexion_bdd.php');
// require('annexes\original\redimensionner.php');
$db = connexionBase();
include ("entete.php");
?>
<div class="row shadow mt-3 mb-3 mx-0 p-3 rounded bg-dark">
  <div class="col-md-2 text white-50 text-right"></div>
  <div class="col-md-8 h2 text-white-50 text-center">Nos biens en ventes</div>
  <div class="col-2 text-center">
  <a class="text-white-50 nav-link" href="annonce_ajout.php">Ajouter une annonce</a>
  </div>
</div>
<div class="row">
    <?php   
    $requete = "select * FROM annonces ";
    $result = $db->query($requete);
    while($annonces = $result->fetch(PDO::FETCH_OBJ))
    {
        $request = "select pho_nom FROM photo where pho_nom='".$annonces->an_id."-1.jpg'";
        $resultPhoto = $db->query($request);
        $rowPhoto = $resultPhoto->fetch(PDO::FETCH_OBJ)
        ?>
        <div class="col-12 col-md-6 col-lg-4 col-xl-3 my-2">
            <div class="card" >
                <img class="card-img-top" src="annexes/photos/annonce_<?= $annonces->an_id?>/<?=$rowPhoto->pho_nom?>" width="20rem" height="350px"  alt="<?=$rowPhoto->pho_nom?>">
                <div class="card-body">
                <div class="mt-0">Reference : </div>
                    <div class="mt-0"><?=$annonces ->an_ref?></div>
                    <div class="mt-0">Description : </div>
                    <div class="mt-0"><?=$annonces ->an_titre?></div>
                    <div class="mt-0">Localisation : </div>
                    <div class="mt-0"><?= $annonces ->an_local ?></div>
                    <div class="mt-0">Prix: </div>
                    <div class="mt-0"><?= $annonces ->an_prix.'Euros'?></div>
                    <a href="detail.php?an_id=<?=$annonces ->an_id?>" class="btn btn-primary w-100">Détail</a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div> 
 <?php
    include ("pieddepage.php");
 ?>
</div>
    













