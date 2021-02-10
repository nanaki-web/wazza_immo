<?php
//fonction pour débugger les variables 
//la fonction prend la variable que je souhaite debugger
function debug($variable)
{
    //affiche la balise <pre></pre> et le print_r n'affiche pas toute suite la variable mais la retourne 
    echo '<pre>'.print_r($variable,true).'</pre>';
}
//donne une clé aléatoire de 60 caractere
function str_random ($taille)
{
    $alphabet = "0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
    return substr(str_shuffle(str_repeat($alphabet,$taille)),0,$taille);
}

?>
<script>

//vérifie si on envoit ou non le formulaire à "script_modif.php"
function verif(){ 

    //Rappel : confirm() -> Bouton OK et Annuler, renvoit true ou false
    var resultat = confirm("Etes-vous certain de vouloir modifier cet enregistrement ?");

    //alert("retour :"+ resultat);

    if (resultat==false){

    alert("Vous avez annulé les modifications \nAucune modification ne sera apportée à cet enregistrement !");

    //annule l'évènement par défaut ... SUBMIT vers "script_modif.php"
    event.preventDefault();    

    }

    
}

</script>
