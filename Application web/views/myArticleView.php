<?php require_once 'enteteView.php'; ?>
<div class="site-main-container">
    <!-- Start top-post Area -->

    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-12 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                        <h4 class="cat-title">Derniers articles</h4>
                            <?php
                                foreach ($principal as $article)
                                {
                            ?>
                                    <div class="single-latest-post row">
                                        <div class="col-lg-6 post-left">
                                            <div class="feature-img relative">
                                                <div class="overlay overlay-bg"></div>
                                                <img class="img-fluid" src="public/imgs/<?= htmlspecialchars($article['image']);?>" alt="">
                                            </div>
                                            <ul class="tags">
                                                <li><?= htmlspecialchars($article['nom']);?></li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 post-right">
                                            <a href="index.php?action=getItem&id=<?php echo ($article['idArticle']);?>">
                                                <h4><?= htmlspecialchars($article['titre']);?></h4>
                                            </a>
                                            <ul class="meta">
                                                <li><span class="lnr lnr-calendar-full"></span><?= htmlspecialchars($article['datePub']);?></li>
                                            </ul>
                                            <p class="excert">
                                            <?= htmlspecialchars($article['description']);?>
                                            </p>
                                        </div>
                                    </div>
                                <?php
                                    }
                                ?>
                        
                    </div>
                    <a href="index.php?action=getArticles&begin=0" class="btn btn-info" role="button"><-Précédent</a>
                    <a href="index.php?action=getArticles&begin=5" class="btn btn-info" role="button">Suivant -></a>
                </div>
            </div>
        </div>
    </section>
</div>



<?php include 'footerView.php'; ?>