<?php

require_once '../../src/App/Manager/ProjetManager.php';
require_once '../../src/App/Entity/Projet.php';
require_once '../../src/App/Manager/ProjetHasCompetenceManager.php';
require_once '../../src/App/Manager/ProjetHasImageManager.php';
require_once '../../src/App/Manager/ProjetHasTechnologieManager.php';

use App\Entity\Projet;
use App\Manager\ProjetHasCompetenceManager;
use App\Manager\ProjetHasImageManager;
use App\Manager\ProjetHasTechnologieManager;
use App\Manager\ProjetManager;

if(isset($_GET["id"])) {


    $id = htmlspecialchars($_GET["id"]);

    $pm = new ProjetManager();
    $pcm = new ProjetHasCompetenceManager();
    $pim = new ProjetHasImageManager();
    $ptm = new ProjetHasTechnologieManager();

    $projet = $pm->read($id);

    if($pm->delete($projet) && $pcm->delete($projet) && $pim->delete($projet) && $ptm->delete($projet)) {
        $message = "ok";


    }else{

        $message = "erreur";


    }


}else{
    $message = "pasdeprojet";
}

header('Location: ../list_project.php?m='.$message);



