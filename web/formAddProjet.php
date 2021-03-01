<?php

require_once '../src/App/Entity/Technologie.php';
require_once '../src/App/Manager/TechnologieManager.php';
require_once '../src/App/Entity/Competence.php';
require_once '../src/App/Manager/CompetenceManager.php';
require_once '../src/App/Entity/Projet.php';
require_once '../src/App/Manager/ProjetManager.php';
require_once '../src/App/Manager/ImageManager.php';
require_once '../src/App/Entity/ProjetHasImage.php';
require_once '../src/App/Entity/Image.php';


use App\Manager\TechnologieManager;
use App\Manager\CompetenceManager;

$technologieManager = new TechnologieManager();

$technologies = $technologieManager->readall();


$competenceManager = new CompetenceManager();

$competences = $competenceManager->readall();

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajout projet</title>
    <style>


        #darkModeBtn{
            position: absolute;
            right:0px;
            top:0px;
            outline: none;
            padding:14px;
            background-color: #024D84;
            border:none;
            color:#fff;
            cursor: pointer;
        }

        .darkMode{
            background-color: #424959;
            color:#fff;
        }

        #projets{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

    </style>
</head>
<body id="bd" class="darkMode">

<button id="darkModeBtn">Dark mode</button>

<div style="display:flex;">

    <form id="form" enctype="multipart/form-data" style="display:block;">

        <div class="rowForm" style="display: flex;">

            <div class="input" style="display: block; margin:20px;">

                <div class="group-input" style="display: flex; flex-direction: column;">

                    <input type="hidden" id="idProjet" name="idProjet">

                    <label for="nom">Nom du projet </label>
                    <br>
                    <input type="text" name="nom" id="nom"><br><br>

                </div>

                <div class="group-input" style="display: flex; flex-direction: column;">

                    <label for="description">Description </label>
                    <br>
                    <textarea name="description" id="description" cols="30" rows="10"></textarea><br><br>
                    <!-- ajout limite de 300 caracteres-->
                </div>

                <div class="group-input" style="display: flex; flex-direction: column;">

                    <label for="urlDocFournit">Url des documents fournis (laisser vide sinon) </label>
                    <br>
                    <input type="text" name="urlDocFournit" id="urlDocFournit"><br><br>

                </div>

                <div class="group-input" style="display: flex; flex-direction: column;">

                    <label for="urlProjet">Url projet (laisser vide sinon) </label>
                    <br>
                    <input type="text" name="urlProjet" id="urlProjet"><br><br>

                </div>

                <div class="group-input" style="display: flex; flex-direction: column;">

                    <label for="imageUpload">Image </label>
                    <br>
                    <input type="file" accept="image/jpeg, image/jpg" name="imageUpload[]" id="imageUpload" multiple><br><br>
                    <div id="previewFile">

                    </div>
                </div>

            </div>

            <div class="technoInput" style="display: block; margin:20px;">


                <p>Technologies</p>

                <?php

                if($technologies === false){
                    echo "Erreur technologie";
                }else{
                    foreach($technologies as $technologie){
                        echo "<input class=\"inputTechnologie\" type=\"checkbox\" value=\"" . $technologie->getId() . "\" name=\"technologies[]\" id=\"" . $technologie->getLibelle() . "\"><label for=\"" . $technologie->getLibelle() . "\">" . $technologie->getLibelle() . "</label><br><br>";

                    }
                }

                ?>

            </div>

            <div class="compeInput" style="display: block; margin:20px;">

            <?php

            echo "<p>Competences</p>";

            if($competences === false){
                echo "Erreur compétence";
            }else{
                /*foreach ($competences as $competence) {


                }*/
                $cpt=0;

                while($cpt<count($competences)){

                    for ($j=0; $j<4; $j++){

                        echo "<input class=\"inputCompetence\" type=\"checkbox\" value=\"" . $competences[$cpt]->getIdCompetence() . "\" name=\"competences[]\" id=\"" . $competences[$cpt]->getLibelle() . "\"><label style=\"margin-right:10px;\" for=\"" . $competences[$cpt]->getLibelle() . "\">" . $competences[$cpt]->getLibelle() . "</label>";
                        $cpt++;
                    }

                    echo "<br>";
                }


            }

            ?>
            </div>

        </div>
        <div class="rowForm">

            <button style="display:inline-block; width:50%; padding:14px; display: block; margin-left: auto; margin-right: auto;" onclick="requestViewProjet()" type="button">Ajouter</button>

        </div>

    </form>

    <div id="affichageResultat">

     <ul id="listeResultat" style="list-style-type: none;">
     </ul>

    </div>


    <div id="previewImg">

    </div>

</div>
<br>


<script>

    let inputNom = document.getElementById("nom");
    let inputDescription = document.getElementById("description");
    let inputUrlDocFournit = document.getElementById("urlDocFournit");
    let inputUrlProjet = document.getElementById("urlProjet");
    let inputFile = document.getElementById("imageUpload");
    let inputId = document.getElementById("idProjet");

    let inputCompetence = document.querySelectorAll(".inputCompetence");
    let inputTechnologie = document.querySelectorAll(".inputTechnologie");

    let buttonUpdateProjet = document.querySelectorAll(".buttonUpdateProjet");

    for(let k=0; k<buttonUpdateProjet.length; k++){
        buttonUpdateProjet[k].addEventListener("click", initialiseProjet);
    }

    //Vérification du nombre de fichier
    inputFile.addEventListener("change", function(){
        if(inputFile.files.length > 3){
            inputFile.value = "";
            console.log("Nombre de fichier maximum limité à 3 !");
        }else{
            console.log("Nombre de fichier : "+ inputFile.files.length);
        }
    });


    //fonction qui affiche le projet a modifier dans les input
    function initialiseProjet(){

        let id = this.getAttribute("id");
        let projetResultat = getDataProjet(id);
        console.log(projetResultat);
        inputId.value = projetResultat["id"]
        inputNom.value = projetResultat["nomProjet"]
        inputDescription.value = projetResultat["description"];
        inputUrlDocFournit.value = projetResultat["urlDocFournit"];
        inputUrlProjet.value = projetResultat["urlProjet"];

        for(let l = 0; l<inputCompetence.length; l++){
            for(let m = 0; m<projetResultat["competences"].length; m++){
                inputCompetence[l].removeAttribute("checked");
            }
        }

        for(let l = 0; l<inputCompetence.length; l++){
            for(let m = 0; m<projetResultat["competences"].length; m++){
                if(inputCompetence[l].getAttribute("value") === projetResultat["competences"][m]){

                    inputCompetence[l].setAttribute("checked", true);

                }
            }
        }

        for(let l = 0; l<inputTechnologie.length; l++){
            for(let m = 0; m<projetResultat["technologies"].length; m++){
                inputTechnologie[l].removeAttribute("checked");
            }
        }

        for(let l = 0; l<inputTechnologie.length; l++){
            for(let m = 0; m<projetResultat["technologies"].length; m++){
                if(inputTechnologie[l].getAttribute("value") === projetResultat["technologies"][m]){

                    inputTechnologie[l].setAttribute("checked", true);

                }
            }
        }


    }


    //récupérer le projet

    function getDataProjet(id){

        let array_resultat = new Array();
        let array_images = new Array();
        let array_technologies = new Array();
        let array_competences = new Array();
        let array_idImages = new Array();

        let xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {

            if (this.readyState === 4 && this.status === 200) {
                let res = JSON.parse(xmlhttp.responseText);

                res[8].idImage.forEach(element =>{
                    array_idImages.push(element);
                });


                res[7].images.forEach(element => {

                    array_images.push(element);

                });


                res[6].competences.forEach(element => {

                    array_competences.push(element);

                });


                res[5].technologies.forEach(element => {

                    array_technologies.push(element);

                });


                array_resultat["id"] = res[0].id;
                array_resultat["nomProjet"] = res[1].nom;
                array_resultat["description"] = res[2].description;
                array_resultat["urlProjet"] = res[3].urlProjet;
                array_resultat["urlDocFournit"] = res[4].urlDocFournit;
                array_resultat["images"] = array_images;
                array_resultat["competences"] = array_competences;
                array_resultat["technologies"] = array_technologies;
                array_resultat["idImages"] = array_idImages;

            }

        };

        xmlhttp.open("POST", "getUpdateProjet.php", false);

        /*

                             /\
                            /  \
                           /    \
                          /      \
                         /        \
                        /          \
                       /     ||     \
                      /      ||      \
                     /       ||       \
                    /        ||        \
                   /         ||         \
                  /                      \
                 /           @@           \
                /__________________________\


         */

        xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        xmlhttp.send(encodeURI("id="+id));
        return array_resultat;


    }



    document.getElementById("darkModeBtn").addEventListener("click", function (){
       document.getElementById("bd").classList.toggle("darkMode");
    });


    /*

        VOIR PK CA BUG QUAND JE METS L'IMAGE ertde (dans poubelle)


     */


 //Fonction requete création du projet
 function requestViewProjet() {

     let xmlhttp = new XMLHttpRequest();

     var formData = new FormData();

     let inputCompetence = document.querySelectorAll(".inputCompetence:checked");
     let inputTechnologie = document.querySelectorAll(".inputTechnologie:checked");

     let nomVal = inputNom.value;
     let descriptionVal = inputDescription.value;
     let urlDocFournitVal = inputUrlDocFournit.value;
     let urlProjetVal = inputUrlProjet.value;

     let fileVal = inputFile.files;
     let arrayCompetence = [];
     let arrayTechonologie = [];

     inputCompetence.forEach(element => {

         formData.append("competences[]", element.value);

     });

     inputTechnologie.forEach(element => {

         formData.append("technologies[]", element.value);

     });

     formData.append("nom", nomVal);
     formData.append("description", descriptionVal);
     formData.append("urlProjet", urlProjetVal);
     formData.append("urlDocFournit", urlDocFournitVal);

     for(let i=0; i<fileVal.length; i++){
         formData.append("imageUpload[]", inputFile.files[i], inputFile.files[i].name);
     }

     xmlhttp.onreadystatechange = function () {

         if (this.readyState === 4 && this.status === 200) {
             let res = JSON.parse(xmlhttp.responseText);
             console.info(res);

            document.getElementById("affichageResultat").innerHTML = "";

             let ulElt = document.createElement("ul");
             ulElt.style.listStyleType = "none";
             ulElt.setAttribute("id", "listeResultat");
             document.getElementById("affichageResultat").appendChild(ulElt);

             let liElt = document.createElement("li");
             let liText = document.createTextNode(res.message_ajoutProjet);
             liElt.appendChild(liText);
             ulElt.appendChild(liElt);

             liElt = document.createElement("li");
             liText = document.createTextNode(res.message_ifProjetExist);
             liElt.appendChild(liText);
             ulElt.appendChild(liElt);

             for(let i=0; i<res.message_image.length; i++){
                 liElt = document.createElement("li");
                 liText = document.createTextNode(res.message_image[i]);
                 liElt.appendChild(liText);
                 ulElt.appendChild(liElt);
             }

             for(let i=0; i<res.message_uploadImage.length; i++){
                 liElt = document.createElement("li");
                 liText = document.createTextNode(res.message_uploadImage[i]);
                 liElt.appendChild(liText);
                 ulElt.appendChild(liElt);
             }

             for(let i=0; i<res.message_sauvegardeCompetence.length; i++){
                 liElt = document.createElement("li");
                 liText = document.createTextNode(res.message_sauvegardeCompetence[i]);
                 liElt.appendChild(liText);
                 ulElt.appendChild(liElt);
             }

             for(let i=0; i<res.message_sauvegardeTechnologie.length; i++){
                 liElt = document.createElement("li");
                 liText = document.createTextNode(res.message_sauvegardeTechnologie[i]);
                 liElt.appendChild(liText);
                 ulElt.appendChild(liElt);
             }

         }

     };

     xmlhttp.open("POST", "creerProjet.php");
     xmlhttp.send(formData);


 }


</script>

</body>
</html>