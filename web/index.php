<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Portfolio</title>
	<link rel="stylesheet" href="css/main.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="https://kit.fontawesome.com/0a22fe5e55.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
</head>
<body onload="requestDisplayAllProjets()">

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
        <div class="screenSidebar"></div>
        <div id="containerSidebar">
            <div class="contentSidebar">
                <h2>Veille technologique</h2>
                <div class="textVeille">
                    <p>Afin d'assurer une veille technologique, j'ai mis en place un agrégateur de flux RSS et mis en place un automatisme de web scraping pour la récupération d'articles lorsque qu'aucun flux RSS n'était disponible. Voici les mutliples articles qui ont attiré mon attention :</p>
                </div>
                <div class="columnCardVeille">

                    <div class="cardVeille">
                        <img src='https://images.unsplash.com/photo-1612889047716-3128cdd3ce58?crop=entropy&cs=srgb&fm=jpg&ixid=MXwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHw&ixlib=rb-1.2.1&q=85' alt=''>
                        <a href="">Nouvelle carte graphique</a>
                    </div>

                    <div class="cardVeille">
                        <img src='https://images.unsplash.com/photo-1613095247666-82a661314ebd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHw&ixlib=rb-1.2.1&q=80&w=400' alt=''>
                        <a href="">Nouvelle carte graphique</a>
                    </div>

                    <div class="cardVeille">
                        <img src='https://images.unsplash.com/photo-1613095247666-82a661314ebd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHw&ixlib=rb-1.2.1&q=80&w=400' alt=''>
                        <a href="">Nouvelle carte Lorem ipsum dolor sit amet.</a>
                    </div>

                    <div class="cardVeille">
                        <img src='https://images.unsplash.com/photo-1613095247666-82a661314ebd?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MXwxNDU4OXwwfDF8cmFuZG9tfHx8fHx8fHw&ixlib=rb-1.2.1&q=80&w=400' alt=''>
                        <a href="">Nouvelle carte graphique</a>
                    </div>

                </div>
            </div>

            <span id="btnVeilleTechno" class="hoverBtnVeille">
                <i class="fas fa-space-shuttle fa-2x"></i>
            </span>
        </div>
		<div id="main">
			
			<section id="profil" class="not-visible effet">

				<h1>A propos de moi</h1>
				<div class="containerProfil">
					<img src="images/photo.jpg" alt="">
					<p>Passionné des technologies du web et étudiant dans ce secteur, je suis développeur web full stack, freelance. 
						Je réalise des sites web en passant du cahier des charges jusqu'à la mise en ligne. 
						Je conçois le design en mettant en avant la meilleure expérience utilisateur ainsi qu'une bonne qualité de code.
						<br><br>
						Pour satisfaire vos exigences je vous propose une solution adapté à votre budget
					</p>
				</div>

                <button onclick="document.getElementById('linkCv').click();" id="btn6"><i class="fas fa-download"></i>Télécharger mon CV</button>
                <a id="linkCv" href="CV-Augustin.pdf" download hidden></a>

			</section>

			<br>

			
			<section id="service" class="not-visible effet">
				
				<h1>Services</h1>
                <br>
                <br>
                <div id="services">

                    <div class="servicesRight">

                        <div class="itemService itemServiceRight">
                            <h4>Intégration web</h4>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, quasi.</p>
                            <span><i class="fas fa-code fa-2x"></i></span>
                        </div>

                        <div class="itemService itemServiceRight">
                            <h4>Web design</h4>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, quasi.</p>

                            <span><i class="fas fa-pencil-alt fa-2x"></i></span>
                        </div>

                        <div class="itemService itemServiceRight">
                            <h4>Développement spécifique</h4>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, quasi.</p>
                            <span><i class="fas fa-wrench fa-2x"></i></span>
                        </div>

                    </div>

                    <div class="servicesLeft">

                        <div class="itemService itemServiceLeft">
                            <h4>Référencement naturel</h4>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, quasi.</p>
                            <span><i class="fas fa-search fa-2x"></i></span>
                        </div>

                        <div class="itemService itemServiceLeft">
                            <h4>Responsive design</h4>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, quasi.</p>

                            <span><i class="fas fa-mobile-alt fa-2x"></i></span>
                        </div>

                        <div class="itemService itemServiceLeft">
                            <h4>Refonte de site web</h4>
                            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nemo, quasi.</p>
                            <span><i class="fas fa-hammer fa-2x"></i></span>
                        </div>

                    </div>
                </div>

			</section>			

			<br>
			
			<section id="techno" class="not-visible effet">
				
				<h1>Technologies</h1>

                <div class="containerTechno">

                    <img class="technoItem" src="images/html5.png" alt="">
                    <img class="technoItem" src="images/CSS3.png" alt="">
                    <img class="technoItem" src="images/JavaScript.png" alt="">
                    <img class="technoItem" src="images/mysql.png" alt="">
                    <img class="technoItem" src="images/php.png" alt="">
                    <img class="technoItem" src="images/logo-symfony.png" alt="">
                    <img class="technoItem" src="images/csharp.png" alt="">

                </div>
				

			</section>
			<br>


			<section id="projet" class="not-visible effet">

				<h1>Projets</h1>

                <br>

                <div class="rowCard" id="rwCard">




                </div>



			</section>


            <section id="contact" class="not-visible effet">

                <h1>Contact</h1>

                <br>

                <div class="rowContact">

                    <form>

                        <div class="colForm">

                            <div class="divInput">
                                <input data-namelabel="labelNom" type="text" id="inputNom" name="nom">
                                <label data-namelabel="labelNom" for="nom" id="labelNom">Nom & prénom</label>
                            </div>

                            <div class="divInput">
                                <input data-namelabel="labelEmail" type="email" id="inputEmail" name="email">
                                <label data-namelabel="labelEmail" for="email" id="labelEmail">Email</label>
                            </div>

                            <div class="divInput">
                                <textarea data-namelabel="labelMessage" name="message" id="inputMessage" cols="40" rows="10" style="resize:none;"></textarea>
                                <label data-namelabel="labelMessage" id="labelMessage" for="message">Message</label>
                            </div>

                            <div class="divInput">
                                <button id="btnSubmit">Envoyer</button>
                            </div>

                        </div>

                    </form>

                    <div class="infoContact">



                    </div>


                </div>

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
    <!--modal projet-->
    <div id="modalProjetId" class="effetModalProjet modalProjet">



    </div>

	<script src="js/script.js"></script>

</body>
</html>