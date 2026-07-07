<?php
require_once __DIR__ . "/../view/chauffeur.view.php";
require_once __DIR__ . "/../model/chauffeur.model.php";
require_once __DIR__ . "/../model/course.model.php";
require_once __DIR__ . "/../service/service.php";
require_once __DIR__ . "/../utils/validator.php";
require_once __DIR__ . "/../utils/view.utils.php";

function afficherProposition(int $idCourse): void
{
    $course = trouverCourse($idCourse);
    if (!$course) {
        erreur('COURSE_INTROUVABLE');
    }
    render("chauffeur.view.php", ["mode" => "proposition", "course" => $course]);
}

function accepterCourseAction(): void
{
    valider_champs_requis($_POST, ["chauffeur_id", "course_id"]);

    $chauffeur = trouverChauffeur((int) $_POST["chauffeur_id"]);
    if (!$chauffeur) {
        erreur('CHAUFFEUR_INTROUVABLE');
    }

    $course = trouverCourse((int) $_POST["course_id"]);
    if (!$course) {
        erreur('COURSE_INTROUVABLE');
    }

    // RG2 : vérifier que la course est toujours disponible (statut "En recherche")
    if (!courseEstDisponible($course)) {
        erreur('STATUT_INVALIDE');
    }

    // RG3 : associer le chauffeur à la course
    associerChauffeur($course['id'], $chauffeur['id']);
    $course = trouverCourse($course['id']);

    // RG4 : notifier le passager avec les coordonnées du chauffeur
    $message = "Chauffeur en route : {$chauffeur['nom']} ({$chauffeur['telephone']})";
    notifierPassager($course['passager_id'], $message);

    render("chauffeur.view.php", ["mode" => "course_acceptee", "course" => $course, "chauffeur" => $chauffeur]);
}
