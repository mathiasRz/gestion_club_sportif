<?php

require_once 'Modele/Calendrier.php';
require_once 'Vue/Vue.php';

class ControleurCalendrier {

    private $calendrier;

    public function __construct() {
        $this->calendrier = new Calendrier();
    }

    // Affiche le calendrier
    public function affichage() {
        $cldr = $this->calendrier->getCalendrier();
        $vue = new Vue("Calendrier");
        $vue->generer(array('calendrier' => $cldr));
    }

    // Ajoute un match
    public function ajout($competition,$equipe,$equipeAdverse,$date,$heure,$ville,$site) {
        $this->calendrier->ajouterMatch($competition,$equipe,$equipeAdverse,$date,$heure,$ville,$site);
        // Actualisation de l'affichage
        $this->affichage();
    }
    
    // supprime un match
    public function supprime($equipe,$date,$heure) {
        $this->calendrier->supprimerMatchMatch($equipe,$date,$heure);
        // Actualisation de l'affichage
        $this->affichage();
    }
}

