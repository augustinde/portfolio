<?php

require_once '../src/App/Entity/Technologie.php';
require_once '../src/App/Manager/TechnologieManager.php';

use App\Entity\Technologie;
use App\Manager\TechnologieManager;

$technologie = new Technologie();

$technologie->setLibelle($_POST["nom"]);

$technologieManager = new TechnologieManager();

$saveIsOk = $technologieManager->save($technologie);

if($saveIsOk){
    echo "Technologie ajouté !";
}else{
    echo "Technologie non ajouté !";
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

    <a href="formAddTechnologie.php">Retour</a>

</body>
</html>


