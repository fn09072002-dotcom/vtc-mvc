<?php
/**
 * "Modèle" Chauffeur :
 * ['id' => int, 'nom' => string, 'telephone' => string, 'statut' => 'Disponible'|'En course']
 */

function creerChauffeur(int $id, string $nom, string $telephone): array
{
    return [
        'id' => $id,
        'nom' => $nom,
        'telephone' => $telephone,
        'statut' => 'Disponible',
    ];
}

function chauffeurEstDisponible(array $chauffeur): bool
{
    return $chauffeur['statut'] === 'Disponible';
}
