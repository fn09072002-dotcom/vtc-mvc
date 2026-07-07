<?php


function creerCourse(int $id, int $passagerId, string $adresseDepart, string $adresseArrivee, float $distanceKm, float $montantTotal): array
{
    return [
        'id' => $id,
        'passager_id' => $passagerId,
        'chauffeur_id' => null,
        'adresse_depart' => $adresseDepart,
        'adresse_arrivee' => $adresseArrivee,
        'distance_km' => $distanceKm,
        'montant_total' => $montantTotal,
        'statut' => 'En recherche',
        'date' => date('Y-m-d H:i:s'),
    ];
}


function estimerPrix(float $distanceKm): float
{
    $prixBase = 500;
    $prixParKm = 300;
    return $prixBase + ($distanceKm * $prixParKm);
}

function changerStatutCourse(array &$course, string $nouveauStatut): void
{
    $course['statut'] = $nouveauStatut;
}
