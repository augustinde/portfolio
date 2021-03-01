<?php

require_once '../src/App/Entity/Competence.php';
require_once '../src/App/Manager/CompetenceManager.php';

use App\Manager\CompetenceManager;
use App\Entity\Competence;

$competenceManager = new CompetenceManager();

$competences = $competenceManager->readall();

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


<form action="creerCompetence.php" method="post">

    <label for="nom">Nom de la compétence : </label>
    <input type="text" name="nom" id="nom">

    <input type="submit" value="Ajouter">

</form>


    <ul></ul>

    <?php
        foreach($competences as $competence){
            echo "<li>".$competence->getLibelle()."</li>";
        }

    ?>

</body>
</html>