<?php
    session_start();
    include ("entete.php");
?>

<p><span class="error">*remplir tout les champs </span></p>
<!-- $tErrors -->
<?php $tErrors = $_SESSION['errors'];?> 


<div class="col-12 col-md-12" >
    <p>Ces zones sont obligatoires*</p>
    <p style= "color:red;" id ="erreur"></p>
        <h1>Coordonnée</h1>
        <form action="contact_script" method="POST" id= "contact">
        <div class="form-group 
            <label for="nom">Nom*</label>                  
                <input type="text" name="nom" class="form-control" id="nom" placeholder="Veuillez saisir votre nom" value="<?php echo $_SESSION ['nom'] ?? '';?> "> 
                
                         <?php 
                         if (isset($tErrors))
                         {
                            if (isset($tErrors ['nom']))
                            {
                                 echo "<div class='alert alert-danger'>";
                                echo $tErrors ['nom'] ;
                                echo "</div>";
                                // var_dump($_SESSION);
                                unset($_SESSION['errors']);//unset supprime ou enleve l'élément du tableau .
                                // var_dump($_SESSION);
                            }
                         }
                         ?>
                  
                <small></small>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom*</label>                  
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Veuillez saisir votre prénom" value="<?php echo $_SESSION ['prenom'] ?? '';?> " >
                <?php 
                         if (isset($tErrors))
                         {
                            if (isset($tErrors ['prenom']))
                            {
                                 echo "<div class='alert alert-danger'>";
                                echo $tErrors ['prenom'] ;
                                echo "</div>";
                                unset($_SESSION['errors']);
                            }
                         }
                         ?>
                <small></small>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse*</label>                  
                <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Veuillez saisir votre adresse"value="<?php echo $_SESSION ['adresse'] ?? '';?> "  >  
                <?php
                
                if (isset($tErrors))
                {
                    if (isset($tErrors ['adresse']))
                    {
                        echo "<div class='alert alert-danger'>";
                        echo $tErrors ['adresse'] ;
                        echo "</div>";
                        unset($_SESSION['errors']);
                    }
                }
                ?>     
                <small></small>
        </div>

        <div class="form-group">
            <label for="postal">Code Postale*</label>                  
                <input type="text" name="postal" class="form-control" id="postal" placeholder="Veuillez saisir votre code postale" value="<?php echo $_SESSION ['code_postale'] ?? '';?> " > 
                <?php
                if (isset($tErrors))
                {
                    if (isset($tErrors ['code_postale']))
                    {
                        echo "<div class='alert alert-danger'>";
                        echo $tErrors ['code_postale'] ;
                        echo "</div>";
                        unset($_SESSION['errors']);
                    }
                }
                
                         ?>  
                <small></small>
        </div>

        <div class="form-group">
            <label for="ville">ville*</label>                  
                <input type="text" name="ville" class="form-control" id="ville" placeholder="Veuillez saisir votre ville" value = " <?php echo $_SESSION ['ville'] ?? '';?> " > 
                <?php
                if (isset($tErrors))
                {
                    if (isset($tErrors ['ville']))
                    {
                        echo "<div class='alert alert-danger'>";
                        echo $tErrors ['ville'] ;
                        echo "</div>";
                        unset($_SESSION['errors']);
                    }
                }
                         ?>      
                <small></small>
        </div>

        <div class="form-group">
            <label for="tel">Téléphone*</label>                  
                <input type="text" name="tel" class="form-control" id="tel" placeholder="Veuillez saisir votre téléphone" value = " <?php echo $_SESSION ['telephone'] ?? '';?> "  >   
                <?php
                if (isset($tErrors))
                {
                    if (isset($tErrors ['telephone']))
                    {
                        echo "<div class='alert alert-danger'>";
                        echo $tErrors ['telephone'] ;
                        echo "</div>";
                        unset($_SESSION['telephone']);
                    }
                }
                         ?>         
                <small></small>
        </div>
        <div class="form-group">
            <label for="email">Email*</label>                  
                <input type="text" name="email" class="form-control" id="email" placeholder="Veuillez saisir votre email" value = " <?php echo $_SESSION ['email'] ?? '';?> "   >      
                <?php
                if (isset($tErrors))
                {
                    if (isset($tErrors ['email']))
                    {
                        echo "<div class='alert alert-danger'>";
                        echo $tErrors ['email'] ;
                        echo "</div>";
                        unset($_SESSION['email']);
                    }
                }
                         ?> 
                <small></small>
        </div>

        <h1>Votre demande</h1>
        <div class="form-group">
            <label for="sujet">Sujet</label>
                <select class="form-control" name="sujet" id="sujet" >
                    <option  value = "0">Veuillez séléctionner un sujet</option>
                    <option <?php if (isset($_SESSION ['sujet']) && ($_SESSION ['sujet']) == "L'achat d'un bien") echo "selected"; ?> value = "L'achat d'un bien">L'achat d'un bien</option>
                    <option value = "La vente/l'estimation d'un bien">La vente/l'estimation d'un bien</option>
                    <option value = "location d'un bien">location d'un bien</option>
                    <option value = "Autres">Autres</option>
                </select>
                <?php
                if (isset($tErrors))
                {
                    if (isset($tErrors ['sujet']))
                    {
                        echo "<div class='alert alert-danger'>";
                        echo $tErrors ['sujet'] ;
                        echo "</div>";
                        unset($_SESSION['sujet']);
                    }
                }
                         ?> 
        </div>
        <div class="form-group">
            <label for="question">Votre question*:</label>
                <textarea class="form-control" name="question" id="question" rows="3" ><?php echo $_SESSION ['question'] ?? '';?></textarea>
                <?php
                if (isset($tErrors))
                {
                    if (isset($tErrors ['question']))
                    {
                        echo "<div class='alert alert-danger'>";
                        echo $tErrors ['question'] ;
                        echo "</div>";
                        unset($_SESSION['question']);

                    }
                }
                         ?>
                <small></small>
        </div>
        <div class="form-check">
              <input class="form-check-input" type="checkbox"name="cgu"  id="cgu" value = "cgu"<?php if (isset($_SESSION ['cgu']) && $_SESSION ['cgu'] == "cgu") echo "checked"; ?> >
              <?php
              if (isset($tErrors))
                {
                    if (isset($tErrors ['cgu']))
                    {
                        echo "<div class='alert alert-danger'>";
                        echo $tErrors ['cgu'] ;
                        echo "</div>";
                        unset($_SESSION['cgu']);
                    }
                }
                ?>
              <small></small>
              <label class="form-check-label" for="cgu">J'accepte le traitement informatique de ce formulaire
        </div>    
              </label>

              <!-- bouton envoyer/annuler -->
            <diV class ="form-group">   
          <button type="submit" name="envoyer" value="ok" class="btn btn-dark">Envoyer</button>
          <button type="button" class="btn btn-dark">Annuler</button> 
        </form>  
        </div>

</div>

<?php
    include ("pieddepage.php");
?>

        