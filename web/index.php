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
                    <img class="technoItem" src="images/logo-symfony.png" alt="">
                    <img class="technoItem" src="images/php.png" alt="">
                    <img class="technoItem" src="images/mysql.png" alt="">
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
                        <li><a id="btnOpenMentions">Mentions légales</a></li>
                        <li><a id="btnOpenCGV">CGV</a></li>
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

    <!--modal mentions légales-->
    <div id="modalMentionsId" class="effetModalMentions modalMentions">

        <div id="ctModalMentions" class="contentModal">
            <div id="headerModalMentionsId" class="headerModal">
                <i onclick="closeModalMentionsFunction()" id="closeModalMentionsId" class="fas fa-times closeModal" aria-hidden="true"></i>
                <h1 id="titreModalh1">Mentions légales</h1>
            </div>
            <div id="bodyModalMentionsId">
                <div class="contentModalMentions">
                    <p>Conformément aux dispositions de la loi n°2004-575 du 21 juin 2004 pour la confiance en l’économie numérique, il est précisé aux utilisateurs du site desaintfucienaugustin.fr l’identité des différents intervenants dans le cadre de sa réalisation et de son suivi.</p>
                    <br>
                    <h3>Edition du site</h3>

                    <p>Le site desaintfucienaugustin.fr est édité par la société Desaintfucien Augustin avec le numéro de SIRET est 84934233200012 et dont le siège social est situé : 6 rue jacques duclos 02420 Nauroy</p>
                    <br>
                    <h3>Coordonnées</h3>

                    <ul>
                        <li>Editeur
                            <ul>
                                <li>Desaintfucien Augustin</li>
                                <li>Siège social : 6 rue jacques duclos - 02420 Nauroy</li>
                                <li>Téléphone : 06.75.08.57.95</li>
                                <li>Email : contact@desaintfucienaugustin.fr</li>

                            </ul>

                        </li>
                    </ul>


                    <ul>
                        <li>Hébergeur
                            <ul>
                                <li>OVH SAS</li>
                                <li>Siège social : 2 rue Kellermann - 59100 Roubaix - France</li>
                                <li>Téléphone : 1007</li>
                                <li>Email : support@ovh.com</li>
                            </ul>
                        </li>

                    </ul>
                    <br>

                    <h3>Conditions d’utilisation du site desaintfucienaugustin.fr</h3>

                    <p>L’utilisation du site desaintfucienaugustin.fr implique l’acceptation des conditions générales d’utilisations.
                        Ce site est accessible à tous moments à tous les utilisateurs, néanmoins une interruption pour cause de maintenance peut être décidée par Desaintfucien Augustin.
                        Le site desaintfucienaugustin.fr est mis à jour régulièrement par Desaintfucien Augustin. Les mentions légales peuvent être modifiées à tout moment, l’utilisateur est invité à les consulter de manière régulière.
                    </p>
                    <br>

                    <h3>Données personnelles</h3>

                    <p>Aucune donnée personnelle n’est collectée sur desaintfucienaugustin.fr.
                        Les données envoyées à partir du formulaire de contact sont utilisées uniquement pour établir un contact.
                    </p>
                    <br>

                    <h3>Cookies</h3>

                    <p>Le site desaintfucienaugustin.fr utilise un seul et unique cookie “PHPSESSID” qui est nécessaire pour le côté technique du site desaintfucienaugustin.fr.
                    </p>
                    <br>

                    <h3>Liens hypertextes</h3>

                    <p>Le site desaintfucienaugustin.fr comporte des liens hypertextes vers d’autres sites web. En aucun cas la responsabilité de Desaintfucien Augustin ne saurait être engagée en cas de contenu inadaptés.</p>
                    <br>

                    <h3>Droits d'auteurs</h3>
                    <p>Le site desaintfucienaugustin.fr est soumis à la législation française sur la propriété intellectuelle et le droit d’auteur. Le contenu du site, notamment les images, textes, logos, graphismes sont la propriété exclusive de Desaintfucien Augustin, à l’exception des logos, marques et contenus appartenant à d’autres sociétés ou auteurs. La reproduction, la distribution ou la représentation de tout à partie de ces éléments n’est pas autorisée sans l’accord de Desaintfucien Augustin.</p>
                </div>
            </div>
        </div>

    </div>


    <!--modal mentions légales-->
    <div id="modalCGVId" class="effetModalCGV modalCGV">

        <div id="ctModalCGV" class="contentModal">
            <div id="headerModalCGVId" class="headerModal">
                <i onclick="closeModalCGVFunction()" id="closeModalCGVId" class="fas fa-times closeModal" aria-hidden="true"></i>
                <h1 id="titreModalh1">Conditions Générales d'Utilisation</h1>
            </div>
            <div id="bodyModalCGVId">
                <div class="contentModalCGV">
                    <h3>Article 1 - Objet</h3>
                    <br>
                    <p>1.1. Les conditions générales de vente ont pour but de définir les relations contractuelles entre Augustin Desaintfucien et ses clients, aussi bien professionnels que particuliers concernant les prestations de services proposées.<br><br>
                        1.2. Cette entreprise est une entreprise de services informatiques qui à pour but, en France, de proposer des services de réalisation de site internet, d’application web, de référencement naturel et de gestion de serveur web.
                    </p>
                    <br>

                    <h3>Article 2 - Réalisation de la prestation</h3>
                    <br>
                    <p>2.1. Augustin Desaintfucien s’engage à réaliser la prestation
                        commandée conformément au contrat signé avec le client. Toute prestation non prévue dans le contrat ou toute modification de celui-ci par le client après sa signature feront l’objet d’une facturation supplémentaire.<br><br>
                        2.2. Les délais de réalisation des prestations sont fournis à titre indicatif et ne constituent aucun engagement d’Augustin Desaintfucien, le prestataire s’engage toutefois à minimiser le retard potentiel. De ce fait, aucune pénalité ne sera applicable et aucune compensation de pourra être demandée en cas de retard dans l’exécution des prestations et ce qu’elle qu’en soit la raison.
                    </p>
                    <br>

                    <h3>Article 3 - Hébergement</h3>
                    <br>

                    <p>3.1. Les services de création de site ou d’application web nécessitent un hébergement web, celui-ci peut être inclus dans le contrat (facturation en conséquence), le client peut néanmoins souscrire à ce contrat par ses propres moyens.<br><br>
                        3.2. Dans le cas où le client souscrit à l’hébergement par ses propres moyens, il sera tenu de communiquer à Augustin Desaintfucien les codes d'accès permettant au prestataire de réaliser la prestation.<br>
                        3.3. Le contrat d’hébergement a une durée déterminée,
                        généralement mensuelle ou annuelle, à compter de la date de sa
                        conclusion, laquelle peut être différente de la date de la
                        conclusion du contrat de prestation de service et/ou de sa
                        livraison et/ou de la mise en ligne du site. Le contrat
                        d’hébergement est renouvelable pour une même durée aux tarifs
                        et conditions définies à chaque échéance par Augustin Desaintfucien en fonction des tarifs et conditions du prestataire hébergeur.<br><br>
                        3.4. Quelle que soit la position du client au sujet du
                        renouvellement, Augustin Desaintfucien se réserve le droit de refuser
                        de renouveler le contrat d’hébergement notamment en cas de
                        non règlement par le client des sommes payé au titre du
                        contrat de prestation de service.
                    </p>
                    <br>

                    <h3>Article 4 - Référencement</h3>
                    <br>

                    <p>4.1. Augustin Desaintfucien s’engage à mener toutes les actions
                        permettant un référencement naturel (SEO) qui favorise une meilleure indexation et/ou un meilleur positionnement sur les moteurs de recherche, cette obligation étant une obligation de moyen et non pas de résultat.<br><br>
                        4.2. Toutefois, le référencement naturel étant en partie basé sur le
                        contenu du site web du client, dans le cas où le client aurait fourni à Augustin Desaintfucien des informations erronées, Augustin Desaintfucien ne saurait être tenu responsable.<br>
                        4.3. Dans le cas où le client souhaiterait confier le
                        référencement naturel de son site web à une entreprise concurrente d’Augustin Desaintfucien, à compter de la modification du site web, Augustin Desaintfucien ne pourra pas être tenu responsable d’un mauvais référencement.<br><br>
                        4.4. Dans tous les cas, le référencement naturel est aléatoire et ne permet pas d’avoir une certitude sur le positionnement ou l'indexation du site web. Le client admet que le référencement naturel est peu concurrentiel face au référencement payant.
                    </p>

                    <br>

                    <h3>Article 5 - Modalités de paiement</h3>
                    <br>
                    <p>5.1. Les parties s’accordent que le paiement de la prestation s’effectue de cette manière : acompte de 30% du prix de la totalité du contrat versé par le client à la signature du contrat, enfin le solde sera versé sous 30 jours à compter de la livraison de la prestation.<br><br>
                        5.2. Le cas des contrats de maintenance (mise à jour ou maintenance technique), le prix de la prestation sera facturé en totalité au plus tard 30 jours après réception de la facture.<br>
                        5.3. Les factures sont payables sous 30 jours au maximum, un délai supplémentaire de 30 jours peut s’appliquer si celui-ci est mentionné sur le contrat. Le règlement s’effectuera selon les modalités inscrites sur le contrat après accord entre le client et le prestataire selon les modalités suivantes : virement bancaire, chèque bancaire, moyen de paiement en ligne (paypal).
                    </p>
                    <br>

                    <h3>Article 6 - Retard de paiement</h3>
                    <br>
                    <p>6.1. Tout retard de paiement de la part du client entraînera immédiatement la suspension des services jusqu'à régularisation de l’impayé. Le client ne pourra en aucun cas demander une indemnité et mettre en cause Desaintfucien Augustin en cas de suspension.<br><br>
                        6.2. En cas de retard de paiement, Desaintfucien Augustin se réserve le droit d’appliquer une pénalité de retard égale au taux d’intérêt légal en vigueur et de mettre en demeure le client de payer la somme facturée.
                    </p>

                    <br>

                    <h3>Article 7 - Propriété intellectuelle</h3>
                    <br>
                    <p>7.1. Desaintfucien Augustin est le seul propriétaire de ses éléments d’identification, notamment le nom, logo, le site internet, la marque. Sauf accord entre les parties, le client admet que Augustin Desaintfucien peut réutiliser les codes développés pour le compte d’un autre site web.<br><br>
                        7.2. Le client déclare être le détenteur légitime des droits de propriété intellectuelle et industrielle des fichiers audio, vidéos, du texte ou des images fournies pour le site web ou à défaut de fournir des contenus libres de droit. Augustin Desaintfucien ne put être tenu responsable en cas de réclamation qui pourrait lui être formulée. Il revient au client d’obtenir les autorisations ou licences nécessaires pour l’exploitation de tout type de contenu.
                    </p>

                    <br>

                    <h3>Article 8 - Utilisation du site créé</h3>
                    <br>

                    <p>8.1. Augustin Desaintfucien se réserve le droit d’utiliser le site créé pour le client afin d’alimenter son annuaire de sites créés.<br><br>
                        8.2. Le client s’engage à laisser sur son site web une référence à Desaintfucien Augustin en tant que concepteur du site web.
                    </p>

                    <br>

                    <h3>Article 9 - Résiliation du/des contrat(s)</h3>
                    <br>

                    <p>9.1. Un manquement de l’une ou l’autre des parties pourra entraîner une résiliation du contrat conclu et dans les conditions suivantes :
                    <ul>
                        <li>- Envoie par la partie lésée à l’autre partie d’un courrier recommandé avec accusé de réception l’a mettant en demeure de rectifier ledit manquement.</li>
                        <li>- A défaut de rectification dans un délai d’un mois suivant la date d’envoi du courrier, le contrat sera résilié.</li>
                    </ul>
                    <br>
                    9.2. La résiliation du contrat n'entraîne pas de remboursement des sommes déjà versées par le client et entraîne l’exigibilité immédiate du solde de la prestation restant à verser par le client. Tout prestation commencée est due dans son intégralité.
                    </p>

                    <br>

                    <h3>Article 10 - Confidentialité</h3>
                    <br>

                    <p>Toutes les informations partagées pour la réalisation du contrat entre les parties sont soumises au respect de la confidentialité, cela inclut le savoir-faire utilisé par Desaintfucien Augustin.
                    </p>

                    <br>

                    <h3>Article 11 - Acceptation et entrée en vigueur des CGV</h3>
                    <br>
                    <p>Le client reconnaît avoir eu communication des présentes Conditions Générales de Vente, préalablement à la signature du contrat d’une manière lisible et compréhensible.
                        Dès signature du contrat, le client accepte et adhère pleinement à ces présentes Conditions Générales de Vente et obligation au paiement des prestations commandées.
                    </p>
                </div>
            </div>
        </div>

    </div>

    <!--modal projet-->
    <div id="modalProjetId" class="effetModalProjet modalProjet">



    </div>

	<script src="js/script.js"></script>

</body>
</html>