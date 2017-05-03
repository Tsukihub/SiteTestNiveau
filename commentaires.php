
<?php
require "required/header.php";

$pdo = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');

if (isset($_GET['billet']) && !empty($_GET['billet'])){
	$billet=htmlspecialchars($_GET['billet']);



	$req = $pdo->prepare("SELECT 
			billets.titre, 
			billets.contenudetaille,
			commentaires.auteur,
			commentaires.commentaire
			FROM billets 
			LEFT JOIN commentaires
			ON billet.id = commentaires.billet_id
			WHERE billets.id = ?
			", [$billet]););

	$req->execute();
	echo '<ul>';
	while ($donnees = $req->fetch())
	{	
		echo '</br><article><strong>'. htmlspecialchars($donnees['titre']).' ' . '</strong>'.'</br>'. htmlspecialchars($donnees['contenudetaille']).'</article></br>'; 
		echo '</br><strong>'. htmlspecialchars($donnees['auteur']).' ' . '</strong>' . htmlspecialchars($donnees['date_commentaire'])  .'</br>'. htmlspecialchars($donnees['commentaire']).'</br>'; 
	
	}
	echo '</ul>';

		$req->closeCursor();
		echo "<a href='temoignages.php'>retour</a>";


	}












require "required/footer.php";
