<?php
$utilisateur_id = $_GET['id'];
$token = $_GET['token'];
require 'connexion_bdd.php';
$pdoStat = $db ->prepare("SELECT confirmation_token 
                FROM utilisateurs
                WHERE id = ? ");
$pdoStat->execute[$utilisateur_id];
$utilisateur = $pdoStat->fecht();

if($utilisateur && $utilisateur['confirmation_token']== $token )
{
    die ("ok");
}
else
{
    die('pas ok');
}
