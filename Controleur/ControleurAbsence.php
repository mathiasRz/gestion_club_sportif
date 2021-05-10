<?php

require_once 'Modele/Absence.php';
require_once 'Vue/Vue.php';

class ControleurAbsence {

    private $absence;

    public function __construct() {
        $this->absence = new Absence();
    }

    // Affiche les absences
    public function affichage() {
        $dates = $this->absence->getDate();
        $vue = new Vue("Absence");
        $vue->generer(array('absences' => $abs,'dates'=>$dates));
    }
    
    //affiche la liste des dsiponibilité des joueurs pour une date donnée
    public function GetAbsenceByDate($date){
		$absences = $this->absence->selectionParDate($date);
		$vue = new Vue("Absence");
		$dates = $this->absence->getDate();
		$vue->generer(array('dates' => $dates,'absences'=>$absences));
	}
    

    // Ajoute un joueur dans le tableau des absences
    public function ajout($idjoueur,$nom,$prenom,$date,$absence) {
        $this->absence->ajouterAbsence($idjoueur,$nom,$prenom,$date,$absence);
        // Actualisation de l'affichage
        $this->affichage();
    }
    
    // supprime un match
    public function supprime($idjoueur) {
        $this->absence->supprimerAbsence($idjoueur);
        // Actualisation de l'affichage
        $this->affichage();
    }
    
    public function selectionParDate($date){
		$this->absence->selectionParDate($date);
	}
}
