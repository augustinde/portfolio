<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once "../src/App/Entity/Projet.php";
require_once "../src/App/Manager/ProjetManager.php";
require_once "../src/App/include/db.php";

use App\Manager\ProjetManager;
use App\Entity\Projet;


$projetManager = new ProjetManager();

$projet = new Projet();

$projets = $projetManager->readall();







?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap');

        body{
            font-family: 'Roboto', sans-serif;
            background-color: #17202A;
            display: flex;
            justify-content: space-around;
            color:#fff;
        }

        .rowCard{

            display: flex;
            flex-wrap: wrap;
            justify-content: center;

        }

        .card{
            background-color: #f1f1f1;
            width: 225px;
            height: auto;
            max-height: 300px;
            display: flex;
            flex-direction: column;
            border-bottom-left-radius: 20px;
            border-top-right-radius: 20px;
            border:1px solid #fff;
            cursor: pointer;
            position: relative;
            margin-right:20px;
            margin-bottom:20px;
        }

        .card img{
            width: 100%;
            border-top-right-radius: 20px;

        }


        .card .contenuCard p{
            padding: 5px;
            margin: 0;
            text-align: center;
            background-color: #075187;
            font-size: 16px;
            color:#fff;
        }

        .card .contenuCard .competenceProjet{

            display: flex;
            flex-wrap: wrap;
            margin:0px 10px 10px 10px;


        }

        .card .contenuCard .competenceProjet span {

            background-color: #17202A;
            padding:5px;
            margin-right:8px;
            margin-top:10px;
            font-size: 12px;
            color:#fff;
            border-bottom-left-radius: 5px;
            border-top-right-radius: 5px;

        }

    </style>



</head>
<body>

    <?php

    $arrayProjets = array();

        foreach ($projets as $projet){

            $arrayProjet = array();

            array_push($arrayProjet,$projet->getId());
            array_push($arrayProjet,$projet->getNom());
            array_push($arrayProjet,$projet->getDescription());
            array_push($arrayProjet,$projet->getUrlProjet());
            array_push($arrayProjet,$projet->getUrlDocFournit());

            $arrayTechnologie = array();

            foreach ($projet->getArrayTechno() as $technoP){

                array_push($arrayTechnologie, $technoP["libelle"]);

            }


            $arrayCompetence = array();

            foreach ($projet->getArrayCompetence() as $compP){

                array_push($arrayCompetence, $compP["libelle"]);

            }


            $arrayImage = array();

            foreach ($projet->getArrayImage() as $imageP){

                array_push($arrayImage, $imageP["cheminImage"]);

            }


            array_push($arrayProjet,$arrayTechnologie);
            array_push($arrayProjet,$arrayCompetence);
            array_push($arrayProjet,$arrayImage);


            array_push($arrayProjets,$arrayProjet);

        }

        var_dump($arrayProjets[0]);

        echo $arrayProjets[0][6][0];


        /*
         *
         * Voir ce qui est le mieux et le plus simple entre récupérer les données en PHP ou en JS pour les traiter et gérer l'affichage
         * Voir aussi si le formatage des données après leurs récupération peuvent pas être plus simple
         * et / ou plus clair pour pouvoir par exemple accéder au nom du projet en faisant $arrayProjets[0]["nom"]
         * en affectant les valeurs a arrayProjets en mode clé valeur
         *
         */

    ?>


</body>
</html>
