<?php require_once "../../src/App/include/authentification.php"; ?>

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

    <script src="../js/scriptAdmin.js"></script>

</body>
</html>
