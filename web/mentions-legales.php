<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Portfolio - Mentions légales</title>
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0a22fe5e55.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body>

<div id="loader">
    <div id="load-7"></div>
</div>

<!-- Start navigation -->

<div id="mainLoad">


    <header>
        <div id="headerBox">
            <img src="images/logo.png" alt="">
            <h1>Développeur web full stack</h1>
            <h2>Etudiant & Auto-entrepreneur</h2>
            <div id="container-scroll">
                <div class="scroll scrollProfil"></div>
            </div>
        </div>
    </header>
    <nav id="navbar">
        <a href="" class="titleNav">Desaintfucien Augustin</a>

        <span id="burger"></span>

        <div id="contentNav">
            <a href="index.php#profil">A propos</a>
            <a href="index.php#service">Services</a>
            <a href="">Technologies</a>

            <a class="scrollTo" href="" name="projet">Projet</a>
            <a class="scrollTo" href="" name="contact">Contact</a>

        </div>
        <div class="networkNav">
            <a href="https://github.com/augustinde" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://codepen.io/Serkox" target="_blank"><i class="fab fa-codepen"></i></a>
        </div>
    </nav>

    <!-- End navigation -->
    <div class="screenSidebar"></div>
    <div id="containerSidebar">
        <div class="contentSidebar">
            <h2>Veille technologique</h2>
            <div class="textVeille">
                <p>Afin d'assurer une veille technologique, j'ai mis en place un agrégateur de flux RSS et mis en place un automatisme de web scraping pour la récupération d'articles lorsque qu'aucun flux RSS n'était disponible. Voici les mutliples articles qui ont attiré mon attention :</p>
            </div>
            <div class="columnCardVeille">

                <div class="cardVeille">
                    <img src='images/php_veille.jpg' alt=''>
                    <a href="https://www.arthurweill.fr/10-enseignements-et-bonnes-pratiques-php/">Bonne pratique PHP</a>
                </div>

                <div class="cardVeille">
                    <img src='images/rtx3060.jpg' alt=''>
                    <a href="https://www.youtube.com/watch?v=6pclmmpqjE8">RTX 3060 de NVIDIA</a>
                </div>

                <div class="cardVeille">
                    <img src='images/symfony_veille.png' alt=''>
                    <a href="https://symfony.com/blog/moving-script-inside-head-and-the-defer-attribute">News Symfony  </a>
                </div>

                <div class="cardVeille">
                    <img src='images/php_veille.jpg' alt=''>
                    <a href="https://www.arthurweill.fr/10-facons-de-coder-la-meme-chose-en-php/">10 façons de coder la même chose en PHP</a>
                </div>

                <div class="cardVeille">
                    <img src='images/rtx3060ti.jpg' alt=''>
                    <a href="https://www.youtube.com/watch?v=D4BotM49Eok">RTX 3060 TI de NVIDIA</a>
                </div>

                <div class="cardVeille">
                    <img src='images/cpu.jpg' alt=''>
                    <a href="https://www.youtube.com/watch?v=Lld0eTZ2Vsk&t=24s">Quels processeur choisir ?</a>
                </div>

                <div class="cardVeille">
                    <img src='images/rx6900xt.webp' alt=''>
                    <a href="https://www.youtube.com/watch?v=UKW24KFQrPo">RX 6800XT, 6800 et 6900XT d'AMD</a>
                </div>
            </div>
        </div>

        <span id="btnVeilleTechno" class="hoverBtnVeille">
                <i class="fas fa-space-shuttle fa-2x"></i>
            </span>
    </div>
    <div id="main">



    </div>

    <footer class="not-visible effet">

        <div class="wrapperFooter">
            <div class="mainFooter">
                <h4>A propos</h4>
                <p>Passionné des technologies du web et étudiant dans ce secteur, je suis développeur web full stack, freelance.
                    Je réalise des sites web en passant du cahier des charges jusqu'à la mise en ligne.
                    Je conçois le design en mettant en avant la meilleure expérience utilisateur ainsi qu'une bonne qualité de code.</p>
            </div>
            <div class="asideFooter asideFooter-1">
                <h4>Navigation</h4>
                <ul>
                    <li>Mentions légales</li>
                    <li>CGU</li>
                    <li>CGV</li>
                </ul>
            </div>
            <div class="asideFooter asideFooter-2">
                <h4>Contact</h4>
                <ul>
                    <li>Desaintfucien Augustin</li>
                    <li>06.75.08.57.95</li>
                    <li>contact@desaintfucienaugustin.fr</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="wrapperFooter">
            <div class="copyrightFooter">
                Copyright &copy; <?php echo date("Y"); ?> Tous droits réservés par Desaintfucien Augustin
            </div>
            <div class="iconFooter">
                <a href="https://github.com/augustinde" target="_blank">
                    <i class="fab fa-github"></i>
                </a>
                <a href="https://codepen.io/Serkox" target="_blank">
                    <i class="fab fa-codepen"></i>
                </a>
            </div>
        </div>

    </footer>

</div>
<!--modal projet-->
<div id="modalProjetId" class="effetModalProjet modalProjet">



</div>

<script src="js/script.js"></script>

</body>
</html>