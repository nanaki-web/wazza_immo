<?php
    include ("entete.php");
?>

<div class="col-12 col-md-12" >
    <p>Ces zones sont obligatoires*</p>
    <p style= "color:red;" id ="erreur"></p>
        <h1>Coordonnée</h1>
        <form action="" method="POST" id= "contact">
        <div class="form-group">
            <label for="nom">Nom*</label>                  
                <input type="text" name="nom" class="form-control" id="nom" placeholder="Veuillez saisir votre nom" >           
                <small></small>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom*</label>                  
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Veuillez saisir votre prénom" >           
                <small></small>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse*</label>                  
                <input type="text" name="adresse" class="form-control" id="adresse" placeholder="Veuillez saisir votre adresse" >           
                <small></small>
        </div>

        <div class="form-group">
            <label for="postal">Code Postale*</label>                  
                <input type="text" name="postal" class="form-control" id="postal" placeholder="Veuillez saisir votre code postale" >           
                <small></small>
        </div>

        <div class="form-group">
            <label for="ville">ville*</label>                  
                <input type="text" name="ville" class="form-control" id="ville" placeholder="Veuillez saisir votre ville" >           
                <small></small>
        </div>

        <div class="form-group">
            <label for="tel">Téléphone*</label>                  
                <input type="text" name="tel" class="form-control" id="tel" placeholder="Veuillez saisir votre téléphone" >           
                <small></small>
        </div>
        <div class="form-group">
            <label for="email">Email*</label>                  
                <input type="text" name="email" class="form-control" id="email" placeholder="Veuillez saisir votre email" >           
                <small></small>
        </div>

        <h1>Votre demande</h1>
        <div class="form-group">
            <label for="sujet">Sujet</label>
                <select class="form-control" id="sujet">
                    <option>Veuillez séléctionner un sujet</option>
                    <option>L'achat d'un bien</option>
                    <option>La vente/l'estimation d'un bien</option>
                    <option>location d'un bien</option>
                    <option>Autres</option>
                </select>
        </div>
        <div class="form-group">
            <label for="question">Votre question*:</label>
                <textarea class="form-control" name="question" id="question" rows="3" ></textarea>
                <small></small>
        </div>
        <div class="form-check">
              <input class="form-check-input" type="checkbox"name="cgu"  id="cgu">
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

        