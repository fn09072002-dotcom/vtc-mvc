<?php
require_once __DIR__ . "/../model/passager.model.php";
require_once __DIR__ . "/../model/course.model.php";

function &db(): array
{
    static $data = null;
    if ($data === null) {
   $data = [
    'passagers' => [],
    'chauffeurs' => [],
    'courses' => [],
    'paiements' => [],
    'notifications' => [],
    'compteurs' => ['passager' => 0, 'chauffeur' => 0, 'course' => 0, 'paiement' => 0],
];
    }
    return $data;
}

function prochainId(string $cle): int
{
    $data = &db();
    $data['compteurs'][$cle]++;
    return $data['compteurs'][$cle];
}

function initialiserDonneesDemo(): void
{
    $data = &db();
    if (count($data['passagers']) > 0) return;

    $data['passagers'][1] = creerPassager(1, 'Diop', 'Moussa', 'moussa.diop@mail.com', '77 123 45 67');
    $data['compteurs']['passager'] = 1;
}

/* --- Recherche : courses --- */
function trouverCourse(int $id): ?array
{
    $data = &db();
    return $data['courses'][$id] ?? null;
}

function enregistrerCourse(array $course): void
{
    $data = &db();
    $data['courses'][$course['id']] = $course;
}

/* --- Système GPS (RG2 du scenario 1) : simule le calcul de distance --- */
function calculerDistanceGPS(string $adresseDepart, string $adresseArrivee): float
{
    // Simulation : distance aleatoire realiste entre 1 et 15 km
    return round(mt_rand(10, 150) / 10, 1);
}

/* --- Système de Notification --- */
function notifier(string $destinataire, string $message): void
{
    echo "[NOTIFICATION -> {$destinataire}] {$message}" . PHP_EOL;
}

function trouverChauffeur(int $id): ?array
{
    $data = &db();
    return $data['chauffeurs'][$id] ?? null;
}

function courseEstDisponible(array $course): bool
{
    return $course['statut'] === 'En recherche';
}

function associerChauffeur(int $idCourse, int $idChauffeur): void
{
    $data = &db();
    $data['courses'][$idCourse]['chauffeur_id'] = $idChauffeur;
    $data['courses'][$idCourse]['statut'] = 'Chauffeur en route';
    $data['chauffeurs'][$idChauffeur]['statut'] = 'En course';
}

function notifierPassager(int $idPassager, string $message): void
{
    $data = &db();
    $data['notifications'][] = [
        'destinataire_id' => $idPassager,
        'message' => $message,
    ];
    echo "[Notification -> Passager#$idPassager] $message\n";
}

