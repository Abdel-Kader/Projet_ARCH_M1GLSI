<?php
    require('models/model.php');

    function getArticles(){
        if(isset($_GET['begin'])){
            $id = (int) $_GET['begin'];
            $principal = getAllArticles($id);
            $categories = getList('categorie');
            require ('views/listArticlesView.php');
        }
        else{
            $principal = getAllArticles(0);
            $categories = getList('categorie');
            require ('views/listArticlesView.php');
        }
       
    }
   
    function loginPage(){
        
        require ('views/loginView.php');
    }

    function editPage(){
        $id = (int) $_GET['id'];
        $user = getUser($id);
        require ('views/editView.php');
    }

    function detelePage(){
        $id = (int) $_GET['id'];
        $user = deleteUser($id);
        if($user)
        {
            header('index.php');
        }
    }

    function listUserPage(){
        $users = getUsers();
        require ('views/listUserView.php');
    }

    function deconnectionPage(){
        session_start();
        
        session_destroy();
        header('location:index.php');
        exit();	
    }

    function addArticlePage(){
        
        $categories = getList('categorie');
        require ('views/ajoutArticleView.php');
    }

   

    function checkLogin(){
        if(isset($_POST['valider']))
        {
           $user = login($_POST['login'], $_POST['password']);
            if($user)
            {
               header('location:index.php');
            }
            else 
            {
                echo "Login ou mot de passe incorrect";
            }
        }
        //
    }

   function ajoutArticle()
    {
        if(isset($_POST['enregistrer']) && isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['categorie']))
        {
            if(isset($_POST['titre'])) { $titre = $_POST['titre'];}
            if(isset($_POST['description'])) { $description = $_POST['description'];}
            if(isset($_POST['categorie'])) { $categorie = $_POST['categorie'];}
            $idUser = $_SESSION['id'];
           $addArticle = addArticle($titre, $description, $categorie, $idUser);
            if($addArticle)
            {
               header('location:index.php');
            }
            else 
            {
                echo "Erreur lors de l'ajout de l'article";
            }
        }
        else{
            echo "Veuillez remplir tous les champs !";
        }
    }

    function edit()
    {
        if(isset($_POST['modifier']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['login']))
        {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $login = $_POST['login'];
            $id = $_POST['id'];
            $editUser = editUser($nom, $prenom, $login, $id);
            if($editUser)
            {
               header('location:index.php');
            }
            else 
            {
                echo "Erreur lors de la mise à jour de l'utlisateur";
            }
        }
        else{
            echo "Veuillez remplir tous les champs !";
        }
    }
   
    
   function getArticle(){

       if(isset($_GET['id'])){
        $id = (int) $_GET['id'];
        $article = getItem($id);
        $categories = getList('Categorie');
        require('views/articleDetailView.php');
       }

       
       else if(isset($_GET['idCategory']))
       {
        $idCat = (int) $_GET['idCategory'];
        $principal = getItemByCategorie($idCat);
        $categories = getList('categorie');
        require ('views/listArticlesView.php');
       }
   }

   function getMyArticle(){
     $principal = getUserArticle();
     $categories = getList('Categorie');
     require('views/myArticleView.php');
}