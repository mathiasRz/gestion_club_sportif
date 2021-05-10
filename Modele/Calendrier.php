<?php

require_once 'Modele/Modele.php';


class Calendrier extends Modele {

	//Renvoie la liste de tous les matchs de l'annee
    public function getCalendrier() {
        $sql = 'select * from CALENDRIER order by DATE_RENCONTRE';
        $calendrier = $this->executerRequete($sql);
        return $calendrier;
    }

    // Ajoute un match dans la base
    public function ajouterMatch($competition,$equipe,$equipeAdverse,$date,$heure,$ville,$site) {
        $sql = 'insert into CALENDRIER(CATEGORIE,COMPETITION,EQUIPE,EQUIPEADVERSE,DATE_RENCONTRE,HEURE,VILLE,SITE)'
            . ' values(senior, ?, ?, ?, ?, ?, ?, ?)';
        $this->executerRequete($sql, array($competition,$equipe,$equipeAdverse,$date,$heure,$ville,$site));
    }
    
    // Supprime un match dans la base
    public function supprimerMatch($equipe,$date,$heure) {
        $sql = 'delete * from CALENDRIER where EQUIPE=? && DATE_RENCONTRE=? && HEURE=?';
        $this->executerRequete($sql, array($equipe,$date,$heure));
    }
    
    
}

?>
