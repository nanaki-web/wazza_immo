<?php
session_start();
  // require("function.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>

<!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Wazza immo</title>
</head>
<body>
<div class="container-fluid">
  <!-- navigation-->
  <!-- Image and text -->
  
  <nav class="navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand" href="#">
        <img src="annexes/wazaa_logo.png" width="40" height="40" class="d-inline-block align-top " alt="" loading="lazy">
        Wazaa Immo
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav  ">
            <li class="nav-item ">
              <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="apropos.php">A propos de nous </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="enregistrer.php">S'inscrire </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="connection.php">Se connecter </a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="clients.php">La liste des clients  </a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
      </div>
      <?php
      if(isset ($_SESSION['messageid']))
      {
        ?>
        <div class ="row">
        <div><?php  echo $_SESSION['messageid'] ?></div>
          <a class="btn btn-danger" href="deconnexion.php" role="button">Déconnexion</a>
        </div>
        <?php
      }
      ?>
    </nav>
    