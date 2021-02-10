<?php
session_start();
include ('entete.php');
?>
<H1>Se connecter</H1>
<p><span class="error">remplir tout les champs </span></p>
<?php
if(array_key_exists('errors',$_SESSION)):?>
  <div class="alert alert-danger">
    <?= implode('<br>',$_SESSION['errors']);?>
  </div>
<?php unset($_SESSION['errors']); endif;?>

<form action="connectionScript.php" method ="POST">

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="emailconnect" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Mot de passe</label>
        <input type="password" name="mdpconnect" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Se connecter</button>

</form>