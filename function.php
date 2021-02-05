<?php
//fonction pour débugger les variables 
//la fonction prend la variable que je souhaite debugger
function debug($variable)
{
    //affiche la balise <pre></pre> et le print_r n'affiche pas toute suite la variable mais la retourne 
    echo '<pre>'.print_r($variable,true).'</pre>';
}
