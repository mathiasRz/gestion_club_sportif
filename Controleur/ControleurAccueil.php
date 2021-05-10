<?php

require_once 'Modele/Accueil.php';
require_once 'Vue/Vue.php';

class ControleurAccueil {

    private $accueil;

    public function __construct() {
        $this->accueil = new Accueil();
    }

	// Affiche la liste des joueurs du club
    public function affichage() {
        $joueurs = $this->accueil->getJoueurs();
        $vue = new Vue("Accueil");
        $vue->generer(array('joueurs' => $joueurs));
    }
    
    // donne les identifiants d'un administrateur qui veut se connecter
    public function connexion($nom,$password) {
		$identifiant = $this->accueil->connexion($nom,$password);
		//on garde la liste des joueurs
		$joueurs = $this->accueil->getJoueurs();
		$vue = new Vue("Accueil");
		$vue->generer(array('identifiant'=>$identifiant,'joueurs' => $joueurs));
	}

    
    // Ajoute un joueur
    public function ajout($idjoueur,$nom,$prenom,$licencie) {
        $this->accueil->ajoutJoueur($idjoueurs,$nom,$prenom,$licencie);
        // Actualisation de l'affichage
        $this->affichage();
    }
    
    //supprime un joueur
    public function supprime($idjoueur) {
        $this->accueil->suppJoueur($idjoueur);
        // Actualisation de l'affichage
        $this->affichage();
    }
    
    
    
    

}

