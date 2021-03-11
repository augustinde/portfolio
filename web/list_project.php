<?php

    require_once "../src/App/include/authentification.php";

    require_once "../src/App/Manager/ProjetManager.php";
    require_once "../src/App/Entity/Projet.php";

    use App\Manager\ProjetManager;
    use App\Entity\Projet;

    $pm = new ProjetManager();

    $projets = $pm->readall();


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/mainAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0a22fe5e55.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <title>Dashboard - Liste des projets</title>
</head>
<body>
    <div class="screenSidebar"></div>
    <div id="containerSidebar">
        <div class="contentSidebar">
            <a class="itemSidebar" href="dashboard.php">Tableau de bord</a>
            <a class="itemSidebar" href="add_project.php">Ajouter un projet</a>
            <a class="itemSidebar" href="list_project.php">Liste des projets</a>
            <a class="itemSidebar" href="">LOREM</a>
            <a class="itemSidebar" href="">LOREM</a>
            <a class="itemSidebar itemDecoSidebar" href="deconnexion.php">Déconnexion</a>

        </div>

        <span id="btnVeilleTechno" class="hoverBtnVeille">
            <i class="fas fa-space-shuttle fa-2x"></i>
        </span>
    </div>

    <section id="listProjet">

        <div class="sideFiltre">

            <h2>Appliquer un filtre</h2>

        </div>

        <div class="contentList">

            <?php

                foreach ($projets as $projet){
                    echo '<div class="itemList">';
                        echo '<h4>'.$projet->getNom().'</h4>';

                        echo '<span><i class="fas fa-times"></i></span>';

                    echo '</div>';


                }

            ?>


        </div>



    </section>

    <script src="js/scriptAdmin.js"></script>

</body>
</html>
