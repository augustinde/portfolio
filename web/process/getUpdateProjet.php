<?php

require_once "../../src/App/Entity/Projet.php";
require_once "../../src/App/Manager/ProjetManager.php";

require_once "../../src/App/Entity/Technologie.php";
require_once "../../src/App/Manager/TechnologieManager.php";
require_once "../../src/App/Entity/ProjetHasTechnologie.php";
require_once "../../src/App/Manager/ProjetHasTechnologieManager.php";

require_once "../../src/App/Entity/Competence.php";
require_once "../../src/App/Manager/CompetenceManager.php";
require_once "../../src/App/Entity/ProjetHasCompetence.php";
require_once "../../src/App/Manager/ProjetHasCompetenceManager.php";

require_once "../../src/App/Entity/Image.php";
require_once "../../src/App/Manager/ImageManager.php";
require_once "../../src/App/Entity/ProjetHasImage.php";

require_once "../../src/App/include/db.php";

use App\Manager\ProjetManager;
use App\Entity\Projet;

use App\Manager\TechnologieManager;
use App\Manager\CompetenceManager;
use App\Manager\ImageManager;


/*
 *
 * INTIALISATION VARIABLE
 *
 */

$id = htmlspecialchars($_POST["id"]);
$array_Technologies = array();
$array_Competences = array();
$array_idImages = array();
$array_Images = array();

/*
 *
 * INSTANCIATION OBJET
 *
 */


$projet = new Projet();
$projetManager = new ProjetManager();
$technologieManager = new TechnologieManager();
$competenceManager = new CompetenceManager();
$imageManager = new ImageManager();


//Lecture du projet
$projet = $projetManager->read($id);


//Lecture des technologies du projet
$technologies = $projetManager->readTechnologie($id);

//foreach sur la liste de technologies du projet courant
foreach ($technologies as $techno) {
    //recupération de l'id de la technologie courante
    $numTechnologieProjetCourant = $techno->getIdTechnologie();
    array_push($array_Technologies, $numTechnologieProjetCourant);

}


//Lecture des compétences du projet
$competences = $projetManager->readCompetence($id);

//foreach sur la liste de compétences du projet courant
foreach ($competences as $competence) {
    //recupération de l'id de la compétence courante
    $numCompetenceProjetCourant = $competence->getIdCompetence();
    array_push($array_Competences, $numCompetenceProjetCourant);

}


//Lecture des images du projet
$images = $projetManager->readImage($id);

//foreach sur la liste d'images du projet courant
foreach ($images as $image) {
    //recupération de l'id de l'image courante
    $numImageProjetCourant = $image->getIdImage();
    array_push($array_idImages, $numImageProjetCourant);

}

foreach ($array_idImages as $idImage){

    $image = $imageManager->read($idImage);
    $cheminImage = $image->getCheminImage();
    array_push($array_Images, $cheminImage);

}




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
        "urlDocFournit" => $projet->getUrlDocFournit()
    ),
    array(
        "technologies" => $array_Technologies
    ),
    array(
        "competences" => $array_Competences
    ),
    array(
        "images" => $array_Images
    ),
    array(
        "idImage" => $array_idImages
    )
);


echo json_encode($data);
