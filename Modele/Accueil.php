<?php

require_once 'Modele/Modele.php';


class Accueil extends Modele {

    // Renvoie la liste des joueurs
    public function getJoueurs() {
        $sql = 'select * from JOUEUR';
        $joueurs = $this->executerRequete($sql);
        return $joueurs;
    }
    
    //Renvoie les identifiants d'un administrateur qui souhaite se connecter
    public function connexion ($nom,$password){
		$sql = 'select NOM,PASSWORD from ADMINISTRATEURS where NOM=? && PASSWORD=?';
		$identifiants = $this->executerRequete($sql,array($nom,$password));
		return $identifiants;
	}
    
    // ajoute un joueur dans la base
    public function ajoutJoueur($idjoueur,$nom,$prenom,$licencie) {
		$sql = 'insert into JOUEUR(ID_joueur,NOM,PRENOM,CATEGORIE,LICENCIE) values (?,?,?,senior,?)';
		$result = $this->executerRequete($sql,array($idjoueur,$nom,$prenom,$licencie));
		
		return $result;
	}
    
    //supprime un joueur dans la base
    public function suppJoueur($idjoueur) {
		$sql = 'delete * from JOUEUR where ID_joueur=?';
		$result = $this->executerRequete($sql,array($idjoueur));
		
		return $result;
	}
	
	
	/** Renvoie les informations sur un joueurs
     * 
     * @param int $id L'identifiant du billet
     * @return array Le billet
     * @throws Exception Si l'identifiant du billet est inconnu
     
    public function getBillet($idBillet) {
        $sql = 'select BIL_ID as id, BIL_DATE as date,'
                . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET'
                . ' where BIL_ID=?';
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() > 0)
            return $billet->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
    }
    */

}

?>
