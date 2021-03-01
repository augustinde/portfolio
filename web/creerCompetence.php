<?php

require_once '../src/App/Entity/Competence.php';
require_once '../src/App/Manager/CompetenceManager.php';

use App\Entity\Competence;
use App\Manager\CompetenceManager;

$competence = new Competence();

$competence->setLibelle($_POST["nom"]);

$competenceManager = new CompetenceManager();

$saveIsOk = $competenceManager->save($competence);

if($saveIsOk){
    echo "Compétence ajouté !";
}else{
    echo "Compétence non ajouté !";
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <a href="formAddCompetence.php">Retour</a>

</body>
</html>


