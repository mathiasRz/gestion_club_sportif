<?php

require_once 'Modele/Modele.php';


class Convocation extends Modele {
	
    
    //selectionne toutes les dates
    public function getDate(){
		$sql = 'select DATE_RENCONTRE from CALENDRIER';
        $date = $this->executerRequete($sql);
        return $date;
	}
    
    //Renvoie le calendrier des match a une date donnée
    public function getCalendrierByDate($date) {
        $sql = 'select * from CALENDRIER where DATE_RENCONTRE=?';
        $planing = $this->executerRequete($sql,array($date));
        return $planing;
    }
    
    
    //affiche la liste des joueurs présents pour un week end à une date donnée
    public function JoueursPresents($date){
		$sql = 'select NOM,PRENOM from ABSENCE where DATE_ABSENCE=? && DISPONIBILITE=NULL';
		$joueurs = $this->executerRequete($sql,array($date));
		return $joueurs;
	}
    
}

?>
