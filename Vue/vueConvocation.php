<?php $this->titre = "Convocation"; ?>

<form method="post" action="index.php">
<SELECT name="date" size="1">
<?php foreach ($dates as $date) {
	$d=$date['DATE_RENCONTRE'];
	echo "<OPTION>$d";
}
?>
<input type="submit" value="OK">
</SELECT>
</form>

<?php if (isset($_POST['date'])){
	$str = "<table><tr>";
	
	$compet = array();
	$adverse = array();
	$ville = array();
	$site = array();
	$heure = array();
	$equipe = array();
	
	foreach ($planing as $match){
		array_push($compet,$match['COMPETITION']);
		array_push($adverse,$match['EQUIPEADVERSE']);
		array_push($ville,$match['VILLE']);
		array_push($site,$match['SITE']);
		array_push($heure,$match['HEURE']);
		array_push($equipe,$match['EQUIPE']);
	}
	
	$str .= "<th>Competition</th>";
	foreach ($compet as $val){
		$str .= "<td>$val</td>";
	}
	$str.="</tr>";
	
	
	$str .= "<tr><th>Equipe adverse</th>";
	foreach ($adverse as $val){
		$str .= "<td>$val</td>";
	}
	$str.="</tr>";
	
	$str .= "<tr><th>Ville</th>";
	foreach ($ville as $val){
		$str .= "<td>$val</td>";
	}
	$str.="</tr>";
	
	$str .= "<tr><th>Site</th>";
	foreach ($site as $val){
		$str .= "<td>$val</td>";
	}
	$str.="</tr>";
	
	$str .= "<tr><th>Heure</th>";
	foreach ($heure as $val){
		$str .= "<td>$val</td>";
	}
	$str.="</tr>";
	
	$str .= "<tr><th>Equipe</th>";
	foreach ($equipe as $val){
		$str .= "<td>$val</td>";
	}
	$str.="</tr>";
	
	$str .= "</table>";
	echo $str;
	
	echo "<table><tr><th>Nom</th><th>Prenom</th></tr>";
	foreach ($joueurs as $joueur){
		$nom = $joueur['NOM'];
		$prenom = $joueur['PRENOM'];
		echo "<tr><td>$nom</td><td>$prenom</td></tr>";
	}
	echo "</table>";
}
?>



<p><a href="<?= "index.php"?>"> Retour à l'acceuil </a></p>

<p><a href="<?= "index.php?action=Absence"?>"> voir les joueurs présents pour les week-ends </a></p>

<?php
if (isset ($_SESSION['LOGIN'])) {
	$i=$_SESSION['LOGIN'];
	echo "<p>connecté en tant que $i.</br>
		     vous n'êtes pas $i ? <a href=\"index.php?action=Deconnexion\">Déconnexion</a></p>";
}
?>
