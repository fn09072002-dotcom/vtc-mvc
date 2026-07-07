<?php
/**
 * "Modèle" Passager :
 * ['id' => int, 'nom' => string, 'prenom' => string, 'email' => string, 'telephone' => string]
 */

function creerPassager(int $id, string $nom, string $prenom, string $email, string $telephone): array
{
    return [
        'id' => $id,
        'nom' => $nom,
        'prenom' => $prenom,
        'email' => $email,
        'telephone' => $telephone,
    ];
}
