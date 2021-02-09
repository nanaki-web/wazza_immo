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

<br />
<div class="span10 offset1">

    <br />
    <div class="row">

    <br />
    <h3>Delete a user</h3>
    <p>

    </div>
    <p>


    <br />
    <form class="form-horizontal" action="" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>"/>

        Are you sure to delete ?

        <br />
        <div class="form-actions">
        <button type="submit" class="btn btn-danger">Yes</button>
        <a class="btn" href="index.php">No</a>
        </div>
    <p>

    </form>
    <p>
</div>
<p>