<?php

require_once 'Modele/Modele.php';


class Absence extends Modele {

	//Renvoie la liste de toutes les diponibilités des joueurs par date
    public function getAbsence() {
        $sql = 'select * from ABSENCE';
        $absence = $this->executerRequete($sql);
        return $absence;
    }

    // Ajoute une disponibilité d'un joueur a une date donnée
    public function ajouterAbsence($idjoueur,$nom,$prenom,$date,$absence) {
        $sql = 'insert into ABSENCE(ID_joueur,NOM,PRENOM,DATE_ABSENCE,DISPONIBILITE)'
            . ' values(?,?,?,?,?)';
        $this->executerRequete($sql, array($idjoueur,$nom,$prenom,$date,$absence));
    }
    
    //selectionne toutes les dates dans l'ordre
    public function getDate(){
		$sql = 'select DISTINCT DATE_ABSENCE from ABSENCE order by DATE_ABSENCE';
        $date = $this->executerRequete($sql);
        return $date;
	}
    
    // Supprime une absence dans la base
    public function supprimerAbsence($idjoueur) {
        $sql = 'update ABSENCE set DISPONIBILITE=NULL where ID_joueur=?';
        $this->executerRequete($sql, array($idjoueur));
    }
    
    //selectionne la disponibilité des joueurs pour une date donnée
    public function selectionParDate($date){
		$sql = 'select * from ABSENCE where DATE_ABSENCE=?';
		$disponibilite = $this->executerRequete($sql, array($date));
		return $disponibilite;
	}
    
    
}

?>
