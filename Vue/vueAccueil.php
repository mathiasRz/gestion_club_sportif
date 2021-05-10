<?php $this->titre = "Accueil"; ?>

<p>Bienvenue sur le site de l' FC José !</p>

<?php 
if (isset ($identifiant)){
	$j=0;
		foreach ($identifiant as $idt){
			$_SESSION['LOGIN']=$idt['NOM'];
			$i=$_SESSION['LOGIN'];
			echo "<p>Bonjour $i vous êtes maintenant connecté.</p>";
			++$j;
		}
	if ($j==0) echo "<p>identifiants incorrectes veuilles réessailler : <a href=\"connexion.html\">Cliquez ici pour vous connecter</a></p>";
}
else if (isset ($_SESSION['LOGIN'])) {
	$i=$_SESSION['LOGIN'];
	echo "<p>connecté en tant que $i.</br>
		     vous n'êtes pas $i ? <a href=\"index.php?action=Deconnexion\">Déconnexion</a></p>";
}
else echo "<p>Vous êtes administrateur ? <a href=\"connexion.html\">Cliquez ici pour vous connecter</a></p>";
?>

<p>Voir le planing des matchs :</p> <a href="<?= "index.php?action=Calendrier"?>"> voir le planing des matchs </a>

<p>Ou encore, consulter les présences des joueurs pour les week-ends :</p> <a href="<?= "index.php?action=Absence"?>"> voir la disponibilité des joueurs</a>

<p><a href="<?= "index.php?action=Convocation"?>"> voir les convocations pour les matchs </a></p>


<p>voici la liste des joueurs de notre club </p>
<table>
	<tr><th>nom</th><th>prenom</th><th>catégorie</th><th>licencié</th></tr>
<?php foreach ($joueurs as $joueur): ?>
	<tr><td><?=$joueur['NOM']?></td><td><?=$joueur['PRENOM']?></td><td>senior</td><td><?=$joueur['LICENCIE']?></td></tr>
<?php endforeach; ?>
</table>
