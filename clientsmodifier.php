<?php
session_start();
require 'connexion_bdd.php';
$db = connexionBase();
include ('entete.php');




?>
<!-- construction de la requête -->

<?php
if(isset($_GET['id']))
{
    $id=$_GET['id'];//récupération de l'identifiant envoyé en méthode Get --> dans l'URL
}
// construction de la requête
$requete = "SELECT * 
            FROM clients
            where id=".$id;
$result = $db->query($requete);
// récupération du résultat de la requête
$row = $result->fetch(PDO::FETCH_OBJ);
//libère la connection au serveur de BDD
$result->closeCursor();

 ?>
<!-- ***********************Barre modification du client******************************************** -->
<div class="row shadow mt-3 mb-3 mx-0 p-3 rounded bg-dark">
  <div class="col-md-2 text white-50 text-right"></div>
    <div class="col-md-8 h2 text-white-50 text-center">Modification de client</div>
        <div class="col-2 text-center"></div>
</div>

<!-- ********************************        formulaire                **********************************************-->

<form method = "POST" action = "clientsModifierScript.php">
    <div class="form-group">
            <input type="text" name="id" class="form-control" hidden value="<?php echo $row->id ?>"  >



            <label for="nom">Nom</label>
            <input type="text" name="nom" class="form-control" value ="<?php echo $row->nom?>">
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
            <input type="text" name="prenom" class="form-control"value = "<?php echo  $row->prenom;?>">
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
            <input type="text" name="adresse" class="form-control" value ="<?php echo $row->adresse;?>">
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
            <input type="text" name="codePostal" class="form-control" value ="<?php echo $row->code_postale;?>">
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
            <input type="text" name="ville" class="form-control" value = "<?php echo $row->ville;?>">
            
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
            <input type="text" name="telephone" class="form-control" value ="<?php echo $row->telephone;?>">
            
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
            <input type="text" name="email" class="form-control" value ="<?php echo $row->email;?>">
            
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
            <input type="text" name="metier" class="form-control" value ="<?php echo $row->metier;?>">
            
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
            <textarea type="text" name="commentaire" class="form-control"><?php echo $row->commentaire;?></textarea>
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
                <input type="submit" class="btn btn-success" name="submit" value="Modifier">
                <a class="btn" href="clients.php">Retour</a>
    </div>
</form>
<p>
<!-- *************************************fin formulaire*********************************************************** -->
<?php
include('pieddepage.php');
?>
</p>

