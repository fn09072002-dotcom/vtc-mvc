<?php


require_once __DIR__ . "/../model/course.model.php";
require_once __DIR__ . "/../service/service.php";
require_once __DIR__ . "/../utils/validator.php";
require_once __DIR__ . "/../utils/view.utils.php";
require_once __DIR__ . "/../view/passager.view.php";


function commanderCourseAction(): void
{
    valider_champs_requis($_POST, ["passager_id", "adresse_depart", "adresse_arrivee"]);

    $passagerId = (int) $_POST["passager_id"];
    $data = &db();
    if (!isset($data['passagers'][$passagerId])) {
        erreur('PASSAGER_INTROUVABLE');
    }

    
    $distanceKm = calculerDistanceGPS($_POST["adresse_depart"], $_POST["adresse_arrivee"]);
    $prixEstime = estimerPrix($distanceKm);

   
    $id = prochainId('course');
    $course = creerCourse($id, $passagerId, $_POST["adresse_depart"], $_POST["adresse_arrivee"], $distanceKm, $prixEstime);
    enregistrerCourse($course);

    
    notifier("chauffeurs a proximite", "Nouvelle course #{$course['id']} disponible ({$distanceKm} km).");

    render("passager.view.php", ["mode" => "course_creee", "course" => $course]);
}
