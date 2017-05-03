<?php
require "required/header.php";
?>
<section class="row">
<?php
	$pdo = new PDO('mysql:host=localhost;dbname=miniblog;charset=utf8', 'root', '');

	$req = $pdo->prepare('SELECT * FROM billets ORDER BY ID DESC LIMIT 10');

	$req->execute();
	echo '<ul>';
	while ($donnees = $req->fetch())
	{	
		echo '</br><article><strong>'. htmlspecialchars($donnees['titre']).' ' . '</strong>' . htmlspecialchars($donnees['date_creation'])  .'</br>'. htmlspecialchars($donnees['contenu']).'</article></br>'; ?>
		<a href="commentaires.php?billet= <?= $donnees['id'] ?>">voir l'intégralité</a></br>
<?php
	}
	echo '</ul>';

	$req->closeCursor();
	

?> 
</section>
<?php
require "required/footer.php";
