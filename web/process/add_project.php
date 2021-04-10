<?php

    require_once "../../src/App/include/authentification.php";

    require_once "../../src/App/Entity/Competence.php";
    require_once "../../src/App/Manager/CompetenceManager.php";
    require_once "../../src/App/Entity/Technologie.php";
    require_once "../../src/App/Manager/TechnologieManager.php";

    use App\Manager\CompetenceManager;
    use App\Manager\TechnologieManager;

    $competenceManager = new CompetenceManager();
    $competences = $competenceManager->readall();

    $technologieManager = new TechnologieManager();
    $technologies = $technologieManager->readall();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/mainAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0a22fe5e55.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="screenSidebar"></div>
    <div id="containerSidebar">
        <div class="contentSidebar">
            <a class="itemSidebar" href="dashboard.php">Tableau de bord</a>
            <a class="itemSidebar" href="add_project.php">Ajouter un projet</a>
            <a class="itemSidebar" href="../list_project.php">Liste des projets</a>
            <a class="itemSidebar" href="">LOREM</a>
            <a class="itemSidebar" href="">LOREM</a>
            <a class="itemSidebar itemDecoSidebar" href="deconnexion.php">Déconnexion</a>

        </div>

        <span id="btnVeilleTechno" class="hoverBtnVeille">
            <i class="fas fa-space-shuttle fa-2x"></i>
        </span>
    </div>

    <div class="mainForm">

        <h2>Ajouter un projet</h2>
        <form id="form" enctype="multipart/form-data">

            <div class="colForm">

                <div class="group-input">

                    <input type="hidden" id="idProjet" name="idProjet">

                    <label for="nom">Nom du projet </label>
                    <input type="text" name="nom" id="nom">

                </div>

                <div class="group-input">

                    <label for="description">Description </label>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    <!-- ajout limite de 300 caracteres-->
                </div>

                <div class="group-input">

                    <label for="urlDocFournit">Url des documents fournis (laisser vide sinon) </label>
                    <input type="text" name="urlDocFournit" id="urlDocFournit">

                </div>

                <div class="group-input">

                    <label for="urlProjet">Url projet (laisser vide sinon) </label>
                    <input type="text" name="urlProjet" id="urlProjet">

                </div>

                <div class="group-input">
                    <form>
                        <label class="labelFile" for="imageUpload">Image(s)</label>
                        <input type="file" accept="image/jpeg, image/jpg" name="imageUpload[]" id="imageUpload" multiple>
                        <div id="previewFileDiv">

                        </div>
                    </form>

                </div>

                <div class="group-input">
                    <button class="btnCollapseCompetence">Ajouter des compétences</button>
                </div>

                <div class="col-input collapseCompetence">

                    <?php

                    if($competences === false){
                        echo "Erreur compétences";
                    }else{

                        echo '<ul>';
                        foreach ($competences as $competence) {
                            echo "<li><input class=\"inputCompetence\" type=\"checkbox\" value=\"" . $competence->getIdCompetence() . "\" name=\"competences[]\" id=\"" . $competence->getLibelle() . "\"> <label for=\"" . $competence->getLibelle() . "\"> " . $competence->getLibelle() . "</label></li>";
                        }
                        echo '</ul>';

                    }

                    ?>
                    <br>

                </div>
                <div class="group-input">
                    <button class="btnCollapseTechnologie">Ajouter des technologies</button>
                </div>

                <div class="col-input collapseTechnologie">

                    <?php

                    if($technologies === false){
                        echo "Erreur technologies";
                    }else{

                        echo '<ul>';
                        foreach($technologies as $technologie){
                            echo "<li><input class=\"inputTechnologie\" type=\"checkbox\" value=\"" . $technologie->getId() . "\" name=\"technologies[]\" id=\"" . $technologie->getLibelle() . "\"><label for=\"" . $technologie->getLibelle() . "\"> " . $technologie->getLibelle() . "</label></li>";
                        }
                        echo '</ul>';

                    }

                    ?>

                </div>
                <br>
                <div class="group-input">
                    <button id="btnSubmitProject" class="input-button" type="button">Ajouter</button>
                </div>

                <div id="affichageResultat">

                </div>


            </div>
        </form>

    </div>

    <div class="filtre"></div>
    <div id="contentModal" class="modalContainer effetModal">

        <span id="btnClose" class="modalClose">
            <i class="fas fa-times fa-2x"></i>
        </span>

        <div class="modalHeader">
            <h2>Informations ajout projet</h2>
        </div>
        <div class="modalBody">

        </div>
        <div class="modalFooter">
            <button id="btnOk">Ok</button>
        </div>

    </div>


    <script src="../js/scriptAdmin.js"></script>
</body>
</html>