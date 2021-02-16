<?php
require 'connexion_bdd.php';
$db = connexionBase();
include ('entete.php');
require_once("function.php");
$id=0; 
if(!empty($_GET['id']))
{ 
    $id=$_REQUEST['id']; 
} 
if(!empty($_POST))
{ 
    $id= $_POST['id'];
    $pdoStat = $db -> prepare("DELETE 
                                FROM clients 
                                WHERE id = ?") ;
    $pdoStat->execute(array($id));


    header("Location: clients.php");
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
        <input type="hidden" name="id" value="<?php echo $id;?>"/>

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
