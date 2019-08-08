<?php
	require('controllers/controller.php');
	
	if (isset($_GET['action'])) {

		if ($_GET['action'] == 'getArticles') {

			getArticles();
			
		}

		if($_GET['action'] == 'getItem'){

			getArticle();

		} 
		if($_GET['action'] == 'login')
		{
			loginPage();
		}

		if($_GET['action'] == 'edit')
		{
			editPage();
		}

		if($_GET['action'] == 'delete')
		{
			detelePage();
		}

		if($_GET['action'] == 'deconnection')
		{
			deconnectionPage();
		}

		if($_GET['action'] == 'listUser')
		{
			listUserPage();
		}

		if($_GET['action'] == 'loginAction')
		{
			checkLogin();
		}

		if($_GET['action'] == 'ajoutArticle')
		{
			addArticlePage();
		}

		if($_GET['action'] == 'addArticle')
		{
			ajoutArticle();
		}

		if($_GET['action'] == 'editUser')
		{
			edit();
		}

		if($_GET['action'] == 'myArticles')
		{
			getMyArticle();
		}

	}

	else {

		getArticles();

	}