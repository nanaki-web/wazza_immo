<?php
require 'connexion_bdd.php';
$db = connexionBase();
include ('entete.php');
require_once("function.php");
$an_id=0; 
if(!empty($_GET['an_id']))
{ 
    $an_id=$_REQUEST['an_id']; 
} 
if(!empty($_POST))
{ 
    $an_id= $_POST['an_id'];
    $pdoStat = $db -> prepare("DELETE 
                                FROM annonces 
                                WHERE an_id = ?") ;
    $pdoStat->execute(array($an_id));
   

    header("Location: detail.php");
}

?>

<div class= "text-center" >
<div class="span10 offset1">

    <br />
    <div class="row">

    <br />

<h3>Supprimer un client</h3>


    
    <p>

    </div>
    <p>


    <br />
    <form class="form-horizontal" action="" method="post">
        <input type="hidden" name="an_id" value="<?php echo $an_id;?>"/>

        Etes vous sûr de vouloir l'effacer ?

        <br />
        <div class="form-actions">
        <button type="submit" class="btn btn-danger">Oui</button>
        <a class="btn" href="index.php">Non</a>
        </div>
    <p>

    </form>
    <p>
</div>
<p>
</div>
<br />
































<?php
    include("pieddepage.php");

?>
