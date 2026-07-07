<?php
$GLOBALS['ERREURS'] = [
    'CHAMP_REQUIS'          => "Ce champ est requis.",
    'COURSE_INTROUVABLE'    => "Course introuvable.",
    'PASSAGER_INTROUVABLE'  => "Passager introuvable.",
    'CHAUFFEUR_INTROUVABLE' => "Chauffeur introuvable.",
    'CHAUFFEUR_INDISPONIBLE'=> "Ce chauffeur n'est plus disponible.",
    'STATUT_INVALIDE'       => "Cette course n'a pas le statut requis pour cette action.",
    'TRANSACTION_REFUSEE'   => "Transaction bancaire refusée.",
];

function erreur(string $cle): void
{
    echo "ERREUR : " . $GLOBALS['ERREURS'][$cle] . PHP_EOL;
    exit(1);
}
