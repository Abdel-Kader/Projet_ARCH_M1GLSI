<!DOCTYPE html>
<html lang="fr">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="E-news">
		<!-- Meta Description -->
		<meta name="description" content="Site de news">
		<!-- Meta Keyword -->
		<meta name="keywords" content="actualité, news, information">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>E-News</title>
		<!--
		CSS
		============================================= -->
		
		<link rel="stylesheet" href="public/styles/linearicons.css">
		<link rel="stylesheet" href="public/styles/font-awesome.min.css">
		<link rel="stylesheet" href="public/styles/bootstrap.css">
		
		<link rel="stylesheet" href="public/styles/sweetalert.css">
		<link rel="stylesheet" href="public/styles/main.css">
		<link rel="stylesheet" href="public/styles/sidebar.css">
	</head>
	<body>
		<header>
			
			<div class="container main-menu" id="main-menu"">
				<nav id="nav-menu-container" class="navbar navbar-expand-lg navbar-dark bg-dark">
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item"><a class="nav-link" href="index.php">Accueil</a></li>
							<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégorie</a>
								
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<?php foreach ($categories as $categorie): ?>
									
										<a class="dropdown-item" href="index.php?action=getItem&amp;idCategory=<?= $categorie->idCat ?>"><?= $categorie->nom ?></a>
									<?php endforeach ?>
								</div>
							</li>
						
					</ul>
					</div>
					<form class="form-inline my-2 my-lg-0">
						<?php if(!isset($_SESSION['id']))
						{
						?>	
						<a href="index.php?action=login">Se connecter</a>
						<?php } ?>
						
					</form>
					</nav><!-- #nav-menu-container -->
					</div>
			</div><br>
		</header><br>

		<?php if(isset($_SESSION['id']))
				{  require_once 'menu.php';}?>