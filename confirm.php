<?php
$utilisateur_id = $_GET['id'];
$token = $_GET['token'];
require 'connexion_bdd.php';
$db = connexionBase();
$pdoStat = $db ->prepare("SELECT confirmation_token 
                FROM utilisateurs
                WHERE id = ? ");
$pdoStat->execute[$utilisateur_id];
$utilisateur = $pdoStat->fetch();

if($utilisateur && $utilisateur['confirmation_token']== $token )
{
    die ("ok");
}
else
{
    die('pas ok');
}
// sessionStart();

// $user_id = $_GET['id'];
// $token = $_GET['token'];

// require_once __DIR__. '/../../include/db.php';
// $req = $pdo->prepare('SELECT * FROM client WHERE
//     id = :id AND email_token = :token AND register_at >= DATE_SUB(now(), INTERVAL 1 HOUR)');
// $req->execute([
//     ':id' => $user_id,
//     ':token' => $token
// ]);
// $user = $req->fetch();

// if ($user) {
//     $pdo->prepare('UPDATE client SET email_token = NULL, connection_at = NOW()  WHERE id = ?')->execute([$user_id]);
//     $_SESSION['flash']['success'] = 'Votre compte a bien été activer';
//     $_SESSION['auth'] = $user;
//     header('Location: /account');
// }else{
//     $_SESSION['flash']['danger'] = "Ce token n'est plus valide";
//     header('Location: /login');
// }
// exit();