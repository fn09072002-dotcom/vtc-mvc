<?php
require_once __DIR__ . "/error.php";

function valider_champs_requis(array $donnees, array $champs): void
{
    foreach ($champs as $champ) {
        if (!isset($donnees[$champ]) || $donnees[$champ] === "") {
            erreur('CHAMP_REQUIS');
        }
    }
}
