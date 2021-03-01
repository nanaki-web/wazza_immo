<?php
require 'connexion_bdd.php';
$db = connexionBase();
include("entete.php");
$an_id = $_GET["an_id"];
// var_dump($_POST);
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
    $requete = "select * 
                FROM annonces 
                where an_id=".$an_id;
    $result = $db->query($requete);
    $annonces = $result->fetch(PDO::FETCH_OBJ);
    
    $typeOffre = $annonces->an_offre;


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
    <div>
        <label for ="typeBien" >Type de bien : </label>
        <select class="form-select" aria-label="Default select example" id="typeBien" name="typeBien" >
            <option selected value="0">Open this select menu</option>
            <option  value="1" <?php if(isset($annonces->an_type) && $annonces->an_type == "1") echo "selected" ;?> >Maison</option>
            <option  value="2"<?php if(isset($annonces->an_type) && $annonces->an_type == "2") echo "selected" ;?> >Appartement</option>
            <option  value="3"<?php if(isset($annonces->an_type) && $annonces->an_type == "3") echo "selected" ;?> >Immeuble</option>
        </select>
    </div>

<!-- nombre de piece -->
Nombre de pièce(s) : <br>
    <div class="form-check form-check-inline ">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="1" <?php if(isset($annonces->an_pieces) && ($annonces->an_pieces)== "1") echo "checked" ;?> >
        <label class="form-check-label" for="nbreP">1</label>
        
    </div>

    <div class="form-check form-check-inline ">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="2" <?php if(isset($annonces->an_pieces) && ($annonces->an_pieces)== "2") echo "checked" ; ?> >
        <label class="form-check-label" for="nbreP">2</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="3" <?php if(isset($annonces->an_pieces) && ($annonces->an_pieces)== "3") echo "checked" ; ?> >
        <label class="form-check-label" for="nbreP">3</label>
        
    </div>

    <div class="form-check form-check-inline ">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="4" <?php if(isset($annonces->an_pieces) && ($annonces->an_pieces)== "4") echo "checked" ; ?> >
        <label class="form-check-label" for="nbreP">4</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="5" <?php if(isset($annonces->an_pieces) && ($annonces->an_pieces)== "5") echo "checked" ; ?> >
        <label class="form-check-label" for="nbreP">5</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="6"<?php if(isset($annonces->an_pieces) && ($annonces->an_pieces)== "6") echo "checked" ; ?> >
        <label class="form-check-label" for="nbreP">6</label>
        
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="nbreP" name= "nbreP" value="+6" <?php if(isset($annonces->an_pieces) && ($annonces->an_pieces)== "+6") echo "checked" ; ?> >
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

    <?php
            //lecture table annonce_option
   
    $req = $db->prepare("SELECT annonce_option.opt_id ,options.opt_libelle
                        FROM annonce_option  
                        JOIN options
                        ON annonce_option.opt_id = options.opt_id   
                        WHERE an_id = :an_id") ;
    $req->bindValue(':an_id',$an_id,PDO::PARAM_INT);
    
    
    $resultOption = $req->execute();
   
    $resultOption =$req->fetchAll();

    $req = $db->prepare("SELECT options.opt_id,options.opt_libelle
                        FROM options "
    );
    $result = $req -> execute();

    $opt_ids = [];
    foreach ($resultOption as $data) 
    {  
        //opt_libelle de mon objet $data
        $opt_ids[$data->opt_libelle] = $data->opt_id;
        
    }
    echo "Option : <br>";
    while($result = $req ->fetch(PDO::FETCH_OBJ))
    {
    ?>
        <div class="form-check form-check-inline">                                                              <?php // est ce que (isset) je trouve $result->opt_libelle dans mon tableau $opt_ids  ?>
        <input class="form-check-input" type="checkbox" name="optionBouton[]" id="optionBouton" value="<?php echo $result->opt_id;    ?>"<?php if (isset($opt_ids[$result->opt_libelle])) echo "checked"; ?>>
        <label class="form-check-label" for="optionBouton"><?php echo $result->opt_libelle; ?></label>
        </div> 
    <?php
    }
    
   ?>
    
    <!-- options -->
    <!-- Option : <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton[]" id="optionBouton" value="1">
        <label class="form-check-label" for="optionBouton">Jardin</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton[]" value="2" id="optionBouton">
        <label class="form-check-label" for="optionBouton">Garage</label>
    </div>

    <div class="form-check form-check-inline">                 <?php // est ce que (isset) je trouve combles aménageables dans mon tableau $opt_ids  ?>
        <input class="form-check-input" type="checkbox" name="optionBouton[]" value="5"<?php if (isset($opt_ids['Combles aménageables'])) echo "checked"; ?>    id="optionBouton"> 
        <label class="form-check-label" for="optionBouton">Comble aménagement</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton[]" id="optionBouton" value="4"<?php if(isset($rowOption['opt_id']) && ($rowOption['opt_id'])== "4") echo "checked" ;?> id="optionBouton">
        <label class="form-check-label" for="optionBouton">Piscine </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton[]" value="6<?php if(isset($rowOption['opt_id']) && ($rowOption['opt_id'])== "6") echo "checked";?> "  id="optionBouton">
        <label class="form-check-label" for="optionBouton">Cuisine ouverte </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton[]" value="7 " id="optionBouton">
        <label class="form-check-label" for="optionBouton">Sans travaux </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton[]" value="8 " id="optionBouton">
        <label class="form-check-label" for="optionBouton">Avec travaux </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton[]" value="10" id="optionBouton">
        <label class="form-check-label" for="optionBouton">Plein pied </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton[]" value="9" id="optionBouton">
        <label class="form-check-label" for="optionBouton">Cave  </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton[]" value="11 " id="optionBouton">
        <label class="form-check-label" for="optionBouton">Ascenseur  </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton[]" value="12 " id="optionBouton">
        <label class="form-check-label" for="optionBouton">Terrasse/Balcon </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton[]" value="13 " id="optionBouton">
        <label class="form-check-label" for="optionBouton">Cheminé </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="optionBouton[]" value="3 " id="optionBouton">
        <label class="form-check-label" for="optionBouton">Parking </label>
    </div> -->

<!-- Prix -->


    <div class="form-group">
        <label for="prix">Prix</label>
        <input type="text" class="form-control" id="prix" name="prix" aria-describedby="" placeholder="Entrer votre prix" value ="<?php echo $annonces->an_prix ?>">
    </div>
    <!-- Diagnostic -->
  

    Diagnotic : <br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="A" <?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "A") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">A</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="B" <?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "B") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">B </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="C" <?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "C") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">C </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="D"<?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "D") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">D </label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="E"<?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "E") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">E</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="F"<?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "F") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">F</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="G"<?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "G") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">G</label>
    </div>

    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" name="diagnosticBouton" value="vierge"<?php if(isset($annonces->an_diagnostic) && ($annonces->an_diagnostic)== "V") echo "checked" ; ?> id="diagnosticBouton">
        <label class="form-check-label" for="diagnosticBouton">Vierge </label>
    </div>

    <!-- photos -->

    <br>
    
    <?php
        $request = $db ->prepare("select pho_nom FROM photo where an_id = :an_id");
        $request -> bindValue(':an_id',$an_id,PDO::PARAM_INT);
        
    
        $resultPhoto = $request -> execute();
        
    
        while($rowPhoto = $request->fetch(PDO::FETCH_OBJ))
        {
            if(isset($rowPhoto->pho_nom))
            {
            
        ?>
                <img name="image"  src="annexes/photos/annonce_<?=$an_id."/".$rowPhoto->pho_nom; ?> " alt="<?=$rowPhoto->pho_nom?>" width="400" height="341">
        <?php
            }
            else 
            {
            ?>
                    <img  src="annexes/photos/photoDefaut/defaut.jpg "  alt="defaut.jpg">

            <?php
            }
        


        }
        ?>
        


    
    <div class="form-group">
        <label for="photo"> Téléchargement de la /des photo(s) :</label>
        <input type="file"  id="photoID" class="form-control-file" name="fichier[]" >
        <input type="file"  id="photoID" class="form-control-file" name="fichier[]" >
        <input type="file"  id="photoID" class="form-control-file" name="fichier[]" >
    </div>

    <!-- bouton submit -->
    <input class="btn btn-primary" id = " idEnvoyer " type="submit" value="Modifier">
    <a class="btn" href="detail.php?an_id=<?=$annonces ->an_id?>">Retour</a>
</form> 
<br>
<?php
    include("pieddepage.php");

?>