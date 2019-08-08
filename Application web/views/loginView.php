<?php require_once 'enteteView.php'; ?>
 <div class="container">
    <section class="latest-post-area pb-120">
       <div class="container no-padding">
           <div class="card" id="loginContent">
                <form method="post" action="index.php?action=loginAction">
                    <Legend>Veuillez vous connecter</Legend><br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Login</label>
                        <input type="text" name="login" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">
                    </div>
                    
                    <button type="submit" name="valider" class="btn btn-primary">Connextion</button>
                </form>
            </div>
 
        </div>
    </section>
</div>