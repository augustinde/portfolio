<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Portfolio - Veille technologique</title>
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
        <div id="langage">
            <a href="">FR</a> |
            <a href="">EN</a>
        </div>
    </header>
    <nav id="navbar">
        <a href="" class="titleNav">Desaintfucien Augustin</a>

        <span id="burger"></span>

        <div id="contentNav">
            <a class="scrollTo" name="profil" href="">A propos</a>
            <a class="scrollTo" name="service" href="">Services</a>
            <a class="scrollTo" name="techno" href="">Technologies</a>

            <!-- <div class="dropdown">
                <span>Services <i class="fas fa-level-down-alt"></i></span>
                <div class="dropdown-content">
                    <a href="">Professionnel</a>
                    <a href="">Association</a>
                </div>
            </div> -->

            <a class="scrollTo" href="" name="projet">Projet</a>
            <a class="scrollTo" href="" name="contact">Contact</a>
            <a href="" >Portfolio</a>

        </div>
        <div class="networkNav">
            <a href="https://github.com/augustinde" target="_blank"><i class="fab fa-github"></i></a>
            <a href="https://codepen.io/Serkox" target="_blank"><i class="fab fa-codepen"></i></a>
        </div>
    </nav>

    <!-- End navigation -->

    <div id="main">

        <section id="veilleTechno" class="not-visible effet">



        </section>

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
                    <li><a href="veille-techno.php">Veille informatique</a></li>
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
                Copyright &copy; 2021 Tous droits réservés par Desaintfucien Augustin
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


<script src="js/script.js"></script>

</body>
</html>