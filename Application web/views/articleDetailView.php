<?php require_once 'enteteView.php'; ?>
 <div class="site-main-container">
   
   <section class="latest-post-area pb-120">
       <div class="container no-padding">
           <div class="row">
               <div class="col-lg-12 post-list">
                   <!-- Start single-post Area -->
                   <div class="single-post-wrap">
                       <div class="feature-img-thumb relative">
                           <div class="overlay overlay-bg"></div>
                           <img class="img-fluid" src="public/imgs/<?= htmlspecialchars($article['image']);?>" alt="">
                       </div>
                       <div class="content-wrap">
                           <ul class="tags mt-10">
                               <li><?= htmlspecialchars($article['nom']);?></li>
                           </ul>
                           <a href="#">
                               <h3><?= htmlspecialchars($article['titre']);?></h3>
                           </a>
                           <ul class="meta pb-20">
                               <li><span class="lnr lnr-calendar-full"></span><?= htmlspecialchars($article['datePub']);?></li>
                               
                           </ul>
                           <p>
                           <blockquote><?= htmlspecialchars($article['description']);?></blockquote>
                           </p>
                       </div>
                   </div>
                   
               </div>
               <!-- End single-post Area -->
           </div>
       </div>
   <section>
</div>

<?php include 'footerView.php'; ?>
