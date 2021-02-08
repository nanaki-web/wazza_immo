<?php
session_start();
require 'connexion_bdd.php';
$db = connexionBase();
include ('entete.php');
?>
<!-- barre ajout de client  -->
<div class="row shadow mt-3 mb-3 mx-0 p-3 rounded bg-dark">
  <div class="col-md-2 text white-50 text-right"></div>
    <div class="col-md-8 h2 text-white-50 text-center">L'ajout de client</div>
        <div class="col-2 text-center"></div>
</div>
<!-- *********************** formulaire************************************************************************* -->
<form method = "POST" action = "clientsAjoutScript.php">
    <div class="form-group">
            <label  for="nom">Nom</label>
            <input type="text" name="nom" class="form-control">
            <?php 
            if (isset($_SESSION['errors']))
            {
            if (isset($_SESSION['errors']['nom']))
            {
                echo "<div class='alert alert-danger'>";
                echo $_SESSION['errors']['nom'];
                echo "</div>";
                unset($_SESSION['errors']);
                //unset supprime ou enleve l'élément du tableau .
            
            }
            }
            ?>
    </div> 
    <div class="form-group">
    
            <label  for="prenom">Prenom</label>
            <input type="text" name="prenom" class="form-control">
            <?php
            if (isset($_SESSION['errors']))
            {
            if (isset($_SESSION['errors']['prenom']))
            {
                echo "<div class='alert alert-danger'>";
                echo $_SESSION['errors']['prenom'];
                echo "</div>";
                
                unset($_SESSION['errors']);//unset supprime ou enleve l'élément du tableau .
            
            }
            }
            ?>
    </div> 
    <div class="form-group">
    
            <label  for="adresse" >Adresse</label>
            <input type="text" name="adresse" class="form-control">
            <?php
            if (isset($_SESSION['errors']))
            {
            if (isset($_SESSION['errors']['adresse']))
            {
                echo "<div class='alert alert-danger'>";
                echo $_SESSION['errors']['adresse'];
                echo "</div>";
                
                unset($_SESSION['errors']);//unset supprime ou enleve l'élément du tableau .
            
            }
            }
            ?>
    </div> 
    <div class="form-group">
            <label  for="codePostal">Code postale</label>
            <input type="text" name="codePostal" class="form-control">
            <?php
            if (isset($_SESSION['errors']))
            {
            if (isset($_SESSION['errors']['codePostal']))
            {
                echo "<div class='alert alert-danger'>";
                echo $_SESSION['errors']['codePostal'];
                echo "</div>";
                
                unset($_SESSION['errors']);//unset supprime ou enleve l'élément du tableau .
            
            }
            }
            ?>
    </div>
    <div class="form-group">
            <label  for="ville">ville</label>
            <input type="text" name="ville" class="form-control">
            
            <?php
            if (isset($_SESSION['errors']))
            {
            if (isset($_SESSION['errors']['ville']))
            {
                echo "<div class='alert alert-danger'>";
                echo $_SESSION['errors']['ville'];
                echo "</div>";
                
                unset($_SESSION['errors']);//unset supprime ou enleve l'élément du tableau .
            
            }
            }
            ?>
    </div>
    <div class="form-group">
            <label  for="telephone">téléphone</label>
            <input type="text" name="telephone" class="form-control">
            
            <?php
            if (isset($_SESSION['errors']))
            {
            if (isset($_SESSION['errors']['telephone']))
            {
                echo "<div class='alert alert-danger'>";
                echo $_SESSION['errors']['telephone'];
                echo "</div>";
                
                unset($_SESSION['errors']);//unset supprime ou enleve l'élément du tableau .
            
            }
            }
            ?>
    </div>
    <div class="form-group">
            <label  for="email">email</label>
            <input type="text" name="email" class="form-control">
            
            <?php
            if (isset($_SESSION['errors']))
            {
            if (isset($_SESSION['errors']['email']))
            {
                echo "<div class='alert alert-danger'>";
                echo $_SESSION['errors']['email'];
                echo "</div>";
                
                unset($_SESSION['errors']);//unset supprime ou enleve l'élément du tableau .
            
            }
            }
            ?>
    </div>
    <div class="form-group">
            <label  for="metier">Métier</label>
            <input type="text" name="metier" class="form-control">
            
    <?php
    if (isset($_SESSION['errors']))
    {
    if (isset($_SESSION['errors']['metier']))
    {
        echo "<div class='alert alert-danger'>";
        echo $_SESSION['errors']['metier'];
        echo "</div>";
        
        unset($_SESSION['errors']);//unset supprime ou enleve l'élément du tableau .
    
    }
    }
    ?>
    </div>
    <div class="form-group">
            <label for="commentaire">commentaire</label>
            <textarea type="text" name="commentaire" class="form-control"></textarea>
            <?php
    if (isset($_SESSION['errors']))
    {
    if (isset($_SESSION['errors']['commentaire']))
    {
        echo "<div class='alert alert-danger'>";
        echo $_SESSION['errors']['commentaire'];
        echo "</div>";
        
        unset($_SESSION['errors']);//unset supprime ou enleve l'élément du tableau .
    
    }
    }
    ?>
    </div>


    <div class="form-actions">
                 <input type="submit" class="btn btn-success" name="submit" value="Ajouter">
                 <a class="btn" href="clients.php">Retour</a>
    </div>
</form>
<p>
<!-- *************************************fin formulaire*********************************************************** -->
<?php
include('pieddepage.php');
?>
</p>







