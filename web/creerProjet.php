<?php

require_once '../src/App/Manager/ProjetManager.php';
require_once '../src/App/Entity/Projet.php';
require_once '../src/App/Manager/ImageManager.php';
require_once '../src/App/Entity/Image.php';

use App\Entity\Projet;
use App\Manager\ProjetManager;
use App\Entity\Image;
use App\Manager\ImageManager;

/*
 *
 * Initialisation variable
 *
 */

$nombreFichier = count($_FILES["imageUpload"]["name"]);

$images = [];

$technologies = $_POST["technologies"];
$competences = $_POST["competences"];

$nomProjet = htmlspecialchars($_POST["nom"]);
$descriptionProjet = htmlspecialchars($_POST["description"]);
$urlProjet = htmlspecialchars($_POST["urlProjet"]);
$urlDocFournit = htmlspecialchars($_POST["urlDocFournit"]);

$projetManagerTest = new ProjetManager();
$ifProjetExist = $projetManagerTest->readWithNom($nomProjet);

$message_ajoutProjet = [];
$message_insertionImage = [];
$message_sauvegardeTechnologie = [];
$message_sauvegardeCompetence = [];
$message_image = [];
$message_sauvegardeImage = [];
$message_uploadImage = [];
$message_projetExist = [];


if($ifProjetExist == null) {

    $message_projetExist = "Le projet n'existe pas.";

    /*
     *  Upload file
     */

    for ($i = 0; $i < $nombreFichier; $i++) {
        $message_sauvegardeImage[] = "La sauvegarde n'a pas pu s'effectué.";
        $message_uploadImage[] = "L'upload n'a pas pu s'effectué.";
        $message_insertionImage[] = "L'insertion n'a pas pu s'effectué.";

        /*
         * Initialisation variable
         */

        $targetDir = "images/Projets/";
        $targetFile = $targetDir . basename($_FILES['imageUpload']['name'][$i]);

        /*
         * Récupération de l'extension de l'image
         * Modification du nom de l'image avec la première lettre de chaque mot en maj et suppression des espaces
         */

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $fileName = ucwords(trim($_POST["nom"])) . "-" . $i . "." . $imageFileType;

        $targetFile = $targetDir . $fileName;

        /*
         * Récupère et vérifie que c'est une image valide
         */

        $check = getimagesize($_FILES["imageUpload"]["tmp_name"][$i]);

        if ($check) {

            $uploadIsReady = true;
            $message_image[] = "L'image " . $_FILES["imageUpload"]["name"][$i] . " est valide.";

            /*
             * Vérifie si l'image existe déjà
             */

            if (file_exists($targetFile)) {

                $uploadIsReady = false;
                $message_image[] = "L'image " . $_FILES["imageUpload"]["name"][$i] . " existe déjà.";

            } else {

                $uploadIsReady = true;
                $message_image[] = "L'image " . $_FILES["imageUpload"]["name"][$i] . " n'existe pas.";

                /*
                * Vérification de la taille de l'image
                */

                if ($_FILES["imageUpload"]["size"][$i] > 5000000) {

                    $uploadIsReady = false;
                    $message_image[] = "Taille de l'image " . $_FILES["imageUpload"]["name"][$i] . " non valide (" . $_FILES["imageUpload"]["size"][$i] . ")";

                } else {

                    $uploadIsReady = true;
                    $message_image[] = "Taille de l'image " . $_FILES["imageUpload"]["name"][$i] . " valide (" . $_FILES["imageUpload"]["size"][$i] . ")";

                    /*
                     * Vérification du format d'image
                     */

                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

                        $uploadIsReady = false;
                        $message_image[] = "Format de l'image " . $_FILES["imageUpload"]["name"][$i] . " non valide (" . $imageFileType . ")";

                    } else {

                        $uploadIsReady = true;
                        $message_image[] = "Format de l'image " . $_FILES["imageUpload"]["name"][$i] . " valide (" . $imageFileType . ")";


                    }
                }
            }

        } else {

            $uploadIsReady = false;
            $message_image[] = "Image " . $_FILES["imageUpload"]["name"][$i] . " n'est pas valide";

        }

        /*
         * Upload de l'image
         */

        if ($uploadIsReady) {

            $message_uploadImage = [];

            if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"][$i], $targetFile)) {

                $message_uploadImage[] = "Image " . $_FILES["imageUpload"]["name"][$i] . " uploadé.";

                //Insertion en BDD

                $image = new Image();
                $image->setCheminImage($targetFile);

                $imageManager = new ImageManager();
                $saveImgIsOk = $imageManager->save($image);

                $message_insertionImage = [];

                if ($saveImgIsOk) {

                    $message_insertionImage[] = "L'image " . $_FILES["imageUpload"]["name"][$i] . " a été insérée en base de donnée TABLE = images";
                    $images[] = $imageManager->getLastId();

                    /*
                    * Ajout du projet en base de donnée
                    */

                    $projet = new Projet();


                    if ($urlProjet == "") {
                        $urlProjet = null;
                    }

                    if ($urlDocFournit == "") {
                        $urlDocFournit = null;
                    }
                    $projet->setNom($nomProjet);
                    $projet->setDescription($descriptionProjet);
                    $projet->setUrlDocFournit($urlDocFournit);
                    $projet->setUrlProjet($urlProjet);
                    $projet->setArrayTechno($technologies);
                    $projet->setArrayCompetence($competences);
                    $projet->setArrayImage($images);

                    $projetManager = new ProjetManager();
                    $saveIsOk = $projetManager->save($projet);

                    if ($saveIsOk) {
                        $message_ajoutProjet = "Le projet est sauvegardé en base de donnée.";
                    } else {
                        $message_ajoutProjet = "Le projet n\'est pas sauvegardé en base de donnée.";
                    }

                } else {

                    $message_insertionImage = [];
                    $message_insertionImage[] = "L'image " . $_FILES["imageUpload"]["name"][$i] . " n'a pas été insérée en base de donnée TABLE = images";

                }


            } else {

                $message_uploadImage[] = "Image " . $_FILES["imageUpload"]["name"][$i] . " non uploadé.";
                $uploadIsOk = false;

            }

        } else {

            $message_uploadImage = [];
            $message_uploadImage[] = "L'upload ne peut pas etre effectué sur " . $_FILES["imageUpload"]["name"][$i];
            $uploadIsOk = false;

        }



    }

}else{

    $message_projetExist = "Le projet existe déjà";

}

$data = [

    "message_ifProjetExist" => $message_projetExist,
    "message_sauvegardeImage" => $message_sauvegardeImage,
    "message_sauvegardeCompetence" => $message_sauvegardeCompetence,
    "message_sauvegardeTechnologie" => $message_sauvegardeTechnologie,
    "message_insertionImage" => $message_insertionImage,
    "message_uploadImage" => $message_uploadImage,
    "message_image" => $message_image,
    "message_ajoutProjet" => $message_ajoutProjet

];

    echo json_encode($data);
?>