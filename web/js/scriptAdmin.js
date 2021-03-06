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

document.querySelector(".btnCollapseCompetence").addEventListener("click", (e) => {

    e.preventDefault();
    document.querySelector(".collapseCompetence").classList.toggle("expandCollapse");

});

document.querySelector(".btnCollapseTechnologie").addEventListener("click", (e) => {

    e.preventDefault();
    document.querySelector(".collapseTechnologie").classList.toggle("expandCollapse");

});

document.querySelector("#imageUpload").addEventListener("change", (e) => {

    document.querySelector("#imgPreview").setAttribute("src", URL.createObjectURL(event.target.files[0]));

});
