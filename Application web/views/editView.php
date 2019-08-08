<?php require_once 'enteteView.php';?>
 <div class="container">
    <section class="latest-post-area pb-120">
       <div class="container no-padding">
           <div class="card" id="loginContent">
                <form method="post" action="index.php?action=editUser">
                    <Legend>Modifier l'utilisateur </Legend><br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nom *</label>
                        <input type="text" name="nom" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['nom']?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Prenom *</label>
                        <input type="text" name="prenom" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['prenom']?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Login *</label>
                        <input type="text" name="login" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['login']?>">
                    </div>
                    <input type="text" name="id" hidden class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $user['iduser']?>">
                    
                    <button type="submit" name="modifier" class="btn btn-primary">Modifier</button>
                </form>
            </div>
 
        </div>
    </section>
</div>