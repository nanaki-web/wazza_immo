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
        
        // On met les types autorisés dans un tableau (ici pour une image)
        // $aMimeTypes = array( "image/jpeg", "image/png", "image/x-png");
        

        
        // var_dump($extension);
        if (in_array($extension, $aMimeTypes))
        {
            if(file_exists ($fichier))
            {
                unlink($fichier);
            }
        }

    }

}
header("Location: modification.php?an_id=$an_id");//revois sur modification.php l'id de l'annonce

