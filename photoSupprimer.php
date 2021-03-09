<?php
require('connexion_bdd.php');
$db = connexionBase();
$an_id=$_POST['an_id'];//récupération de l'identifiant envoyé en méthode POST

// var_dump($_POST);

if(!empty($_POST['an_id']))
{
    
    $an_id=$_POST['an_id'];//récupération de l'identifiant envoyé en méthode POST
    
}

$photoChechBox = $_POST['photo'] ?? 0;
// var_dump($photoChechBox);

// affichage des images
$request = $db->prepare("SELECT pho_nom, pho_id, an_id FROM photo where an_id = :an_id");
$request->bindValue(':an_id',$an_id,PDO::PARAM_INT);
$resultPhoto = $request->execute();
$photos = $request->fetchAll();

var_dump($request);
var_dump($resultPhoto);
var_dump($photoChechBox);
//while($rowPhoto = $request->fetch(PDO::FETCH_OBJ))
$photoChechBoxesNames = [];//pour mettre toute les photos qu'on a supprimé.
foreach($photos as $newPhoto)
{
    if(in_array($newPhoto->pho_id,$photoChechBox))
    {
        // var_dump($newPhoto);
        $photoChechBoxesNames[] = $newPhoto->pho_nom;
        $request = $db->prepare("DELETE FROM photo WHERE pho_id = :pho_id");
        $request->bindValue(':pho_id',$newPhoto->pho_id, PDO::PARAM_INT);
        $resultDelete = $request->execute();
        unset($newPhoto); // Détruit la référence sur le dernier élément
    }
}
// var_dump($photoChechBox);
suppression("annexes/photos/annonce_".$an_id ,$photoChechBoxesNames);
$dossier_traite = "annexes/photos/annonce_".$an_id;


function suppression($dossier_traite ,$fileNames)
{
    $repertoire =opendir($dossier_traite); //On définit le répertoire dans lequel on souhaite travailler.
    var_dump($dossier_traite);
    var_dump($repertoire);
    // var_dump($fileName);
    //!==Cet opérateur permet non seulement de comparer la valeur de retour à false (cas d'échec de la fonction readdir) mais aussi les types.
    while (false !== ($fichier = readdir($repertoire))) // On ouvre chaque fichier du répertoire dans la boucle.
    {// On lance notre boucle qui ouvrira les fichiers un par un.
       $chemin = $dossier_traite."/".$fichier;// On définit le chemin du fichier à effacer.
    //    var_dump($fichier); 
        // Les variables qui contiennent toutes les infos nécessaires.
        $infos = pathinfo($chemin);
        $fileName = $infos['filename'];
        // var_dump($fileName);
        // var_dump($fileNames);
        if(in_array($fileName,$fileNames))
        {
            unlink($chemin);// On efface.
        }
    }
    closedir($repertoire); // On ferme !// Ne pas oublier de fermer le dossier ***EN DEHORS de la boucle*** ! Ce qui évitera à PHP beaucoup de calculs et des problèmes liés à l'ouverture du dossier


}


header("Location:modification.php?an_id=$an_id");//revois sur modification.php l'id de l'annonce

