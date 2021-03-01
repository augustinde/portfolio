<?php

require_once "../src/App/Entity/Projet.php";
require_once "../src/App/Manager/ProjetManager.php";
require_once "../src/App/include/db.php";

use App\Manager\ProjetManager;
use App\Entity\Projet;

$id = htmlspecialchars($_POST["id"]);


$projet = new Projet();
$projetManager = new ProjetManager();

$projet = $projetManager->readall();


$data = array(

    array(
        "id" => $projet->getId()
    ),
    array(
        "nom" => ucfirst($projet->getNom())
    ),
    array(
        "description" => ucfirst($projet->getDescription())
    ),
    array(
        "urlProjet" => $projet->getUrlProjet()
    ),
    array(
        "technologies" => $projet->getArrayTechno()
    ),
    array(
        "competences" => $projet->getArrayCompetence()
    ),
    array(
        "images" => $projet->getArrayImage()
    )
);

echo json_encode($data);

var_dump($projet);