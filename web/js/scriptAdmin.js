/*

    Variable global

 */

let inputNom = document.querySelector("#nom");
let inputDescription = document.querySelector("#description");
let inputUrlDocFournit = document.querySelector("#urlDocFournit");
let inputUrlProjet = document.querySelector("#urlProjet");
let inputFile = document.querySelector("#imageUpload");

let modalContent = document.getElementById("contentModal");

document.getElementById("btnVeilleTechno").addEventListener("click", () => {

    if(document.getElementById("containerSidebar").classList.contains("toggleSidebar")){
        document.getElementById("containerSidebar").classList.remove("toggleSidebar");
        document.getElementById("btnVeilleTechno").classList.add("hoverBtnVeille");
        document.getElementById("btnVeilleTechno").classList.remove("changeIconBtnVeille");
        document.querySelector(".screenSidebar").classList.remove("toggleScreenSidebar");

        setTimeout(() => {

            document.querySelector(".contentSidebar").scrollTop = 0;

        },600);

    }else{
        document.getElementById("containerSidebar").classList.add("toggleSidebar");
        document.getElementById("btnVeilleTechno").classList.remove("hoverBtnVeille");
        document.getElementById("btnVeilleTechno").classList.add("changeIconBtnVeille");
        document.querySelector(".screenSidebar").classList.add("toggleScreenSidebar");

    }


});


/*

    Collapse form add project

 */

document.querySelector(".btnCollapseCompetence").addEventListener("click", (e) => {

    e.preventDefault();
    document.querySelector(".collapseCompetence").classList.toggle("expandCollapse");

});

document.querySelector(".btnCollapseTechnologie").addEventListener("click", (e) => {

    e.preventDefault();
    document.querySelector(".collapseTechnologie").classList.toggle("expandCollapse");

});


/*

    Add file button

 */

document.querySelector("#imageUpload").addEventListener("change", (e) => {
    document.querySelector("#previewFileDiv").innerHTML = "";
    console.log("Nombre de fichier : "+ e.target.files.length);

    if(e.target.files.length <= 3) {

        for(let i=0; i<e.target.files.length; i++){
            let imgElt = document.createElement("img");
            imgElt.src = URL.createObjectURL(e.target.files[i]);
            imgElt.classList.add("imgPreview");
            document.querySelector("#previewFileDiv").appendChild(imgElt);

        }
    }else{
        console.log("Nombre de fichier maximum limité à 3 !");
        e.preventDefault();
    }
});

/*

    Add project to DB

 */

document.querySelector("#btnSubmitProject").addEventListener("click", () => {
       createProject();
});

function createProject() {

    let xmlhttp = new XMLHttpRequest();

    var formData = new FormData();

    let inputCompetence = document.querySelectorAll(".inputCompetence:checked");
    let inputTechnologie = document.querySelectorAll(".inputTechnologie:checked");

    let nomVal = inputNom.value;
    let descriptionVal = inputDescription.value;
    let urlDocFournitVal = inputUrlDocFournit.value;
    let urlProjetVal = inputUrlProjet.value;

    let fileVal = inputFile.files;

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


            document.querySelector(".filtre").classList.add("slide-in");
            modalContent.classList.add("fade-in");
            document.querySelector(".filtre").classList.remove("slide-out");
            modalContent.classList.add("modalInfo");
            document.querySelector(".modalBody").innerHTML = "";

            let ulElt = document.createElement("ul");
            ulElt.style.listStyleType = "none";
            ulElt.setAttribute("id", "listeResultat");
            document.querySelector(".modalBody").appendChild(ulElt);

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

    xmlhttp.open("POST", "processing/creerProjet.php");
    xmlhttp.send(formData);


}

document.querySelector("#btnOk").addEventListener("click", closeModal);

function closeModal(){
    modalContent.classList.add("fade-out");

    setTimeout( () =>{
        modalContent.classList.remove("fade-in");
        modalContent.classList.remove("fade-out");

    },300);

    document.querySelector(".filtre").classList.add("slide-out");

}

function deleteProject(id) {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

        if (this.readyState === 4 && this.status === 200) {
            let res = JSON.parse(xmlhttp.responseText);
            console.info(res);

            if(res === "ok"){
                showSnackbar("Projet " + id + " supprimé.", "#43A047", id);
            }else if(res === "pasdeprojet"){
                showSnackbar("Erreur, réessayer.", "#F44336", id);
            }else if(res === "erreur"){
                showSnackbar("Erreur lors de la suppression.", "#F44336", id)
            }

        }

    };

    xmlhttp.open("POST", "processing/deleteProjet.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id="+id);


}

function showSnackbar(text, couleur, id) {
    var x = document.getElementById("snackbar");

    x.innerHTML = text;
    x.className = "show";
    x.style.backgroundColor = couleur;
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    setTimeout(function(){ document.getElementById("itemList-"+id).classList.add("hideItemProjet"); }, 3000);
}