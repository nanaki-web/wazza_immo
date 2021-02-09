<?php
include ("entete.php");
require('connexion_bdd.php');
$db = connexionBase();
?>


<div class="row shadow mt-3 mb-3 mx-0 p-3 rounded bg-dark">
  <div class="col-md-2 text white-50 text-right"></div>
    <div class="col-md-8 h2 text-white-50 text-center">La liste des clients</div>
        <div class="col-2 text-center"></div>
</div>

<div class="row">
                
                <p>
                    <a href="clientsAjout.php" class="btn btn-success">Ajouter un client</a>
                    <a href="" class="btn btn-danger">Deconnexion</a>
                </p>
                
</div>
<br />
<div class="table-responsive">

<br />
<table class="table table-hover table-bordered">

<br />
<thead>


<th>nom</th>
<p>
<th>prenom</th>
<p>
<th>adresse</th>
<p>
<th>code_postale</th>
<p>
<th>ville</th>
<p>
<th>téléphone</th>
<p>
<th>métier</th>
<p>
<th>commentaire</th>
<p>
<th>Edition</th>
<p>
</thead>
<p>
<br />
<tbody>
<?php
$requete = 'SELECT * 
        FROM clients  
        ORDER BY nom 
        DESC';
$result = $db -> query($requete);
while($row = $result->fetch(PDO::FETCH_OBJ))
{
  echo '<tr>';
  echo '<td>'.$row->nom.'</td>';
  echo'<td>'.$row->prenom.'</td>';
  echo'<td>'.$row->adresse.'</td>';
  echo'<td>'.$row->code_postale.'</td>';
  echo'<td>'.$row->ville.'</td>';
  echo'<td>'.$row->telephone.'</td>';
  echo'<td>'.$row->metier.'</td>';
  echo'<td>'.$row->commentaire.'</td>';
  echo '<p>';
  echo'<td>'.'<a class = "btn" href= "" >Read</a>'.'</td>';
  echo'<td>'.'<a class = "btn btn-success" href ="clientsmodifier.php?id=' . $row->id .'" >Modifier</a>'.'</td>';
  echo'<td>'.'<a class = "btn btn-danger" href = "clientsSupprimer.php?id='. $row->id.'" >supprimer</a>'.'</td>';
  echo '</p>';
  echo '</tr>';
}
?>




</tbody>
</table>
</div>
<?php


?>




<?php
include ("pieddepage.php");
?>