<?php
include("entete.php");

?>


<!-- **********************************************Barre ajout annonce*********************************************************************** -->
<div class="row shadow mt-3 mb-3 mx-0 p-3 rounded bg-dark">
  <div class="col-md-2 text white-50 text-right"></div>
  <div class="col-md-8 h2 text-white-50 text-center">Modifier une annonce</div>
</div>
<!-- *************************************************formulaire******************************************************************* -->

<form action = "annonce_script_modification" method = "post"  enctype="multipart/form-data >
    <div class="form-group">
    Type d'offre : <br>
<!-- bouton radio achat/location/-->
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="typeOffre">Achat </label>
            <input class="form-check-input" type="radio" name="typeOffre" id="typeOffre" value="achat" >
        </div>
<!--  bouton radio location -->
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="typeOffre" >Location</label>
            <input class="form-check-input" type="radio" name="typeOffre" id="typeOffre" value="location" checked  >
        </div>
 <!--  bouton radio Viager -->   
        <div class="form-check form-check-inline">
            <label class="form-check-label" for="typeOffre" >Viager</label>
            <input class="form-check-input" type="radio" name="typeOffre" id="typeOffre" value="viager"   >
        </div>
    </div>

<!-- nombre de piece -->
Nombre de pièce(s) : <br>
    <div class="form-check form-check-inline ">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="1" >
        <label class="form-check-label" for="nbreP">1</label>
        
    </div>

    <div class="form-check form-check-inline ">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="2" >
        <label class="form-check-label" for="nbreP">2</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="3" >
        <label class="form-check-label" for="nbreP">3</label>
        
    </div>

    <div class="form-check form-check-inline ">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="4" >
        <label class="form-check-label" for="nbreP">4</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="5" >
        <label class="form-check-label" for="nbreP">5</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="6" >
        <label class="form-check-label" for="nbreP">6</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="+6" >
        <label class="form-check-label" for="nbreP">+6</label>
        
    </div>
<!-- Référence -->
    
    <div class="form-group ">
        <label for="reference">Référence</label>
        <input type="text" class="form-control" name ="reference" id="reference" aria-describedby="" placeholder="Entrer votre référence">
    </div>

<!-- titre -->
    <div class="form-group ">
        <label for="titre">Titre</label>
        <textarea class="form-control" name= "titre" id="titre" rows="3"></textarea>
    </div>

    <!-- Description -->
    <div class="form-group ">
        <label for="description">Description</label>
        <textarea class="form-control" name= "description" id="description" rows="3"></textarea>
    </div> 

<!-- Localisation -->
    <div class="form-group ">
        <label for="localisation">Localisation</label>
        <textarea class="form-control" name= "localisation" id="localisation" rows="3"></textarea>
    </div> 

     <!--surface habitable  -->
    <div class="form-group ">
        <label for="surfaceHabitable">Surface habitable</label>
        <input type="text" class="form-control" name="surfaceHabitable" id="surfaceHabitable" aria-describedby="" placeholder="Entrer la surface habitable en carré">
    </div>

    <!-- surface totale -->
    <div class="form-group ">
        <label for="surfaceTotal">Surface total</label>
        <input type="text" class="form-control" name="surfaceTotal" id="surfaceTotal" aria-describedby="" placeholder="Entrer la surface habitable en carré">
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
        <input class="form-check-input" type="checkbox" name="optionBouton" value="Cuisine ouverte " id="optionBouton">
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
        <input type="text" class="form-control" id="prix" name="prix" aria-describedby="" placeholder="Entrer votre prix">
    </div>
    <!-- Diagnostic -->
    Diagnotic : <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="A" id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">A</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="B" id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">B </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="C" id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">C </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="D" id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">D </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="E" id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">E</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="F" id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">F</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="G" id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">G</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="vierge" id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">Vierge </label>
    </div>

    <!-- photos -->
    
    <div class="form-group">
        <label for="photo"> Téléchargement de la /des photo(s) :</label>
        <input type="file" name ="photo" class="form-control-file" id="photo">
    </div>

    <!-- Date d’ajout -->
    <div class="form-group">
        <label for="dateModification">Date de modification :</label>
        <input type="date" class="form-control" id="dateModification" name="dateModification" aria-describedby="" placeholder="Entrer votre prix">
    </div>
    <!-- bouton submit -->
    <input class="btn btn-primary" id = " idEnvoyer " type="submit" value="enregistrer">
</form> 

<?php
    include("pieddepage.php");

?>