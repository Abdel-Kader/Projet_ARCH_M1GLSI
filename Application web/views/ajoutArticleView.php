<?php require_once 'enteteView.php'; ?>
 <div class="container">
    <section class="latest-post-area pb-120">
       <div class="container no-padding">
           <div class="card" id="loginContent">
                <form method="post" action="index.php?action=addArticle">
                    <Legend>Ajouter un article </Legend><br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Titre *</label>
                        <input type="text" name="titre" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titre de l'article">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description *</label>
                        <textarea class="form-control" required rows="5" id="description" name="description"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputPassword1">Catégorie *</label>
                        <select class="form-control" id="categorie" name="categorie" required>
                            <?php foreach ($categories as $categorie): ?>
                                <option value="<?= $categorie->idCat ?>"><?= $categorie->nom ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    
                    <button type="submit" name="enregistrer" class="btn btn-primary">Enregistrer</button>
                </form>
            </div>
 
        </div>
    </section>
</div>