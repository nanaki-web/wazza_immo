<?php
// convertImage('annexes/original/1-1.jpeg','annexes/redimensionner/1-1.jpeg','900','1200',100);

function convertImage($source,$dst,$width,$height,$quality)
{
    // [0]===>width, [1]=>height
    $imageSize = getimagesize($source);

    $imageRessource = imagecreatefromjpg($source);

    $imageFinal = imagecreatetruecolor($width,$height);

    $final = imagecopyresampled($imageFinal,$imageRessource,0,0,0,0,$width,$height,$imageSize[0],$imageSize[1]);

    imagejpeg($imageFinal,$dst,$quality);
}
// ---------------------------------------------------------------------------------------
// fonction de redimensionnement A L'AFFICHAGE
// ---------------------------------------------------------------------------------------
// La FONCTION : fctaffichimage($img_Src, $W_max, $H_max)
// Les parametres :
// - $img_Src : URL (chemin + NOM) de l image Source
// - $W_max : LARGEUR maxi finale ----> ou 0 : largeur libre
// - $H_max : HAUTEUR maxi finale ----> ou 0 : hauteur libre
// ---------------------------------------------------------------------------------------
// Affiche : src="..." width="..." height="..." pour la balise img
// Utilisation :
// <img alt="" <?php fctaffichimage('repimg/monimage.jpg', 120, 100) 
// ---------------------------------------------------------------------------------------
function fctaffichimage($img_Src, $W_max, $H_max) {
 if (file_exists($img_Src)) {
   // ----------------------------------------------------
   // Lit les dimensions de l'image source
   $img_size = GetImageSize($img_Src);
   $W_Src = $img_size[0]; // largeur source
   $H_Src = $img_size[1]; // hauteur source
   // ----------------------------------------------------
   if(!$W_max) { $W_max = 0; }
   if(!$H_max) { $H_max = 0; }
   // ----------------------------------------------------
   // Teste les dimensions tenant dans la zone
   $W_test = round($W_Src * ($H_max / $H_Src));
   $H_test = round($H_Src * ($W_max / $W_Src));
   // ----------------------------------------------------
   // si l image est plus petite que la zone
   if($W_Src<$W_max && $H_Src<$W_max) {
      $W = $W_Src;
      $H = $H_Src;
   // sinon si $W_max et $H_max non definis
   } elseif($W_max==0 && $H_max==0) {
      $W = $W_Src;
      $H = $H_Src;
   // sinon si $W_max libre
   } elseif($W_max==0) {
      $W = $W_test;
      $H = $H_max;
   // sinon si $H_max libre
   } elseif($H_max==0) {
      $W = $W_max;
      $H = $H_test;
   // sinon les dimensions qui tiennent dans la zone
   } elseif($H_test > $H_max) {
      $W = $W_test;
      $H = $H_max;
   } else {
      $W = $W_max;
      $H = $H_test;
   }
   // ----------------------------------------------------
 } else { // si le fichier image n existe pas
      $W = 0;
      $H = 0;
 }
 // ----------------------------------------------------
 // AFFICHE les dimensions optimales
 echo ' src="'.$img_Src.'" width="'.$W.'" height="'.$H.'"';
}
// Affiche : src="..." width="..." height="..." pour la balise img
// ---------------------------------------------------------------------------------------
?>