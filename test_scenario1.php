<?php


require_once __DIR__ . "/controller/passager.controller.php";

initialiserDonneesDemo();

echo "=== Commander une course ===" . PHP_EOL;

echo "Adresse de depart : ";
$adresseDepart = trim(readline());

echo "Adresse d'arrivee : ";
$adresseArrivee = trim(readline());

$_POST = [
    'passager_id' => 1,
    'adresse_depart' => $adresseDepart,
    'adresse_arrivee' => $adresseArrivee,
];

commanderCourseAction();
