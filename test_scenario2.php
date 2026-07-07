<?php
require_once __DIR__ . "/controller/chauffeur.controller.php";
require_once __DIR__ . "/model/chauffeur.model.php";
require_once __DIR__ . "/model/course.model.php";

initialiserDonneesDemo();

// Prépare un chauffeur et une course "En recherche" pour pouvoir tester
// (chaque exécution du script repart de zéro, il n'y a pas de persistance entre deux lancements)
$data = &db();

$idChauffeur = prochainId('chauffeur');
$data['chauffeurs'][$idChauffeur] = creerChauffeur($idChauffeur, 'Awa Ndiaye', '77 987 65 43');

$idCourse = prochainId('course');
$distance = 5.0;
$montant = estimerPrix($distance);
$data['courses'][$idCourse] = creerCourse($idCourse, 1, 'Plateau', 'Ouakam', $distance, $montant);

echo "=== Accepter une course ===" . PHP_EOL;
echo "Chauffeur de test créé : #{$idChauffeur} ({$data['chauffeurs'][$idChauffeur]['nom']})" . PHP_EOL;
echo "Course de test créée   : #{$idCourse} ({$data['courses'][$idCourse]['adresse_depart']} -> {$data['courses'][$idCourse]['adresse_arrivee']})" . PHP_EOL;
echo PHP_EOL;

echo "ID du chauffeur qui accepte : ";
$chauffeurId = trim(readline());
echo "ID de la course à accepter : ";
$courseId = trim(readline());

$_POST = [
    'chauffeur_id' => $chauffeurId,
    'course_id' => $courseId,
];
accepterCourseAction();
