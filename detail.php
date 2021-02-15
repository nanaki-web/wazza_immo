<?php
require('connexion_bdd.php');
$db = connexionBase();
$an_id = $_GET["an_id"];
var_dump($an_id);

include ("entete.php");
?>


    <!-- ***********************************************requete******************************************************************************************** -->
    <?php

    $requete = "select * FROM annonces where an_id=".$an_id;
    $result = $db->query($requete);
    // var_dump($result);
    // var_dump($requete);
    $annonces = $result->fetch(PDO::FETCH_OBJ);

    $request = "select pho_nom,an_id FROM photo where an_id=".$an_id; // recuperation des photos dans la BDD avec l'id annonce
    $resultPhoto = $db->query($request);
    // var_dump($result);
    // var_dump($requete);

    // -- ***************************************************************caroussel********************************************************************************* -->
    ?>
    <?php
    //  var_dump($annonces);
    ?>

<form action="#" enctype="multipart/form-data" method="POST" id="contact" name="formulaire">
    <div class="card mb-2 mt-0 border-0 mx-auto">
        <div class="car-header">
        <h2 class="card-title h3 bg-dark text-white p-2 text-center">Détail de l'annonce</h2>
        </div>
        <div class="d-flex flex-column flex-md-row p-0 ">
            <div class="form-group card-img-top image-fluid w-25">

              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                <?php
                $i = 1; // premiere image carousel
                while($rowPhoto = $resultPhoto->fetch(PDO::FETCH_OBJ)) // boucle des photos 
                {
                    if($i === 1) // premiere image carousel 
                    {
                      ?>
                      <div class="carousel-item active">
                        <img  class="card-img" alt="..." src="annexes/photos/annonce_<?= $rowPhoto->an_id; ?>/<?=$rowPhoto->pho_nom; ?>" width="20rem" height="350px"  alt="<?=$rowPhoto->pho_nom; ?>">
                      </div>
                      <?php
                    }
                    else // les autresd images du carousel 
                    {
                      ?>
                      <div class="carousel-item">
                        <img  class="card-img" alt="..." src="annexes/photos/annonce_<?= $rowPhoto->an_id; ?>/<?=$rowPhoto->pho_nom; ?>" width="20rem" height="350px"  alt="<?=$rowPhoto->pho_nom; ?>">
                      </div>
                      <?php
                    }
                    $i++;
                }
                ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>

            </div>
            <div class="card-body p-0 mt-0">
                <div class="p-4">
                <div class="form-group">
                            <div class="mb-3">
                                <label for="offre" class="form-label">Offre</label>
                                <input type="text" class="form-control" id="offre" name="offre" disabled  placeholder="<?php echo $annonces->an_offre ?>">
                            </div>
                        </div>
                        <!-- type de bien -->
                        <div class="form-group">
                            <label for="type" class="form-label">Type de bien</label>
                            <input type="text" class="form-control" id="type" name="type" disabled placeholder="<?php echo $annonces->an_type ?>">
                        </div>
                        <!--Nombre de pièces  -->
                        <div class="form-group">
                            <label for="piece" class="form-label">Nombre de pièces</label>
                            <input type="text" class="form-control" id="piece" name="piece" disabled placeholder="<?php echo $annonces->an_pieces ?>">
                        </div>
                        <!--Référence  -->
                        <div class="form-group">
                            <label for="ref" class="form-label">Référence</label>
                            <input type="text" class="form-control" id="ref" name="ref" disabled placeholder="<?php echo $annonces->an_ref ?>">
                        </div>
                        <!--Titre  -->
                        <div class="form-group">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="titre" name="titre" disabled placeholder="<?php echo $annonces->an_titre ?>">
                        </div>
                        <!--Description -->
                        <div class="form-group">
                            <label for="descript" class="form-label">Description</label>
                            <input type="text" class="form-control" id="descript" name="descript" disabled placeholder="<?php echo $annonces->an_description ?>">
                        </div>
                        <!--Localisation -->
                        <div class="form-group">
                            <label for="localisation" class="form-label">Localisation</label>
                            <input type="text" class="form-control" id="localisation" name="localisation" disabled placeholder="<?php echo $annonces->an_local ?>">
                        </div>
                        <!--surface habitable -->
                        <div class="form-group">
                            <label for="habitable" class="form-label">Surface habitable</label>
                            <input type="text" class="form-control" id="habitable" name="habitable" disabled placeholder="<?php echo $annonces->an_surf_hab ?>">
                        </div>
                        <!--Surface Total -->
                        <div class="form-group">
                            <label for="total" class="form-label">Surface Total</label>
                            <input type="text" class="form-control" id="total" name="total" disabled placeholder="<?php echo $annonces->an_surf_tot?>">
                        </div>
                        <!-- Prix -->
                        <div class="form-group">
                            <label for="prix" class="form-label">Prix</label>
                            <input type="text" class="form-control" id="prix" name="prix" disabled placeholder="<?php echo $annonces->an_prix?>">
                        </div>
                        <!-- diagnotique -->
                        <div class="form-group">
                            <label for="diagnos" class="form-label">Diagnostique</label>
                            <input type="text" class="form-control" id="diagnos" name="diagnos" disabled placeholder="<?php echo $annonces->an_diagnostic ?>">
                        </div>
                        <!-- Date d'ajout -->
                        <div class="form-group">
                            <label for="date_ajout" class="form-label">Date d'ajout</label>
                            <input type="text" class="form-control" id="date_ajout" name="date_ajout" disabled placeholder="<?php echo $annonces->an_d_ajout ?>">
                        </div>

                   
                </div>
            </div>
        </div>
        <div class="card-footer p-0 d-flex flex-row">
          <a href="index.php" class="btn btn-outline-primary w-100" role="button" aria-pressed="true">Retour</a>
          <a href="modification.php?an_id=<?=$annonces ->an_id?>" class="btn btn-outline-warning w-100" role="button" aria-pressed="true">Modification</a>
          <a href="supprimer.php?an_id=<?=$annonces ->an_id?>" class="btn btn-outline-danger w-100 " name = "an_id" role="button" aria-pressed="true">Supprimer</a>
          <a href="contact.php" class="btn btn-outline-info w-100 " role="button" aria-pressed="true">Formulaire de contact</a>
        </div>
    </div>
</form>

<!--*****************************************************  -->

<?php
include ("pieddepage.php");
?>





