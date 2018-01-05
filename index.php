<?php  

   require('public/init.inc.php');
   require('public/Contact.class.php');
    $resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
    $ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);

//recuperation des info utilisateur (moi)
$resultat = $pdo -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);
?>
<?php 
// on vérifie que le formulaire a bien été posté
if (!empty($_POST)) {
    // on éclate le tableau avec la méthode EXTRACT(), ce qui nous permet d'accéder directement aux champs par des variables
 extract($_POST);
// on effectue une validation des données du formulaire et notamment on vérifie la validité de l'email
 $valid = (empty($co_nom) || empty($co_email) || !filter_var($co_email, FILTER_VALIDATE_EMAIL) || empty($co_sujet) || empty($co_message)) ? false : true; // écriture ternaire pour if / else
// si tous les champs sont correctement renseignés
    if ($valid) {
        // on crée un nouvel objet (ou une instance) de la classe Contact.class.php
        $contact = new Contact();
// on utilise la méthode insertContact de la classe Contact.class.php
        $contact->insertContact($co_nom, $co_email, $co_sujet, $co_message);
        // on utilise la méthode sendMail de la classe Contact.class.php
        //$contact->sendEmail($sujet, $email, $message);
        // on efface les valeurs du formulaires
        unset($co_nom);
        unset($co_email);
        unset($co_sujet);
        unset($co_message);
        // on créé une variable de succès
        $success = 'Message envoyé !';
    }
}
?> 
<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
   <!--- Basic Page Needs
   ================================================== -->
   <meta charset="utf-8">
	<title>le premier site cv de Meryem</title>
	<meta name="description" content="">
	<meta name="author" content="">
   <!-- Mobile Specific Metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- CSS
    ================================================== -->
   <link rel="stylesheet" href="public/css/default.css">
	<link rel="stylesheet" href="public/css/layout.css">
   <link rel="stylesheet" href="public/css/media-queries.css">
   <link rel="stylesheet" href="public/css/magnific-popup.css">
   <!-- Script
   ================================================== -->
	<script src="js/modernizr.js"></script>
   <!-- Favicons
	================================================== -->
  <link rel="shortcut icon" href="favicon.png" >
</head>
<body>
   <!-- Header
        ================================================== -->
   <header id="home">
      <nav id="nav-wrap">
         <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
	      <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>
         <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="#home">Accueil</a></li>
            <li><a class="smoothscroll" href="#resume">cv</a></li>
            <li><a class="smoothscroll" href="#testimonials">Réalisations</a></li>                     
            <li><a class="smoothscroll" href="#contact">Contact</a></li>
         </ul> <!-- fin #nav -->
      </nav> <!-- fin #nav-wrap -->
      <div class="row banner">
         <div class="banner-text">
            <h1 class="responsive-headline"><?= $ligne_utilisateur['prenom']?> <?= $ligne_utilisateur['nom']?>  </h1>
             <h2><span>Intégratrice dévellopeuse 2017</span><br>
             <span> Architecte d'état : diplôme algérien  2007</span>
             </h2>
             <hr />
             <ul class="social">
                <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
               <!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
                <li><a href="https://www.linkedin.com/mynetwork/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
               <!--<li><a href="#"><i class="fa fa-instagram"></i></a></li>-->                        
            </ul>
         </div>
      </div>
       <!-- la fleche -->
      <p class="scrolldown">
         <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
      </p>
   </header> <!-- Fin Header  -->
     <!-- Resume Section
   ================================================== -->
   <section id="resume">
      <!--Formations-->
         <div class="row education">
         <div class="three columns header-col">
            <h1><span id="about">Formations</span></h1>
         </div>
         <div class="nine columns main-col">
            <div class="row item">
               <div class="twelve columns">
                  <P>Aujourd'hui</P>
                  <p><!-- class="info"-->Certifications Intégrateur /Développeur Web WebForce3  et LePoleS  Villeneuve la garenne <span>&bull;</span> </p>
                  <p>
                  Formation labellisée Grande Ecole du Numérique Technique de développement et intégration web et mobile 
                  </p>
               </div>
            </div> 
            <div class="row item">
               <div class="twelve columns">
                  <P>Architecte</P>
                  <p class="info">diplome d'Architecte  <span>&bull;</span> <em class="date">2007</em></p>
                  <p>Universite de Constantine Institut D’Urbanisme et De La Construction -Algerie-</p>
               </div>
            </div> <!--fin item  -->
         </div> <!--fin main-col  -->
      </div> <!-- fin row formation (education) -->
      <!-- fin de formations -->
      <!-- (Work)Expériences professionnelles-->
         <div class="row work">
         <div class="three columns header-col">
            <h1><span>Expériences</span></h1>
         </div>
         <div class="nine columns main-col">
            <div class="row item">
               <div class="twelve columns">
                  <P>Intégrateur/ développeur web </P>
                  <p class="info">le poleS Villeneuve la garenne
                  <span>&bull;</span> <em class="date">2017</em></p>
                  <p>
                  <!--pour rajouter autre choses-->
                  </p>
               </div>
            </div> <!--  fin item -->
            <div class="row item">
               <div class="twelve columns">
                  <P>Architecte</P>
                  <p class="info">en Algerie<span>&bull;</span> <em class="date">2008 à 2012</em></p>
                  <p>Architecte:
                  -Direction de l'urbanisme et de la construction Service d'urbanisme Algerie(Délivrance des permis de construction et de démolir Veille et application des lois d'urbanisme)<br>  
                  -Bureau d'études d'architecture Algerie Conception et réalisation de plans
                  </p>
               </div>
            </div> <!-- fin item  -->
         </div> <!--fin main-col  -->
      </div> <!-- fin (Expériences professionnelles )  -->
      <!--Compétence numérique(skill) -->
      <div class="row skill">
         <div class="three columns header-col">
         <h1><span>Compétences</span></h1>
         </div>
         <div class="nine columns main-col">
            <div class="bars">
				   <ul class="skills">
         <?php
         $resultat = $pdo -> prepare("SELECT * FROM t_competences WHERE utilisateur_id ='1'");
            $resultat->execute();?>
            <?php while ($ligne_competence = $resultat -> fetch()) { 
               //var_dump($ligne_competence);
               //echo $ligne_competence['c_niveau'];
               $niveau =$ligne_competence['c_niveau']."%";
              //echo $niveau;
               ?>
               <!--tant que il y a une resultat de competence affiche la (il est parti chercher et va l' afficher-->
                  <li><span class="bar-expand " data-percent="<?php echo  $niveau;?>"></span><em><?= $ligne_competence['competence'];?></em></li>
                 <?php } ?>
				</ul>
				</div><!-- fin Compétence-bras(skill-bars) -->
			</div> <!-- fin main-col  -->
      </div> <!--fin Compétence numérique  -->
   </section> <!-- fin Section-->

    <!-- Testimonials = Section (témoignage)= les realisatios = debut de slide
   ================================================== -->
   <!-- realisation-->
   <section id="testimonials">
      <div class="text-container">
         <div class="row">
         <div class="three columns header-col">
               <h1><span>Réalisations</span></h1>
            </div>
            <div class="nine columns flex-container">
               <div class="flexslider">
        
                  <ul class="slides"><!--slides-->
                     <li>
                        <blockquote>
                           <img src="public/images/photo1.PNG">
                        </blockquote>
                     </li> <!-- slide ends -->
                     <li>
                        <blockquote>
                            <img src="public/images/photo2.PNG">
                        </blockquote>
                     </li> <!-- slide ends -->
                     <!--<li>
                        <blockquote>
                            <img src="images/photo3.PNG">
                        </blockquote>
                     </li> <!-- slide ends -->
                  </ul>
                </div> <!-- div.flexslider ends -->
            </div> <!-- div.flex-container ends -->
         </div> <!-- row ends -->
       </div>  <!-- text-container ends -->
   </section> <!-- Testimonials Section End-->
 <!--
   <!- Le formulaire de contacte -->
   <section id="contact">
         <div class="row section-head">
            <div class="two columns header-col">
               <h1><span>Entrer en contact avec Meryem.</span></h1>
            </div>
            <div class="ten columns">
                 <p class="lead">Merci de me  contacter </p>                
            </div>
         </div>
         <div class="row">
            <div class="eight columns">
               <!-- form -->
               <form name="" id="" method="POST" action="index.php#contact">
                    <fieldset>
                        <div class="form-field">
                        <input name="co_nom" type="text" id="contactName" placeholder="Nom"    class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="co_email" type="email" id="contactEmail" placeholder="Email"    class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="co_sujet" type="text" id="contactSubject" placeholder="Sujet" class="full-width">
                    </div>
                    <div class="form-field">
                        <textarea name="co_message" id="contactMessage" placeholder="Message" rows="10" cols="50"   class="full-width"></textarea>
                    </div>
                    <div class="form-field">
                        <input type="submit" class="full-width" value="Envoyer" />
                    </div>
                    </fieldset>
                </form>  
               <!-- contact-warning -->
             <div id="message-warning">erreur dans votre message </div>
               <!-- contact-success -->
				   <<div id="message-success">
                  <i class="fa fa-check"></i>votre message etait bien enregistrer , merci!<br>
				   </div>
            </div>
         </div>
   </section>--> <!-- Contact Section End-->
     <!-- footer -->
      <footer>
      <div class="row">
         <div class="twelve columns">
            <ul class="social-links">
               <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
               <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
               <!--<li><a href="#"><i class="fa fa-instagram"></i></a></li>-->
            </ul>
            <ul class="copyright">
               <!--<li>&copy; Copyright 2014 CeeVee</li>-->
               <!--<li>Design by <a title="Styleshout" href="http://www.styleshout.com/">Styleshout</a></li>--> 
               <li><a href="admin/index.php">admin</a></li>  
            </ul>
         </div>
         <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#home"><i class="icon-up-open"></i></a></div>
      </div>
   </footer> <!-- Footer End-->
   <!-- Java Script
   ================================================== -->
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
   <script>window.jQuery || document.write('<script src="js/jquery-1.10.2.min.js"><\/script>')</script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
   <script src="js/jquery.flexslider.js"></script>
   <script src="js/waypoints.js"></script>
   <script src="js/jquery.fittext.js"></script>
   <script src="js/magnific-popup.js"></script>
   <script src="js/init.js"></script>
</body>
</html>