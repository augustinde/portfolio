<?php

    require_once "../src/App/include/authentification.php";

    require_once "../src/App/Entity/Competence.php";
    require_once "../src/App/Manager/CompetenceManager.php";
    require_once "../src/App/Entity/Technologie.php";
    require_once "../src/App/Manager/TechnologieManager.php";

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
    <link rel="stylesheet" href="css/mainAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0a22fe5e55.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <title>Dashboard</title>
</head>
<body>

    <div class="header">
        <div class="inner-header flex">
            <svg version="1.1" class="logo" baseProfile="tiny" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 500 500" xml:space="preserve">
                    <path fill="#FFFFFF" stroke="#000000" stroke-width="10" stroke-miterlimit="10" d="M57,283" />
                <g>
                    <path fill="#fff" d="M250.4,0.8C112.7,0.8,1,112.4,1,250.2c0,137.7,111.7,249.4,249.4,249.4c137.7,0,249.4-111.7,249.4-249.4 C499.8,112.4,388.1,0.8,250.4,0.8z M383.8,326.3c-62,0-101.4-14.1-117.6-46.3c-17.1-34.1-2.3-75.4,13.2-104.1 c-22.4,3-38.4,9.2-47.8,18.3c-11.2,10.9-13.6,26.7-16.3,45c-3.1,20.8-6.6,44.4-25.3,62.4c-19.8,19.1-51.6,26.9-100.2,24.6l1.8-39.7		c35.9,1.6,59.7-2.9,70.8-13.6c8.9-8.6,11.1-22.9,13.5-39.6c6.3-42,14.8-99.4,141.4-99.4h41L333,166c-12.6,16-45.4,68.2-31.2,96.2	c9.2,18.3,41.5,25.6,91.2,24.2l1.1,39.8C390.5,326.2,387.1,326.3,383.8,326.3z" />
                </g>
                </svg>
        </div>

        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>

    </div>


    <div class="screenSidebar"></div>
    <div id="containerSidebar">
        <div class="contentSidebar">

            <a class="itemSidebar" href="add_project.php">Ajouter un projet</a>
            <a class="itemSidebar" href="">Modifier un projet</a>
            <a class="itemSidebar" href="">LOREM</a>
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

            <div class="rowForm">

                <div class="inforProjetInput">

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
                                <img id="imgPreview" src="#" alt="">
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
                            foreach($competences as $competence){
                                echo "<div class=\"group-checkbox\">";
                                echo "<input class=\"inputCompetence\" type=\"checkbox\" value=\"" . $competence->getIdCompetence() . "\" name=\"competences[]\" id=\"" . $competence->getLibelle() . "\"><label for=\"" . $competence->getLibelle() . "\">" . $competence->getLibelle() . "</label><br><br>";
                                echo "</div>";
                            }
                        }

                        ?>

                    </div>

                    <div class="group-input">
                        <button class="btnCollapseTechnologie">Ajouter des technologies</button>
                    </div>

                    <div class="col-input collapseTechnologie">

                        <?php

                        if($technologies === false){
                            echo "Erreur technologies";
                        }else{
                            foreach($technologies as $technologie){
                                echo "<div class=\"group-checkbox\">";
                                echo "<input class=\"inputTechnologie\" type=\"checkbox\" value=\"" . $technologie->getId() . "\" name=\"technologies[]\" id=\"" . $technologie->getLibelle() . "\"><label for=\"" . $technologie->getLibelle() . "\">" . $technologie->getLibelle() . "</label><br><br>";
                                echo "</div>";

                            }
                        }

                        ?>

                    </div>

                </div>


            </div>
        </form>

    </div>


    <script src="js/scriptAdmin.js"></script>
</body>
</html>