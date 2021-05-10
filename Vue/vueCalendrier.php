<?php $this->titre = "Calendrier"; ?>

<table>
	<tr><th>Categorie</th><th>Competition</th><th>Equipe</th><th>Equipe adverse</th><th>Date</th><th>Heure</th><th>Ville</th><th>Site</th></tr>
<?php foreach ($calendrier as $match): ?>
	<tr><td>senior</td><td><?=$match['COMPETITION']?></td><td><?=$match['EQUIPE']?></td><td><?=$match['EQUIPEADVERSE']?></td>
	<td><?=$match['DATE_RENCONTRE']?></td><td><?=$match['HEURE']?></td><td><?=$match['VILLE']?></td><td><?=$match['SITE']?></td></tr>
<?php endforeach; ?>
</table>

<p><a href="<?= "index.php"?>"> Retour à l'acceuil </a></p>

<p><a href="<?= "index.php?action=Absence"?>"> voir les joueurs présents pour les week-ends </a></p>

<?php
if (isset ($_SESSION['LOGIN'])) {
	$i=$_SESSION['LOGIN'];
	echo "<p>connecté en tant que $i.</br>
		     vous n'êtes pas $i ? <a href=\"index.php?action=Deconnexion\">Déconnexion</a></p>";
}
?>


