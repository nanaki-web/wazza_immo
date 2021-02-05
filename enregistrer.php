<?php 
include("entete.php");
?>
<H1>S'inscrire</H1>
if(isset())
<?php if(!empty($errors)): ?>
<div class ="alert alert-danger">
    <p>Vous n'avez pas remplir le formulaire correctement</p>
    <ul>
    <?php foreach($errors as $error): ?>
        <li><?= $error; ?></li>
    <?php endforeach; ?>
    </ul>
</div>
 <?php endif; ?> 


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