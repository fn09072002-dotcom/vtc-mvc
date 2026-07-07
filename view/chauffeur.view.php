<?php
/**
 * Vue Chauffeur — mode console.
 */
function afficherVueChauffeur(string $mode, array $donnees = []): void
{
    echo "=== Espace Chauffeur ===" . PHP_EOL;
    if ($mode === "proposition") {
        $course = $donnees['course'];
        echo "Nouvelle course proposée — Course #{$course['id']}" . PHP_EOL;
        echo "Départ    : {$course['adresse_depart']}" . PHP_EOL;
        echo "Arrivée   : {$course['adresse_arrivee']}" . PHP_EOL;
        echo "Distance  : {$course['distance_km']} km" . PHP_EOL;
        echo "Montant   : {$course['montant_total']} FCFA" . PHP_EOL;
        echo "Statut    : {$course['statut']}" . PHP_EOL;
    } elseif ($mode === "course_acceptee") {
        $course = $donnees['course'];
        $chauffeur = $donnees['chauffeur'];
        echo "Course #{$course['id']} acceptée - statut : {$course['statut']}" . PHP_EOL;
        echo "Chauffeur assigné : {$chauffeur['nom']} ({$chauffeur['telephone']})" . PHP_EOL;
    }
}
