<?php
/**
 * Vue Passager — mode console.
 */

function afficherVuePassager(string $mode, array $donnees = []): void
{
    echo "=== Espace Passager ===" . PHP_EOL;

    if ($mode === "course_creee") {
        $course = $donnees['course'];
        echo "Course #{$course['id']} enregistree - statut : {$course['statut']}" . PHP_EOL;
        echo "Trajet : {$course['adresse_depart']} -> {$course['adresse_arrivee']}" . PHP_EOL;
        echo "Distance estimee : {$course['distance_km']} km" . PHP_EOL;
        echo "Prix estime : {$course['montant_total']} FCFA" . PHP_EOL;
    }
}
