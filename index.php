<?php

require_once "stagiaireformation.php";
// stagiaire.php inclus la class Stagaire et la class Formation 

$stagiaire1 = new Stagiaire("Alice", 15.5);
$stagiaire2 = new Stagiaire("Bob", 13.8);
$stagiaire3 = new Stagiaire("Charlie", 16.2);

$stagiaires = [$stagiaire1, $stagiaire2, $stagiaire3];
$formation = new Formation("Formation PHP", 5, $stagiaires);

echo "Moyenne de la formation : " . $formation->calculerMoyenneFormation() . "\n";
echo "Index du stagiaire avec la meilleure moyenne : " . $formation->getIndexMax() . "\n";
$formation->afficherNomMax();
$formation->afficherMinMax();
$formation->trouverMoyenneParNom("Bob");
$formation->trouverMoyenneParNom("David");

?>