<?php
function render(string $vue, array $donnees = []): void
{
    $mode = $donnees['mode'];
    if ($vue === "passager.view.php") {
        afficherVuePassager($mode, $donnees);
    } elseif ($vue === "chauffeur.view.php") {
        afficherVueChauffeur($mode, $donnees);
    }
}
