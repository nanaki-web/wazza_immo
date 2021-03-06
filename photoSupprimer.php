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


// var_dump($request);
// var_dump($resultPhoto);

while($rowPhoto = $request->fetch(PDO::FETCH_OBJ))
{
   
    if(in_array($rowPhoto->pho_id,$photoChechBox))//recherche un element dasn le tableau $photoChechBox
    {
        $request = $db->prepare("DELETE FROM photo WHERE pho_id = :pho_id");
        $request->bindValue(':pho_id',$rowPhoto->pho_id, PDO::PARAM_INT);
        $resultDelete = $request->execute();
        
        
        

        
        

        // var_dump($extension);
    //     if (in_array($extension, $aMimeTypes))
    //     {
    //         if(file_exists ($fichier))
    //         {
    //             unlink($fichier);
    //         }
    //     }

    // }

    }

}

suppression("annexes/annonce_".$an_id , "jpg");
$dossier_traite = "annexes/annonce_".$an_id;

function suppression($dossier_traite , $extension_choisie)
{
    $repertoire =opendir($dossier_traite); //On définit le répertoire dans lequel on souhaite travailler.
    //!==Cet opérateur permet non seulement de comparer la valeur de retour à false (cas d'échec de la fonction readdir) mais aussi les types.
    while (false !== ($fichier = readdir($repertoire))) // On lit chaque fichier du répertoire dans la boucle.
    {// On lance notre boucle qui lira les fichiers un par un.
       $chemin = $dossier_traite."/".$fichier; // On définit le chemin du fichier à effacer.
        // Les variables qui contiennent toutes les infos nécessaires.
        $infos = pathinfo($chemin);
        $extension = $infos['extension'];
        var_dump($extension);
        //si le fichier n'est pas un repertoire
        if ($fichier != ".." AND $fichier != "." AND !is_dir($fichier) AND $extension == $extension_choisie)
        {
        unlink($chemin); // On efface.
        }

    }
    closedir($repertoire); // On ferme !// Ne pas oublier de fermer le dossier ***EN DEHORS de la boucle*** ! Ce qui évitera à PHP beaucoup de calculs et des problèmes liés à l'ouverture du dossier





header("Location: modification.php?an_id=$an_id");//revois sur modification.php l'id de l'annonce

