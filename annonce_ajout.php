<?php
include("entete.php");
?>
<!-- session pour les messages d'erreur sur la page -->
<?php
if(array_key_exists('errors',$_SESSION)):?>
  <div class="alert alert-danger">
    <?= implode('<br>',$_SESSION['errors']);?>
  </div>
<?php unset($_SESSION['errors']); endif;?>

<!-- **********************************************Barre ajout annonce*********************************************************************** -->
<div class="row shadow mt-3 mb-3 mx-0 p-3 rounded bg-dark">
  <div class="col-md-2 text white-50 text-right"></div>
  <div class="col-md-8 h2 text-white-50 text-center">Ajouter une annonce</div>
</div>
<!-- *************************************************formulaire******************************************************************* -->

<form action = "annonce_ajout_script" method = "post"  enctype="multipart/form-data" >
    <div class="form-group">
    Type d'offre : <br>
<!-- bouton radio achat/location/-->
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="typeOffre">Achat </label>
            <input class="form-check-input" type="radio" id="typeOffre" name="typeOffre" value="A" >
        </div>
<!--  bouton radio location -->
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="typeOffre" >Location</label>
            <input class="form-check-input" type="radio" id="typeOffre" name="typeOffre" value="L" >
        </div>
 <!--  bouton radio Viager -->   
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="typeOffre" >Viager</label>
            <input class="form-check-input" type="radio" id="typeOffre" name="typeOffre" value="V" >
        </div>
        
    </div>

<div>
  <label for ="typeBien" >Type de bien : </label>
  <select class="form-select" aria-label="Default select example" id="typeBien" name="typeBien" >
  <option selected value="0">Open this select menu</option>
  <option  value="1">Maison</option>
  <option  value="2">Appartement</option>
  <option  value="3">Immeuble</option>

  </select>
  
</div>





<!-- nombre de piece -->
Nombre de pièce(s) : <br>
    <div class="form-check form-check-inline ">
        <input class="form-check-input" type="radio" name="nbrePiece" id= "nbrePiece" value="1">
        <label class="form-check-label" for="nbreP">1</label>
        
    </div>

    <div class="form-check form-check-inline ">
        <input class="form-check-input" type="radio" name="nbrePiece" id= "nbrePiece" value="2" >
        <label class="form-check-label" for="nbreP">2</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="nbrePiece" id= "nbrePiece" value="3" >
        <label class="form-check-label" for="nbreP">3</label>
        
    </div>

    <div class="form-check form-check-inline ">
        <input class="form-check-input" type="radio" name="nbrePiece" id= "nbrePiece" value="4" >
        <label class="form-check-label" for="nbreP">4</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="nbrePiece" id= "nbrePiece" value="5" >
        <label class="form-check-label" for="nbreP">5</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="nbrePiece" id= "nbrePiece" value="6" >
        <label class="form-check-label" for="nbreP">6</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="nbrePiece" id= "nbrePiece" value="+6" >
        <label class="form-check-label" for="nbreP">+6</label>
       
    </div>
<!-- Référence -->
    
    <div class="form-group ">
        <label for="reference">Référence</label>
        <input type="text" class="form-control" id ="reference" name="an_ref" aria-describedby="" placeholder="Entrer votre référence de type :25G563">
    

    </div>

<!-- titre -->
    <div class="form-group ">
        <label for="titre">Titre</label>
        <textarea class="form-control" id= "titre" name="an_titre" rows="3"></textarea>
        
     
    </div>

    <!-- Description -->
    <div class="form-group ">
        <label for="description">Description</label>
        <textarea class="form-control" id= "description" name="an_description" rows="3"></textarea>
    </div> 

<!-- Localisation -->
    <div class="form-group ">
        <label for="localisation">Localisation</label>
        <textarea class="form-control" id= "localisation" name="an_local" rows="3"></textarea>
    </div> 

     <!--surface habitable  -->
    <div class="form-group ">
        <label for="surfaceHabitable">Surface habitable</label>
        <input type="text" class="form-control" id="surfaceHabitable" name="an_surf_hab" aria-describedby="" placeholder="Entrer la surface habitable en carré">
    </div>

    <!-- surface totale -->
    <div class="form-group ">
        <label for="surfaceTotal">Surface total</label>
        <input type="text" class="form-control" id="surfaceTotal" name="an_surf_tot" aria-describedby="" placeholder="Entrer la surface habitable en carré">
    </div>

    <!-- options -->
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" name="anoption" value="0"checked hidden>
        <!-- <label class="form-check-label" for="optionBouton"></label> -->
    </div>
    <br>
    Option : <br>
    
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" name="anoption" value="1">
        <label class="form-check-label" for="optionBouton">Jardin</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" value="2" name="anoption[]">
        <label class="form-check-label" for="optionBouton">Garage</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" value="5" name="anoption[]">
        <label class="form-check-label" for="optionBouton">Comble aménagement</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" value="4" name="anoption[]">
        <label class="form-check-label" for="optionBouton">Piscine </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" value="6" name="anoption[]">
        <label class="form-check-label" for="optionBouton">Cuisine ouverte </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" value="7" name="anoption[]">
        <label class="form-check-label" for="optionBouton">Sans travaux </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" value="8" name="anoption[]">
        <label class="form-check-label" for="optionBouton">Avec travaux </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" value="10" name="anoption[]">
        <label class="form-check-label" for="optionBouton">Plein pied </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" value="9" name="anoption[]">
        <label class="form-check-label" for="optionBouton">Cave  </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" value="11" name="anoption[]">
        <label class="form-check-label" for="optionBouton">Ascenseur  </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" value="12" name="anoption[]">
        <label class="form-check-label" for="optionBouton">Terrasse/Balcon </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" value="13" name="anoption[]">
        <label class="form-check-label" for="optionBouton">Cheminé </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="optionBouton" value="3" name="anoption[]">
        <label class="form-check-label" for="optionBouton">Parking </label>
    </div>

<!-- Prix -->

    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="text" class="form-control" name="an_prix" id="prix" aria-describedby="" placeholder="Entrer votre prix">
    </div>
    <!-- Diagnostic -->

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="diagnosticBouton" name="an_diagnostic" value="0"checked hidden>
        <!-- <label class="form-check-label" for="optionBouton"></label> -->
    </div>

    <br>
    Diagnotic : <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="diagnosticBouton1" value="A" name="an_diagnostic">
        <label class="form-check-label" for="diagnosticBouton">A</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="diagnosticBouton2" value="B" name="an_diagnostic">
        <label class="form-check-label" for="diagnosticBouton">B </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="diagnosticBouton3" value="C" name="an_diagnostic">
        <label class="form-check-label" for="diagnosticBouton">C </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="diagnosticBouton4" value="D" name="an_diagnostic">
        <label class="form-check-label" for="diagnosticBouton">D </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="diagnosticBouton5" value="E" name="an_diagnostic">
        <label class="form-check-label" for="diagnosticBouton">E</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="diagnosticBouton6" value="F" name="an_diagnostic">
        <label class="form-check-label" for="diagnosticBouton">F</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="diagnosticBouton7" value="G" name="an_diagnostic">
        <label class="form-check-label" for="diagnosticBouton">G</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="diagnosticBouton8" value="vierge" name="an_diagnostic">
        <label class="form-check-label" for="diagnosticBouton">Vierge </label>
    </div>
   
    <!-- photos -->
    
    <div class="form-group">
        <label for="photo"> Téléchargement de la /des photo(s) :</label>
        <input type="file"  id="photoID" class="form-control-file" name="fichier[]" >
        <input type="file"  id="photoID" class="form-control-file" name="fichier[]" >
        <input type="file"  id="photoID" class="form-control-file" name="fichier[]" >
    </div>

    <!-- Date d’ajout -->
    <!-- <div class="form-group">
        <label for="dateAjout">Date d'ajout</label>
        <input type="date" class="form-control" name="an_d_ajout" id="dateAjout" aria-describedby="" placeholder="Entrer votre prix">
    </div> -->
    <!-- bouton submit -->
    <input class="btn btn-primary" id = " idEnvoyer " type="submit" name = "submit" value="Ajouter annonce">
</form> 

<?php
    include("pieddepage.php");

?>