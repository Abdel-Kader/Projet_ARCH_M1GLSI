<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Affichage d'un article</title>
</head>
<body>
	<?php require_once 'enteteView.php'; ?>
	<div id="contenu">
	
		<?php
			if(isset($article)){
		?>
			<h1><?= $article->titre ?></h1>
			<span>Publié le <?= $article->dateCreation ?></span>
			<p><?= $article->contenu ?></p>
		<?php
		}
		else if(empty($articles)) {
			echo "Aucun article dans cette catégorie";
		}
		else
		{
			foreach ($articles as $article)
			{?>
				<div class="article">
					<h1><a href="index.php?action=getItem&amp;id=<?= $article->id ?>"><?= $article->titre ?></a></h1>
					<p><?= substr($article->contenu, 0, 300) . '...' ?></p>
				</div><?php
			}
		}
		?>
		
	</div>
	
</body>
</html>