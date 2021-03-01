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
				<br>
				<br>
                <br>

				<!--<div class="containerTechno">
                    <svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="150" height="150" xmlns="http://www.w3.org/2000/svg">
						<circle class="circle-chart__background" stroke="#efefef" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
						<circle class="circle-chart__circle" stroke="#FF5722" stroke-width="2" stroke-dasharray="100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
						<g class="circle-chart__info">
							<text class="circle-chart__percent" x="16.91549431" fill="#ff5722" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="6">HTML</text>
							<text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">100%</text>
						</g>
					</svg>

					<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="150" height="150" xmlns="http://www.w3.org/2000/svg">
						<circle class="circle-chart__background" stroke="#efefef" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
						<circle class="circle-chart__circle" stroke="#0276BC" stroke-width="2" stroke-dasharray="100" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
						<g class="circle-chart__info">
							<text class="circle-chart__percent" x="16.91549431" fill="#0276BC" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="6">CSS</text>
							<text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">100%</text>
						</g>
					</svg>

					<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="150" height="150" xmlns="http://www.w3.org/2000/svg">
						<circle class="circle-chart__background" stroke="#efefef" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
						<circle class="circle-chart__circle" stroke="#DEA33D" stroke-width="2" stroke-dasharray="80" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
						<g class="circle-chart__info">
							<text class="circle-chart__percent" x="16.91549431" fill="#DEA33D" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="6">JS</text>
							<text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">80%</text>
						</g>
					</svg>

					<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="150" height="150" xmlns="http://www.w3.org/2000/svg">
						<circle class="circle-chart__background" stroke="#efefef" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
						<circle class="circle-chart__circle" stroke="#788BC5" stroke-width="2" stroke-dasharray="70" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
						<g class="circle-chart__info">
							<text class="circle-chart__percent" x="16.91549431" fill="#788BC5" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="6">PHP</text>
							<text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">70%</text>
						</g>
					</svg>

					<svg class="circle-chart" viewbox="0 0 33.83098862 33.83098862" width="150" height="150" xmlns="http://www.w3.org/2000/svg">
						<circle class="circle-chart__background" stroke="#efefef" stroke-width="1" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
						<circle class="circle-chart__circle" stroke="#014462" stroke-width="2" stroke-dasharray="70" stroke-linecap="round" fill="none" cx="16.91549431" cy="16.91549431" r="15.91549431" />
						<g class="circle-chart__info">
							<text class="circle-chart__percent" x="16.91549431" fill="#014462" y="15.5" alignment-baseline="central" text-anchor="middle" font-size="6">SQL</text>
							<text class="circle-chart__subline" x="16.91549431" y="20.5" alignment-baseline="central" text-anchor="middle" font-size="4">70%</text>
						</g>
					</svg>
				</div>-->

                <div class="containerTechno">

                    <div class="technoItem">
                        <img src="images/html5.png" alt="">
                    </div>

                    <div class="technoItem">
                        <img src="images/CSS3.png" alt="">
                    </div>

                    <div class="technoItem">
                        <img src="images/JavaScript.png" alt="">
                    </div>

                    <div class="technoItem">
                        <img src="images/mysql.png" alt="">
                    </div>

                    <div class="technoItem">
                        <img src="images/php.png" alt="">
                    </div>

                    <div class="technoItem">
                        <img src="images/nodejs.png" alt="">
                    </div>

                    <div class="technoItem">
                        <img src="images/logo-symfony.png" alt="">
                    </div>

                    <div class="technoItem">
                        <img src="images/csharp.png" alt="">
                    </div>

                    <div class="technoItem">
                        <img src="images/unity.png" alt="">
                    </div>

                    <div class="technoItem">
                        <img src="images/java.png" alt="">
                    </div>

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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident aliquid inventore expedita, distinctio labore animi accusantium iste quo pariatur veniam dolore sunt vitae nobis delectus? Dolorum expedita veniam molestiae maiores.</p>
                </div>
                <div class="asideFooter asideFooter-1">
                    <h4>Navigation</h4>
                    <ul>
                        <li>Veille informatique</li>
                        <li>Mentions légales</li>
                        <li>CGU</li>
                        <li>CGV</li>
                    </ul>
                </div>
                <div class="asideFooter asideFooter-2">
                    <h4>Contact</h4>
                    <ul>
                        <li>Monsieur Personne</li>
                        <li>06.06.06.06.06</li>
                        <li>email.exemple@gmail.com</li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="wrapperFooter">
                <div class="copyrightFooter">
                    Copyright &copy; 2021 Tous droits réservés par Monsieur Personne
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