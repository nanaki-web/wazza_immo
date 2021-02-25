<?php 
// tu récupere la librairie qui se trouve dans vendor => autoload.php
//recupere la librairie
require __DIR__ . "/../vendor/autoload.php";
// je vais chercher le fichier de bdd 
require __DIR__ . '/../connexion_bdd.php';

// tu fait l'execution du script
echo "Demarrage de faker pour annonces";
$db = connexionBase();

$faker = Faker\Factory::create('fr_FR');

for ($i = 0; $i < 5; $i++) {
    //les champs de bdd
    
    $name = $faker->firstName;

    // tableau des divers informations
    $annonces = [
        ':an_title' => $name
    ];
    // Requete Insert
    $requeteInsert = $db->prepare('INSERT INTO annonces (an_title) values (:an_title)');
    // execute requete
    $requeteInsert->execute($annonces);
}
echo "Fin du programme \n";
