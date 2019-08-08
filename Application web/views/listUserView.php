<?php require_once 'enteteView.php'; ?>
 <div class="container">
    <section class="latest-post-area pb-120">
       <div class="container no-padding">
           <div class="card" id="loginContent">
           <table class="table">
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Login</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
  <?php while($user = $users->fetch())
  {
?>
  
    <tr>
      <td><?=$user['nom']?></td>
      <td><?=$user['prenom']?></td>
      <td><?=$user['login']?></td>
      <td><a href="index.php?action=edit&amp;id=<?= $user['iduser'] ?>"/>Modifier</a></td>
      <td><a href="index.php?action=delete&amp;id=<?= $user['iduser'] ?>"/>Supprimer</a></td>
    </tr>
<?php } ?>
  </tbody>
</table>
            </div>
 
        </div>
    </section>
</div>