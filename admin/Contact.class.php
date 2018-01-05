//Contact.class.php
<?php
/*

 * Une classe c'est en fait un plan à partir duquel on va pouvoir créer plusieurs objets
 * un peu comme un moule dont on en obtient comme objets des gâteaux
 *
 * Une classe peut contenir plusieurs méthodes (ou fonctions)
 * par ex. une classe voiture peut avoir comme méthodes 'freiner' et 'accélerer'
 * et quand je créé un objet de la classe voiture, par ex. un 308 ou une porsche qui auront les
 * fonctionnalités de la classe voiture comme 'freiner' et 'accélerer'
 *la class prend une majuscule par convenssion.
 */

class Contact
{
   // déclaration des variables = champs de la table t_commentaires.sql(variable(boite) privée, on ne peut modifier la variable q'en passant par les méthodes de la class Contact)
   private $co_nom;
   private $co_email;
   private $co_sujet;
   private $co_message;

   // fonction d'insertion en BDD
   public function insertContact($co_nom, $co_email, $co_sujet, $co_message) {
    	// on récupère les données rentrées par l'utilisateur
        $this->co_nom = strip_tags($co_nom);//strip_tags:
		    $this->co_email = strip_tags($co_email); //$this: manupile l'objet lui meme.
        $this->co_sujet = strip_tags($co_sujet);// l'ordre est tres important.
        $this->co_message = strip_tags($co_message);
      
        // appelle la connexion à la BDD
          require('inc/init.inc.php');// on a besoin de se connecté maintenant.

          // on crée une requête puis on l'exécute
          $req = $pdo->prepare('INSERT INTO t_commentaires (co_nom, co_email, co_sujet, co_message) VALUES (:co_nom, :co_email, :co_sujet, :co_message)');
          $req->execute([//on crée une requete et la on execute.
            //je stock  
        	':co_nom'	=> $this->co_nom,//n attribue à la variable co_nom la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient 
            ':co_email'	=> $this->co_email,
            ':co_sujet'	=> $this->co_sujet,
            ':co_message'	=> $this->co_message]);


            // on ferme la requête pour protéger des injections par l'utilisateur(drop pour effacer la bdd)s
            $req->closeCursor();

      }

    // Bonus - envoi d'un email
    public function sendEmail($sujet, $email, $message) {
        $this->to = 'miatti.sebastien@live.fr';
        $this->email = strip_tags($email);
        $this->sujet = strip_tags($sujet);
        $this->message = strip_tags($message);
        $this->headers = 'From: ' . $this->email . "\r\n"; //retours à la ligne
        $this->headers .= 'MIME-version: 1.0' . "\r\n";
        $this->headers .= 'Content-type : text/html; charset=utf-8' . "\r\n";

        // on utilise la fonction mail() de PHP
        mail($this->to, $this->sujet, $this->message, $this->headers);
    }
}
