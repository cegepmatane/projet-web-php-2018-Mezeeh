<?php
	if(!empty($_POST["confirmation-oui"]) || !empty($_POST["confirmation-non"]))
	{
		//echo "formulaire envoye";
		include_once "action-supprimer-jeu.php";
	}

    include_once "base-de-donnees.php";

    $numero = $_GET["jeu"];

    $LIRE_JEU = "SELECT * FROM jeu WHERE idJeu = $numero";
    $requeteLireJeu = $pdo->prepare($LIRE_JEU);
    $requeteLireJeu->execute();
    $jeu = $requeteLireJeu->fetch();

    //print_r($jeu);
    //var_dump($jeu);
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<header>
		<h1>Administration des jeux eSports</h1>
		<nav></nav>
	</header>
	
	<section id="contenu">
		<header><h2>Supprimer un jeu</h2></header>
		<form method="post" action="liste-jeu.php">
			<input type="hidden" name="id" value="<?=$jeu["idJeu"]?>"/>
			
			Voulez-vous vraiment supprimer <?=$jeu["nom"]?> ?
			
			<input type="submit" name="confirmation-oui" value="Oui"/>
			<input type="submit" name="confirmation-non" value="Non"/>

			<input type="hidden" name="action-supprimer-jeu" value="1"/> 
		</form>
	</section>
</body>
</html>