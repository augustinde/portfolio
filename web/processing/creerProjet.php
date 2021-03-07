<?php

require_once '../../src/App/Manager/ProjetManager.php';
require_once '../../src/App/Entity/Projet.php';
require_once '../../src/App/Manager/ImageManager.php';
require_once '../../src/App/Entity/Image.php';

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



/*
    * Code erreur
    *
    * IMG_S_VALID : Image valide
    * IMG_S_NOT_EXIST : Image n'existe pas
    * IMG_S_SIZE_VALID : Taille de l'image valide
    * IMG_S_FORMAT_VALIDE : Format de l'image valide
    * IMG_S_UPLOAD : Image upload
    * IMG_S_SAVE_DB : Image sauvegarder en bdd

    * IMG_E_INVALID : Image non valide
    * IMG_E_EXIST : Image existe déjà
    * IMG_E_SIZE_INVALID : Taille de l'image non valide
    * IMG_E_FORMAT_INVALID : Format de l'image non valide
    * IMG_E_UPLOAD : Image non upload
    * IMG_E_NO_SAVE_DB : Image snon auvegarder en bdd
    * IMG_E_COULD_NOT_UPLOAD : L'upload n'a pas pu être effectuer

    * PRJ_S_NOT_EXIST : Aucun projet identique n'existe
    * PRJ_S_SAVE_DB : Projet sauvegarder en bdd

    * PRJ_E_EXIST : Le projet existe déjà
    * PRJ_E_NO_SAVE_DB : Le projet n'a pas été sauvegarder en bdd
*/


if($ifProjetExist == null) {

    $message_projetExist = "PRJ_S_NOT_EXIST";

    /*
     *  Upload file
     */

    for ($i = 0; $i < $nombreFichier; $i++) {

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
            $message_image[] = "IMG_S_VALID : " . $_FILES["imageUpload"]["name"][$i];

            /*
             * Vérifie si l'image existe déjà
             */

            if (file_exists("../".$targetFile)) {

                $uploadIsReady = false;
                $message_image[] = "IMG_E_EXIST : " . $_FILES["imageUpload"]["name"][$i];

            } else {

                $uploadIsReady = true;
                $message_image[] = "IMG_S_NOT_EXIST : " . $_FILES["imageUpload"]["name"][$i];

                /*
                * Vérification de la taille de l'image
                */

                if ($_FILES["imageUpload"]["size"][$i] > 5000000) {

                    $uploadIsReady = false;
                    $message_image[] = "IMG_E_SIZE_INVALID : " . $_FILES["imageUpload"]["name"][$i] . " " . $_FILES["imageUpload"]["size"][$i];

                } else {

                    $uploadIsReady = true;
                    $message_image[] = "IMG_S_SIZE_VALID : " . $_FILES["imageUpload"]["name"][$i] . " " . $_FILES["imageUpload"]["size"][$i];

                    /*
                     * Vérification du format d'image
                     */

                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {

                        $uploadIsReady = false;
                        $message_image[] = "IMG_E_FORMAT_INVALID : " . $_FILES["imageUpload"]["name"][$i] . " non valide (" . $imageFileType;

                    } else {

                        $uploadIsReady = true;
                        $message_image[] = "IMG_S_FORMAT_VALID : " . $_FILES["imageUpload"]["name"][$i] . " " . $imageFileType;


                    }
                }
            }

        } else {

            $uploadIsReady = false;
            $message_image[] = "IMG_E_INVALID : " . $_FILES["imageUpload"]["name"][$i];

        }

        /*
         * Upload de l'image
         */

        if ($uploadIsReady) {

            $message_uploadImage = [];

            if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"][$i], "../".$targetFile)) {

                $message_uploadImage[] = "IMG_S_UPLOAD : " . $_FILES["imageUpload"]["name"][$i];

                //Insertion en BDD

                $image = new Image();
                $image->setCheminImage($targetFile);

                $imageManager = new ImageManager();
                $saveImgIsOk = $imageManager->save($image);

                $message_insertionImage = [];

                if ($saveImgIsOk) {

                    $message_insertionImage[] = "IMG_S_SAVE_DB : " . $_FILES["imageUpload"]["name"][$i];
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
                        $message_ajoutProjet = "PRJ_S_SAVE_DB";
                    } else {
                        $message_ajoutProjet = "PRJ_E_NO_SAVE_DB";
                    }

                } else {

                    $message_insertionImage = [];
                    $message_insertionImage[] = "IMG_E_NO_SAVE_DB : " . $_FILES["imageUpload"]["name"][$i];

                }


            } else {

                $message_uploadImage[] = "IMG_E_UPLOAD : " . $_FILES["imageUpload"]["name"][$i];
                $uploadIsOk = false;

            }

        } else {

            $message_uploadImage = [];
            $message_uploadImage[] = "IMG_E_COULD_NOT_UPLOAD :" . $_FILES["imageUpload"]["name"][$i];
            $uploadIsOk = false;

        }



    }

}else{

    $message_projetExist = "PRJ_E_EXIST";

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