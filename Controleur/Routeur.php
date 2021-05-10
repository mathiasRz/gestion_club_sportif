<?php
session_start();

require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurCalendrier.php';
require_once 'Controleur/ControleurAbsence.php';
require_once 'Controleur/ControleurConvocation.php';
require_once 'Vue/Vue.php';

class Routeur {

    private $ctrlAccueil;
    private $ctrlCalendrier;
    private $ctrlAbsence;
    private $ctrlConvocation;

    public function __construct() {
        $this->ctrlAccueil = new ControleurAccueil();
        $this->ctrlCalendrier = new ControleurCalendrier();
        $this->ctrlAbsence = new ControleurAbsence();
        $this->ctrlConvocation = new ControleurConvocation();
    }

    // Route une requête entrante : exécution l'action associée
    public function routerRequete() {
        try {	
				if (isset ($_GET['action'])){
					if ($_GET['action']=='Calendrier'){
						$this->ctrlCalendrier->affichage();
					}
					else if ($_GET['action']=='Absence'){
						$this->ctrlAbsence->affichage();
					}
					else if ($_GET['action']=='Connexion'){
						$nom = $this->getParametre($_POST,'nom');
						$password = $this->getParametre($_POST,'password');
						$this->ctrlAccueil->connexion($nom,$password);
					}
					else if ($_GET['action']=='Deconnexion'){
						unset($_SESSION['LOGIN']);
						$this->ctrlAccueil->affichage();
					}
					else if ($_GET['action']=='Convocation'){
						$this->ctrlConvocation->GetDates();
					}
				    else
						throw new Exception("Action non valide");
				}
				else if (isset($_POST['date'])){
						$date = $this->getParametre($_POST,'date');
						$this->ctrlConvocation->GetCalendrierByDate($date);
				}
				else if (isset($_POST['dateAbs'])){
						$date = $this->getParametre($_POST,'dateAbs');
						$this->ctrlAbsence->GetAbsenceByDate($date);
				}
				else 
					$this->ctrlAccueil->affichage();
            }
        catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    // Affiche une erreur
    private function erreur($msgErreur) {
        $vue = new Vue("Erreur");
        $vue->generer(array('msgErreur' => $msgErreur));
    }

    // Recherche un paramètre dans un tableau
    private function getParametre($tableau, $nom) {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        }
        else
            throw new Exception("Paramètre '$nom' absent");
    }

}
