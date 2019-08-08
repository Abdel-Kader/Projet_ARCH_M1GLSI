
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading"><?= $_SESSION['nom']?> </div>
      <div class="list-group list-group-flush">
        <a href="#" class="list-group-item list-group-item-action bg-light">Acceuil</a>
        <a href="index.php?action=ajoutArticle" class="list-group-item list-group-item-action bg-light">Ajouter un article</a>
        <a href="index.php?action=myArticles" class="list-group-item list-group-item-action bg-light">Voir mes articles</a>
        
        <?php if($_SESSION['profil'] == 2)
            {
            ?>
        <a href="index.php?action=listUser" class="list-group-item list-group-item-action bg-light">Liste des utilisateurs</a>
        <?php } ?>
        <a href="index.php?action=deconnection" class="list-group-item list-group-item-action bg-light">Deconnexion</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">