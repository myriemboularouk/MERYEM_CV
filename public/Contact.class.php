<?php 

class Contact{


private $co_nom;    
private $co_email;
private $co_sujet;
private $co_message;

// fonction d'insertion dans la BDD
    public function insertContact($co_nom, $co_email, $co_sujet, $co_message){


    // on récupère les données rentrées par l'utilisateur
    $this->co_nom = strip_tags($co_nom);
    $this->co_email = strip_tags($co_email);
    $this->co_sujet = strip_tags($co_sujet);
    $this->co_message = strip_tags($co_message);

    // on requiert le fichier connexion.php qui contient l'accès à la BDD
        require('init.inc.php');

         // on crée une requête puis on l'exécute
        $req = $pdo->prepare('INSERT INTO t_commentaires (co_nom, co_email, co_sujet, co_message) VALUES (:co_nom, :co_email, :co_sujet, :co_message)');
        $req->execute([//on cree une requet et on l'execute

            ':co_nom' => $this->co_nom, // on attribue à la variable co_nom la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'être posté.
            ':co_email' => $this->co_email,
            ':co_sujet' => $this->co_sujet,
            ':co_message' => $this->co_message]);


        
        // on ferme la requête pour protéger des injections
        $req->closeCursor();

    }/*fin  public function insertContact */


}









 ?>