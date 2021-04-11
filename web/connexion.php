<?php

    session_start();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0a22fe5e55.js" crossorigin="anonymous"></script>
    <title>Connexion</title>
    <link rel="stylesheet" href="css/mainAdmin.css">
    <style>

    </style>
</head>
<body>

    <section id="formConnexion">
        
        <h1 style="text-align: center; color:#fff;">Connexion</h1>
        <br>
        <form action="process/traitement-connexion.php" method="POST">
      
            <div class="colForm">
                            
                <div class="divInput">
                    <label for="inputUser" id="labelUser">Identifiant</label>
                    <input type="text" id="inputUser" name="inputUser">
                </div>

                <div class="divInput">
                    <label for="inputPassword" id="labelPassword">Mot de passe</label>
                    <input type="password" id="inputPassword" name="inputPassword">
                    <i class="fas fa-eye" id="iconShowPass"></i>
                </div>

                <div class="divCheckbox">
                    <input type="checkbox" name="checkConnect" value="ok" id="checkConnect">
                    <label for="checkConnect" id="labelCheckConnect">Maintenir la connexion</label>
                </div>
            
            </div>
            <br>
            <input type="submit" value="Connexion" id="btnConnexion">

        </form>

    </section>

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


    </script>

</body>
</html>