<?php

    session_start();

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
    <title>Connexion</title>
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
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>

    </div>

    <section id="formConnexion">
        
        <h1>Connexion</h1>

        <form action="traitement-connexion.php" method="POST">
      
            <div class="colForm">
                            
                <div class="divInput">
                    <input type="text" id="inputUser" name="inputUser">
                    <label for="inputUser" id="labelUser">Identifiant</label>
                </div>

                <div class="divInput">
                    <input type="password" id="inputPassword" name="inputPassword">
                    <label for="inputPassword" id="labelPassword">Mot de passe</label>
                    <i class="fas fa-eye" id="iconShowPass"></i> 
                </div>

                <div class="divCheckbox">
                    <input type="checkbox" name="checkConnect" value="ok" id="checkConnect">
                    <label for="checkConnect" id="labelCheckConnect">Maintenir la connexion</label>
                </div>
            
            </div>

            <input type="submit" value="Connexion">

        </form>

    </section>

    
    <?php 
        if(isset($_COOKIE["error"])){
            ?>

            <div id="modal">
                <span class="titleModal"><i class="fas fa-exclamation-triangle"></i> Erreur</span>
                <span class="closeModal" id="closeBtnModal"><i class="fas fa-times"></i></span>

            <?php   
            if($_COOKIE["error"] == "wrongPassword"){

            ?>
                <p>Le mot de passe n'est pas correct !</p>
            <?php

            }else if($_COOKIE["error"] == "emptyPassword"){

            ?>
                <p>Le mot de passe est vide !</p>
            <?php

            }else if($_COOKIE["error"] == "emptyUser"){

            ?>
                 <p>L'utilisateur est vide !</p>
            <?php

            }
            setcookie("error", NULL, -1);
        }
        ?>
            </div>
        <?php


        if(isset($_SESSION["user"])){
            header("Location: dashboard.php");
        }

    ?>
    

    <script>

        const showPass = document.getElementById("iconShowPass");

        showPass.addEventListener("click", function(){
            if(showPass.classList.contains("fa-eye")){
                showPass.classList.remove("fa-eye");
                showPass.classList.add("fa-eye-slash");
                document.getElementById("inputPassword").type = "text";
            }else{
                showPass.classList.remove("fa-eye-slash");
                showPass.classList.add("fa-eye");
                document.getElementById("inputPassword").type = "password";

            }
        });

        const inputUser = document.getElementById("inputUser");
        const inputPassword = document.getElementById("inputPassword");

        inputUser.addEventListener("focus", function(){
            document.getElementById("labelUser").classList.add("anim-label");
        });

        inputUser.addEventListener("blur", function(){
            let elt = document.getElementById("inputUser").value;
            if(elt.length <= 0){
                document.getElementById("labelUser").classList.remove("anim-label");
            }
        });

        inputPassword.addEventListener("focus", function(){
            document.getElementById("labelPassword").classList.add("anim-label");

        });

        inputPassword.addEventListener("blur", function(){
            let elt = document.getElementById("inputPassword").value;
            if(elt.length <= 0){
                document.getElementById("labelPassword").classList.remove("anim-label");
            }
        });



        const closeBtnModal = document.getElementById("closeBtnModal");

        closeBtnModal.addEventListener("click", function(){
            document.getElementById("modal").style.display = "none";
        });


    </script>

</body>
</html>