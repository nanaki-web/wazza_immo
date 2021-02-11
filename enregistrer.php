<?php 
session_start();
include("entete.php");
?>

<H1>S'inscrire</H1>


<p><span class="error">remplir tout les champs </span></p>

<!-- session pour les messages d'erreur sur la page -->
<?php
if(array_key_exists('errors',$_SESSION)):?>
  <div class="alert alert-danger">
    <?= implode('<br>',$_SESSION['errors']);?>
  </div>
<?php unset($_SESSION['errors']); endif;?>



<p><span class="validation"></span></p>
<?php
if(array_key_exists('compte',$_SESSION)):?>
  <div class="alert alert-danger">
    <?= implode('<br>',$_SESSION['compte']);?>
  </div>
<?php unset($_SESSION['compte']); endif;?>



<!-- ****************************formulaire********************************************************* -->
<form action="enregistrerScript.php" method ="POST">
    <div class="form-group">
        <label for="">Nom</label>
        <input type="text" name="nom" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Prénom</label>
        <input type="text" name="prenom"class="form-control" >
    </div>
    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Mot de passe</label>
        <input type="password" name="mdp" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Confirmez votre mot de passe</label>
        <input type="password" name="mdpConfirmer" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">M'inscrire</button>

</form>









<?php
    include("pieddepage.php");
?>