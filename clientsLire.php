<?php
session_start();
require 'connexion_bdd.php';
$db = connexionBase();
include ('entete.php');



?>
<!-- barre titre -->
<div class="row shadow mt-3 mb-3 mx-0 p-3 rounded bg-dark">
  <div class="col-md-2 text white-50 text-right"></div>
    <div class="col-md-8 h2 text-white-50 text-center">profile du client</div>
        <div class="col-2 text-center"></div>
</div>
<?php
// script lecture pour le formulaire
//récupération de l'identifiant concerné, passé en GET
$id=$_GET['id'];
$requete = "select * 
            FROM clients 
            WHERE id =".$id;
$result = $db->query($requete);
// récupération du résultat de la requête
$row = $result->fetch(PDO::FETCH_OBJ);
 
//libère la connection au serveur de BDD
$result->closeCursor();
    
    
    ?>
        <!-- formulaire -->
       
    <!-- ******************************************************* -->
    </div>
        <div class="form-horizontal">
            <div class="text-center">
                <p>
                    <div class ="control-group">
                        <label class="control-label">Nom</label>
                    <div class ="controls">
                        <label class ="checkbox"><?=$row ->nom?></label>
                    </div>
                    </div>
                </p>

                <p>
                    <div class ="control-group">
                        <label class="control-label">Prenom</label>
                    <div class ="controls">
                        <label class ="checkbox"><?=$row ->prenom?></label>
                    </div>
                    </div>
                </p>
                <p>
                    <div class ="control-group">
                        <label class="control-label">Adresse</label>
                    <div class ="controls">
                        <label class ="checkbox"><?=$row ->adresse?></label>
                    </div>
                    </div>
                </p>
                <p>
                    <div class ="control-group">
                        <label class="control-label">code postale</label>
                    <div class ="controls">
                        <label class ="checkbox"><?=$row ->code_postale?></label>
                    </div>
                    </div>
                </p>
                <p>
                    <div class ="control-group">
                        <label class="control-label">Ville</label>
                    <div class ="controls">
                        <label class ="checkbox"><?=$row ->ville?></label>
                    </div>
                    </div>
                </p>
                <p>
                    <div class ="control-group">
                        <label class="control-label">Téléphone</label>
                    <div class ="controls">
                        <label class ="checkbox"><?=$row ->telephone?></label>
                    </div>
                    </div>
                </p>
                <p>
                    <div class ="control-group">
                        <label class="control-label">Email</label>
                    <div class ="controls">
                        <label class ="checkbox"><?=$row ->email?></label>
                    </div>
                    </div>
                </p>
                <p>
                    <div class ="control-group">
                        <label class="control-label">Commentaire</label>
                    <div class ="controls">
                        <label class ="checkbox"><?=$row ->commentaire?></label>
                    </div>
                    </div>
                </p>

        </div>
    <?php
    
    ?>


            

    
<!-- Bouton retour -->
    <div class="text-center">
        <div class="form-actions">
            <a class="btn" href="clients.php">Retour</a>
        </div>
    </div>
    
</div>
</br>
<?php
include ('entete.php');
?>
