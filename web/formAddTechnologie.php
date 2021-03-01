<?php

require_once '../src/App/Entity/Technologie.php';
require_once '../src/App/Manager/TechnologieManager.php';

use App\Manager\TechnologieManager;
use App\Entity\Technologie;

$technologieManager = new TechnologieManager();

$technologies = $technologieManager->readall();

?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout d'une compétence</title>
</head>
<body>


<form action="creerTechnologie.php" method="post">

    <label for="nom">Nom de la technologie : </label>
    <input type="text" name="nom" id="nom">

    <input type="submit" value="Ajouter">

</form>


    <ul></ul>

    <?php
        foreach($technologies as $technologie){
            echo "<li>".$technologie->getLibelle()."</li>";
        }

    ?>

</body>
</html>