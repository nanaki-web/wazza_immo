<?php
require 'connexion_bdd.php';
$db = connexionBase();
include("entete.php");
$an_id = $_GET["an_id"];
?>
<!-- construction de la requête -->

<?php
if(isset($_GET['an_id']))
{
    $an_id=$_GET['an_id'];//récupération de l'identifiant envoyé en méthode Get --> dans l'URL
}
?>
<!-- ***********************************************requete******************************************************************************************** -->
    <?php
    //requete lecture table annonce
    $requete = "select * FROM annonces where an_id=".$an_id;
    $result = $db->query($requete);
    $annonces = $result->fetch(PDO::FETCH_OBJ);
    var_dump($annonces);
    $typeOffre = $annonces->an_offre;

    //lecture table annonce_option
    $req = "SELECT * FROM annonce_option WHERE an_id=".$an_id;
    $resultOption = $db->query($req);
    
    // $option = $resultOption->fetch(PDO::FETCH_OBJ);
    // while($annonces = $result->fetch(PDO::FETCH_OBJ))
    // {
    //     $typeOffre = $annonces->an_offre;
    //     $req = $db -> prepare("SELECT * FROM annonces WHERE an_id= :an_id");
    //     $req-> bindValue(':an_id',$annonces->an_id,PDO::PARAM_INT);               
    //     $resultOption = $req->execute();
        
    //     $rowOption = $req->fetch(PDO::FETCH_OBJ);
    //     var_dump($rowOption);
    // }
    


   //lecture table photos
    $request = "select pho_nom,an_id FROM photo where an_id=".$an_id; // recuperation des photos dans la BDD avec l'id annonce
    $resultPhoto = $db->query($request);
    $result->closeCursor();
?>
<!-- **********************************************Barre ajout annonce*********************************************************************** -->
<div class="row shadow mt-3 mb-3 mx-0 p-3 rounded bg-dark">
  <div class="col-md-2 text white-50 text-right"></div>
  <div class="col-md-8 h2 text-white-50 text-center">Modifier une annonce</div>
</div>
<!-- *************************************************formulaire******************************************************************* -->

<form action = "annonce_script_modification" method = "post"  enctype="multipart/form-data" >
    <div class="form-group">
    <input type="text" name="id" class="form-control" hidden value="<?php echo $annonces->an_id ?>"  >
    Type d'offre : <br>
<!-- bouton radio achat/location/-->
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="typeOffre">Achat </label>
            <input class="form-check-input" type="radio" name="typeOffre" id="typeOffre" value="A"<?php if(isset($typeOffre) && $typeOffre == "A") echo "checked" ; ?> >
        </div>
<!--  bouton radio location -->
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="typeOffre" >Location</label>
            <input class="form-check-input" type="radio" name="typeOffre" id="typeOffre" value="L" <?php if(isset($typeOffre) && $typeOffre == "L") echo "checked" ; ?> >
        </div>
 <!--  bouton radio Viager -->   
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="typeOffre" >Viager</label>
            <input class="form-check-input" type="radio" name="typeOffre" id="typeOffre" value="V" <?php if(isset($typeOffre) && $typeOffre == "V") echo "checked" ; ?> >
        </div>
    </div>

<!-- nombre de piece -->
Nombre de pièce(s) : <br>
    <div class="form-check form-check-inline ">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="1" <?php if(isset($annonces->an_type) && ($annonces->an_type)== "1") echo "checked" ;?> >
        <label class="form-check-label" for="nbreP">1</label>
        
    </div>

    <div class="form-check form-check-inline ">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="2" <?php if(isset($annonces->an_type) && ($annonces->an_type)== "2") echo "checked" ; ?> >
        <label class="form-check-label" for="nbreP">2</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="3" <?php if(isset($annonces->an_type) && ($annonces->an_type)== "3") echo "checked" ; ?> >
        <label class="form-check-label" for="nbreP">3</label>
        
    </div>

    <div class="form-check form-check-inline ">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="4" <?php if(isset($annonces->an_type) && ($annonces->an_type)== "4") echo "checked" ; ?> >
        <label class="form-check-label" for="nbreP">4</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="5" <?php if(isset($annonces->an_type) && ($annonces->an_type)== "5") echo "checked" ; ?> >
        <label class="form-check-label" for="nbreP">5</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="6"<?php if(isset($annonces->an_type) && ($annonces->an_type)== "6") echo "checked" ; ?> >
        <label class="form-check-label" for="nbreP">6</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="+6" <?php if(isset($annonces->an_type) && ($annonces->an_type)== "+6") echo "checked" ; ?> >
        <label class="form-check-label" for="nbreP">+6</label>
        
    </div>
<!-- Référence -->
    
    <div class="form-group ">
        <label for="reference">Référence</label>
        <input type="text" class="form-control" name ="reference" id="reference" aria-describedby="" placeholder="Entrer votre référence" value = "<?php echo $annonces->an_ref ?>">
    </div>

<!-- titre -->
    <div class="form-group ">
        <label for="titre">Titre</label>
        <textarea class="form-control" name= "titre" id="titre" rows="3" value = ""><?php echo $annonces->an_titre ?></textarea>
    </div>

    <!-- Description -->
    <div class="form-group ">
        <label for="description">Description</label>
        <textarea class="form-control" name= "description" id="description" rows="3" value = ""><?php echo $annonces->an_description ?></textarea>
    </div> 

<!-- Localisation -->
    <div class="form-group ">
        <label for="localisation">Localisation</label>
        <textarea class="form-control" name= "localisation" id="localisation" rows="3"><?php echo $annonces->an_local ?></textarea>
    </div> 

     <!--surface habitable  -->
    <div class="form-group ">
        <label for="surfaceHabitable">Surface habitable en m2</label>
        <input type="text" class="form-control" name="surfaceHabitable" id="surfaceHabitable" aria-describedby="" placeholder="Entrer la surface habitable en carré" value = "<?php echo $annonces->an_surf_hab ?>">
    </div>

    <!-- surface totale -->
    <div class="form-group ">
        <label for="surfaceTotal">Surface total en m2</label>
        <input type="text" class="form-control" name="surfaceTotal" id="surfaceTotal" aria-describedby="" placeholder="Entrer la surface habitable en carré" value ="<?php echo $annonces->an_surf_tot ?>">
    </div>

    <!-- options -->
    Option : <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" id="optionBouton" value="jardin">
        <label class="form-check-label" for="optionBouton">Jardin</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" value="garage" id="optionBouton">
        <label class="form-check-label" for="optionBouton">Garage</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" value="Comble amenagement" id="optionBouton">
        <label class="form-check-label" for="optionBouton">Comble aménagement</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" value="Piscine" id="optionBouton">
        <label class="form-check-label" for="optionBouton">Piscine </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" value="Cuisine ouverte " <?php if(isset($resultOption->opt_id) && ($resultOption->opt_id)== "6") echo "checked" ;var_dump($annonce_option->opt_id); ?> id="optionBouton">
        <label class="form-check-label" for="optionBouton">Cuisine ouverte </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" value="Sans travaux " id="optionBouton">
        <label class="form-check-label" for="optionBouton">Sans travaux </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" value="Avec travaux " id="optionBouton">
        <label class="form-check-label" for="optionBouton">Avec travaux </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" value="Plein pied" id="optionBouton">
        <label class="form-check-label" for="optionBouton">Plein pied </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" value="Cave" id="optionBouton">
        <label class="form-check-label" for="optionBouton">Cave  </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" value="Ascenseur " id="optionBouton">
        <label class="form-check-label" for="optionBouton">Ascenseur  </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" value="Terrasse/Balcon " id="optionBouton">
        <label class="form-check-label" for="optionBouton">Terrasse/Balcon </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" value="Cheminé " id="optionBouton">
        <label class="form-check-label" for="optionBouton">Cheminé </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton" value="Parking " id="optionBouton">
        <label class="form-check-label" for="optionBouton">Parking </label>
    </div>

<!-- Prix -->

    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix" aria-describedby="" placeholder="Entrer votre prix" value ="<?php echo $annonces->an_prix ?>">
    </div>
    <!-- Diagnostic -->
    Diagnotic : <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton[]" value="A" <?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "A") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">A</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton[]" value="B" <?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "B") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">B </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton[]" value="C" <?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "C") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">C </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton[]" value="D"<?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "D") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">D </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton[]" value="E"<?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "E") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">E</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton[]" value="F"<?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "F") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">F</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton[]" value="G"<?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "G") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">G</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton[]" value="vierge"<?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "V") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">Vierge </label>
    </div>

    <!-- photos -->
    
    <div class="form-group">
        <label for="photo"> Téléchargement de la /des photo(s) :</label>
        <input type="file" name ="photo" class="form-control-file" id="photo">
    </div>

    <!-- bouton submit -->
    <input class="btn btn-primary" id = " idEnvoyer " type="submit" value="enregistrer">
    <a class="btn" href="detail.php?an_id=<?=$annonces ->an_id?>">Retour</a>
</form> 
<br>
<?php
    include("pieddepage.php");

?>