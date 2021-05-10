<?php

require_once 'Modele/Convocation.php';
require_once 'Vue/Vue.php';

class ControleurConvocation {

    private $convocation;

    public function __construct() {
        $this->convocation = new Convocation();
    }

    
    //affiche toutes les dates dans la vue convocation
    public function GetDates(){
		$dates = $this->convocation->getDate();
		$vue = new Vue("Convocation");
		$vue->generer(array('dates' => $dates));
	}
	
	
	//affiche le plaining de la date selectionnée
	public function GetCalendrierByDate($date){
		$planing = $this->convocation->getCalendrierByDate($date);
		$joueurs = $this->convocation->JoueursPresents($date);
		$vue = new Vue("Convocation");
		$dates = $this->convocation->getDate();
		$vue->generer(array('dates' => $dates,'planing'=>$planing,'joueurs'=>$joueurs));
	}

}
