let scrollAllow = false;


window.addEventListener("load", function(){	
    document.getElementById("loader").style.visibility = "hidden";
    document.getElementById("mainLoad").style.visibility = "visible";
    scrollAllow = true;
    // console.log("ok");
});

window.addEventListener("scroll", function (){
    if(!scrollAllow){
        window.scrollTo(0,0);
    }
    
}, false);

document.getElementById("burger").addEventListener("click", function(){
    document.getElementById("burger").classList.toggle("anim-burger");
    document.getElementById("contentNav").classList.toggle("anim-contentNav")
});


const nav = document.getElementById("navbar");

let sticky = nav.offsetTop;

window.addEventListener("scroll", function (){

    const nav = document.getElementById("navbar");

    if(window.pageYOffset > sticky){
        nav.classList.add("fixedNav");
        // console.log("window" + window.pageYOffset);
        // console.log("sticky" + sticky);
    }else{
        nav.classList.remove("fixedNav");
    }
});


$('.scrollProfil').click(function(e) {
    e.preventDefault();
    $('html,body').animate({ scrollTop: ($('#navbar').offset().top)}, 1000, 'easeInOutQuad');
    if($("#burger").hasClass("anim-burger")){
        $("#burger").removeClass("anim-burger");
        $("#contentNav").removeClass("anim-contentNav");        
    }
});



$('.scrollTo').click(function(e) {
    e.preventDefault();
    // console.log(this);
    let anchor = $(this).attr("name");
    // console.log(anchor);
    $('html,body').animate({ scrollTop: ($("section[id='"+ anchor +"']").offset().top-80)}, 1000, 'easeInOutQuad');
    if($("#burger").hasClass("anim-burger")){
        $("#burger").removeClass("anim-burger");
        $("#contentNav").removeClass("anim-contentNav");        
    }

});









window.addEventListener("scroll", animScrollFade);

function animScrollFade(){
    const listDiv = document.querySelectorAll(".not-visible");
    listDiv.forEach((a, i) => {
        if(a.getBoundingClientRect().top < window.innerHeight/1.2){
            a.classList.add('visible');
        }
        // if(a.getBoundingClientRect().bottom >= window.innerHeight){
        // 	a.classList.remove('visible-'+i);
        // }
        
    });   
}

window.addEventListener("scroll", animScrollCircle);


function animScrollCircle(){
    const listDiv = document.querySelectorAll(".circle-chart__circle");
    listDiv.forEach((a, i) => {
        if(a.getBoundingClientRect().top < window.innerHeight/1.1){
            a.classList.add('circle-chart__circle_animation');
        }
        // if(a.getBoundingClientRect().bottom >= window.innerHeight){
        // 	a.classList.remove('visible-'+i);
        // }
        
    });
    
}

/*
*
*
* START REGION Modal projet
*
*
*/


//Eléments modal
let modalElt = document.getElementById("modalProjetId");

modalElt.addEventListener("click", function(e){
    if(e.target === modalElt){
        closeModalFunction();
    }
});

let modalEltMentions = document.getElementById("modalMentionsId");

modalEltMentions.addEventListener("click", function(e){
    if(e.target === modalElt){
        closeModalMentionsFunction();
    }
});

let modalEltCGV = document.getElementById("modalCGVId");

modalEltCGV.addEventListener("click", function(e){
    if(e.target === modalElt){
        closeModalCGVFunction();
    }
});


//Fonction fermeture du modal
function closeModalFunction(){

    let modalProjet = document.getElementById("modalProjetId");

    modalProjet.classList.add('hideModalProjet');

    setTimeout(() => {

        modalProjet.classList.remove('visibleModalProjet');
        modalProjet.classList.remove('hideModalProjet');
        modalProjet.innerHTML = "";

    },400);

}

//Fonction fermeture du modal
function closeModalMentionsFunction(){

    let modalMentions = document.getElementById("modalMentionsId");

    modalMentions.classList.add('hideModalMentions');

    setTimeout(() => {
        modalMentions.classList.remove('visibleModalMentions');
        modalMentions.classList.remove('hideModalMentions');

    },400);

}

//Fonction fermeture du modal
function closeModalCGVFunction(){

    let modalMentions = document.getElementById("modalCGVId");

    modalMentions.classList.add('hideModalCGV');

    setTimeout(() => {
        modalMentions.classList.remove('visibleModalCGV');
        modalMentions.classList.remove('hideModalCGV');

    },400);

}



function affichageImageModal() {

    document.getElementById("imageProjet").setAttribute("src", this.src);

}

//Fonction requete récupération du projet et affichage du modal
function requestViewProjet(id){

    let xmlhttp = new XMLHttpRequest();

    let contentModal = document.createElement("div");
    contentModal.setAttribute("id", "ctModal");
    contentModal.setAttribute("class", "contentModal");

    let headerModalElt = document.createElement("div");
    headerModalElt.setAttribute("id", "headerModalId");
    headerModalElt.setAttribute("class", "headerModal");

    let iModalElt = document.createElement("i");
    iModalElt.setAttribute("id", "closeModalId");
    iModalElt.setAttribute("class", "fas fa-times closeModal");
    iModalElt.addEventListener("click", closeModalFunction);
    headerModalElt.appendChild(iModalElt);

    let bodyModalElt = document.createElement("div");
    bodyModalElt.setAttribute("id", "bodyModalId");

    xmlhttp.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            let res = JSON.parse(xmlhttp.responseText);

            // console.info(res);

            let idProjet = res[0].id;
            let nomProjet = res[1].nom;
            let description = res[2].description;
            let urlDocFournit = res[3].urlDocFournit;
            let urlProjet = res[4].urlProjet;
            let technologies = res[5].technologies;
            let competences = res[6].competences;
            let images = res[7].images;

            // console.info(idProjet);
            // console.info(nomProjet);
            // console.info(description);
            // console.info(urlProjet);
            // console.info(urlDocFournit);
            // console.info(technologies);
            // console.info(competences);
            // console.info(images);

            //gestion modal projet

            modalElt.classList.add('visibleModalProjet');

            //Création du titre
            let titreModal = document.createElement("h1");
            titreModal.setAttribute("id", "titreModalh1");
            let texteTitreModal = document.createTextNode(nomProjet);

            titreModal.appendChild(texteTitreModal);
            headerModalElt.appendChild(titreModal);

            //Création de la première ligne du modal (contient images et technologies)
            let firstRowModal = document.createElement("div");
            firstRowModal.setAttribute("class","rowModal");

            //Creation de la div pour les technologies
            let secondRowModal = document.createElement("div");
            secondRowModal.setAttribute("class", "rowModal rowModal1");



            //Création de la partie description
            let descriptionModal = document.createElement("div");
            descriptionModal.setAttribute("id", "descriptionModal");

            let titreDescription = document.createElement("h3");
            titreDescription.setAttribute("id", "titreDescriptionModal");

            let texteTitreDescription = document.createTextNode("Description du projet");
            titreDescription.appendChild(texteTitreDescription);

            let contenuDescriptionModal = document.createElement("p");
            contenuDescriptionModal.setAttribute("id", "contenuDescriptionModal");

            let texteContenuDescriptionModal = document.createTextNode(description);
            contenuDescriptionModal.appendChild(texteContenuDescriptionModal);


            //Création de la partie contenant l'url du projet et l'url des documents fournit
            let urlModal = document.createElement("div");
            urlModal.setAttribute("id", "urlModal");

            let urlModalDocFournit = document.createElement("div");
            urlModalDocFournit.setAttribute("class", "urlModalChild");


            let titreUrlDocFournit = document.createElement("h3");
            titreUrlDocFournit.setAttribute("id", "titreUrlDocFournit");

            let textTitreUrlDocFournit = document.createTextNode("Liens du projet");
            titreUrlDocFournit.appendChild(textTitreUrlDocFournit);
            urlModalDocFournit.appendChild(titreUrlDocFournit);

            if(urlDocFournit != null){
                let contenuUrlDocFournit = document.createElement("a");
                contenuUrlDocFournit.href = urlDocFournit;
                contenuUrlDocFournit.innerHTML = "<i class='fas fa-project-diagram'></i> Lien du projet";
                contenuUrlDocFournit.target = "_blank";
                contenuUrlDocFournit.setAttribute("class", "lienModal");
                urlModalDocFournit.appendChild(contenuUrlDocFournit);

            }

            if(urlProjet != null){
                let contenuUrlProjet = document.createElement("a");
                contenuUrlProjet.href = urlProjet;
                contenuUrlProjet.innerHTML = "<i class='fas fa-project-diagram'></i> Document(s) fournis";
                contenuUrlProjet.target = "_blank";
                contenuUrlProjet.setAttribute("class", "lienModal");
                urlModalDocFournit.appendChild(contenuUrlProjet);

            }

            if(urlProjet == null && urlDocFournit == null){

                let paragrapheAucunUrl = document.createElement("p");
                paragrapheAucunUrl.setAttribute("id", "aucunLien");

                let textParagrapheAucunUrl = document.createTextNode("Aucun lien");
                paragrapheAucunUrl.appendChild(textParagrapheAucunUrl);
                urlModalDocFournit.appendChild(paragrapheAucunUrl);
            }


            urlModal.appendChild(urlModalDocFournit);

            //
            // let urlModalDocProjet = document.createElement("div");
            // urlModalDocProjet.setAttribute("class", "urlModalChild");
            //
            //
            // let titreUrlProjet = document.createElement("h3");
            // titreUrlProjet.setAttribute("id", "titreUrlProjet");
            //
            // let textTitreUrlProjet = document.createTextNode("Voir ce projet");
            // titreUrlProjet.appendChild(textTitreUrlProjet);
            //
            // contenuUrlProjet.href = urlProjet;
            // contenuUrlProjet.innerHTML = "<i class='fas fa-project-diagram'></i> Document(s) fournis";
            // contenuUrlProjet.target = "_blank";
            // contenuUrlProjet.setAttribute("class", "lienModal");
            //
            // urlModalDocProjet.appendChild(titreUrlProjet);
            // urlModalDocProjet.appendChild(contenuUrlProjet);
            //
            // urlModal.appendChild(urlModalDocProjet);

            //Partie technologies
            let technologiesModal = document.createElement("div");
            technologiesModal.setAttribute("id", "technologiesModal");

            let titreTechnologies = document.createElement("h3");
            titreTechnologies.setAttribute("id", "titreTechnologieModal");

            let texteTitreTechnologies = document.createTextNode("Technologies");
            titreTechnologies.appendChild(texteTitreTechnologies);

            let listTechnologies = document.createElement("div");
            listTechnologies.setAttribute("id", "listTechnologieModal");

            technologies.forEach(techno => {

                let eltTechnologie = document.createElement("span");
                eltTechnologie.setAttribute("class", "spanTechnologies");

                let txtEltTechnologie = document.createTextNode(techno.libelle);

                eltTechnologie.appendChild(txtEltTechnologie);
                listTechnologies.appendChild(eltTechnologie);

            });


            //Partie compétences
            let competencesModal = document.createElement("div");
            competencesModal.setAttribute("id", "competencesModal");

            let titreCompetences = document.createElement("h3");
            titreCompetences.setAttribute("id", "titreCompetenceModal");

            let texteTitreCompetences = document.createTextNode("Compétences");
            titreCompetences.appendChild(texteTitreCompetences);

            let listCompetences = document.createElement("div");
            listCompetences.setAttribute("id", "listCompetenceModal");

            competences.forEach(comp => {

                let eltCompetence = document.createElement("span");
                eltCompetence.setAttribute("class", "spanCompetences");
                let txtEltCompetence = document.createTextNode(comp.libelle);
                eltCompetence.appendChild(txtEltCompetence);
                listCompetences.appendChild(eltCompetence);
            });



            //Création de la colonne pour accueil l'image primaire et la gallerie d'image
            let columnModal = document.createElement("div");
            columnModal.setAttribute("class", "columnGalleryModal");


            //Création de l'image primaire
            let imageProjet = document.createElement("img");
            imageProjet.setAttribute("id", "imageProjet");
            imageProjet.setAttribute("src", images[0].cheminImage);
            imageProjet.setAttribute("class", "primaryImageModal");


            //Création de la ligne pour la gallerie
            let rowModalImageGallery = document.createElement("div");
            rowModalImageGallery.setAttribute("class", "testGallery");

            //Création et ajout des images à la gallerie
            images.forEach(element => {
                let imgElt = document.createElement("img");
                imgElt.src = element.cheminImage;
                imgElt.addEventListener("click", affichageImageModal);
                rowModalImageGallery.appendChild(imgElt);
            });



            //Ajout de la description à la div .descriptionModal
            descriptionModal.appendChild(titreDescription);
            descriptionModal.appendChild(contenuDescriptionModal);

            //Ajout du titre technologies et de la liste des technologie a la div .technologiesModal
            technologiesModal.appendChild(titreTechnologies);
            technologiesModal.appendChild(listTechnologies);

            //Ajout du titre compétences et de la liste des compétences a la div .competencesModal
            competencesModal.appendChild(titreCompetences);
            competencesModal.appendChild(listCompetences);

            //Ajout de l'image primaire et de la gallerie d'image à la colonne .columnModal
            columnModal.appendChild(imageProjet);
            columnModal.appendChild(rowModalImageGallery);


            //Ajout des modules à la première ligne
            firstRowModal.appendChild(columnModal);
            firstRowModal.appendChild(descriptionModal);

            //Ajout des modules à la seconde ligne
            secondRowModal.appendChild(technologiesModal);
            secondRowModal.appendChild(competencesModal);
            secondRowModal.appendChild(urlModal);

            //AJOUT DES ROW AU CORPS DU MODAL
            bodyModalElt.appendChild(firstRowModal);//1er rowModal
            bodyModalElt.appendChild(secondRowModal);//2nd rowModal

            contentModal.appendChild(headerModalElt);
            contentModal.appendChild(bodyModalElt);
            modalElt.appendChild(contentModal);
        }
    };

    xmlhttp.open("POST", "process/getProjet.php");
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    xmlhttp.send(encodeURI("id="+id));

}




function requestDisplayAllProjets(){

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            let res = JSON.parse(xmlhttp.responseText);

            // console.log(res);
            res.forEach(element => {
                //Récupération des données
                let nomProjet, idProjet, array_images = [];

                idProjet = element[0].id;
                nomProjet = element[1].nom;

                element[2].images.forEach(img => {
                    array_images.push(img);
                });

                //Création de la card
                let elementCardProjet = document.createElement("div");
                elementCardProjet.setAttribute("class", "cardProjet");
                elementCardProjet.setAttribute("id", idProjet);

                let elementImage = document.createElement("img");

                elementImage.src = array_images[0].cheminImage;
                elementImage.alt = "Image projet N°"+idProjet;

                let elementContenuCard = document.createElement("div");
                elementContenuCard.setAttribute("class", "contenuCard");

                let elementP = document.createElement("p");

                let textElementP = document.createTextNode(nomProjet);

                elementP.appendChild(textElementP);
                elementContenuCard.appendChild(elementP);
                elementCardProjet.appendChild(elementImage);
                elementCardProjet.appendChild(elementContenuCard);

                document.getElementById("rwCard").appendChild(elementCardProjet);

            });

            //Ajout de l'event pour afficher le modal au click

            let array_CardProjet = document.querySelectorAll(".cardProjet");
            for(let k = 0; k<array_CardProjet.length; k++){

                array_CardProjet[k].addEventListener("click", function(){
                    let idProjet = this.getAttribute("id");
                    requestViewProjet(idProjet);

                });

            }

        }
    };

    xmlhttp.open("POST", "process/getAllProjet.php",true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send();



}



const inputNom = document.getElementById("inputNom");
const inputEmail = document.getElementById("inputEmail");
const inputMessage = document.getElementById("inputMessage");

const labelNom = document.getElementById("labelNom");
const labelEmail = document.getElementById("labelEmail");
const labelMessage = document.getElementById("labelMessage");

inputNom.addEventListener("focus", toogleAnimLabel);
inputNom.addEventListener("blur", toogleAnimLabel);
labelNom.addEventListener("click", toogleAnimLabel);

inputEmail.addEventListener("focus", toogleAnimLabel);
inputEmail.addEventListener("blur", toogleAnimLabel);
labelEmail.addEventListener("click", toogleAnimLabel);

inputMessage.addEventListener("focus", toogleAnimLabel);
inputMessage.addEventListener("blur", toogleAnimLabel);
labelMessage.addEventListener("click", toogleAnimLabel);


function toogleAnimLabel(e){
    let idLabel = e.target.dataset.namelabel;
    let labelTarget = document.getElementById(idLabel);

    if(e.type === "click"){

        labelTarget.classList.add("anim-label");

    }else if(e.type === "focus"){

        labelTarget.classList.add("anim-label");

    }else if(e.type === "blur"){

        if(e.target.value.length < 1){
            labelTarget.classList.remove("anim-label");
        }
    }
}




let btnSubmitMail = document.getElementById("btnSubmit");
btnSubmitMail.addEventListener("click", sendMail);


function sendMail(e) {
    e.preventDefault();

    let nomPrenom, email, message;
    nomPrenom = document.getElementById("inputNom").value;
    email = document.getElementById("inputEmail").value;
    message = document.getElementById("inputMessage").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function(){
        if(this.readyState === 4 && this.status === 200){
            let res = JSON.parse(xmlhttp.responseText);
            // console.log(res);
            // console.log(res['error']);

        }
    };

    let fd = new FormData();
    fd.append("nomPrenom", nomPrenom);
    fd.append("email", email);
    fd.append("message", message);

    xmlhttp.open("POST", "send_email.php");
    xmlhttp.send(fd);

}


function showSnackbar(text, couleur) {
    var x = document.getElementById("snackbar");

    x.innerHTML = text;
    x.className = "show";
    x.style.backgroundColor = couleur;
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}


//Gestion du module veille technologique
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

let openMentions = document.getElementById("btnOpenMentions");
let modalContentMentions = document.getElementById("modalMentionsId");

// document.getElementById("btnCloseMentions").addEventListener("click", closeModal);

openMentions.addEventListener("click", function(e){
    e.preventDefault();
    modalContentMentions.classList.add('visibleModalMentions');



});

let openCGV = document.getElementById("btnOpenCGV");
let modalContentCGV= document.getElementById("modalCGVId");

// document.getElementById("btnCloseMentions").addEventListener("click", closeModal);

openCGV.addEventListener("click", function(e){
    e.preventDefault();
    modalContentCGV.classList.add('visibleModalCGV');



});

