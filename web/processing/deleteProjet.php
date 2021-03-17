<?php

require_once '../../src/App/Manager/ProjetManager.php';
require_once '../../src/App/Entity/Projet.php';

use App\Entity\Projet;
use App\Manager\ProjetManager;

if(isset($_GET["id"])) {


    $id = htmlspecialchars($_GET["id"]);

    $em = new ProjetManager();

    $projet = $em->read($id);

    if($em->delete($projet)) {
        $message = "Projet " . $id . " supprimé !";
    }else{

        $message = "Erreur lors de la suppression du projet ".$id;

    }
}

echo json_encode($message);
