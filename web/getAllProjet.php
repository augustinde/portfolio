<?php

require_once "../src/App/Entity/Projet.php";
require_once "../src/App/Manager/ProjetManager.php";
require_once "../src/App/include/db.php";

use App\Manager\ProjetManager;
use App\Entity\Projet;

$projet = new Projet();
$projetManager = new ProjetManager();

$projets = $projetManager->readall();


$dataAll = array();

foreach($projets as $projet){

    $data = array(

        array(
            "id" => $projet->getId()
        ),
        array(
            "nom" => ucfirst($projet->getNom())
        ),
        array(
            "images" => $projet->getArrayImage()
        )
    );

    array_push($dataAll, $data);

}


echo json_encode($dataAll);
