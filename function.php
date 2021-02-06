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
