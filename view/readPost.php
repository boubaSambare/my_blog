

 <!-- Page Content -->
    <div class="container">
        <?php foreach ($postts as $postt): ?>

      <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-12">

         <!-- <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1>-->
          
          <!-- Blog Post -->

          <div class="card mb-4">
              <div>
            <img class="card-img-top " src="<?=WEB?>medias/<?= $postt->getPostsMedia()?>" height="300" alt="billet simple pour alaska">
              </div>
            <div class="card-body">
              <h2 class="card-title"><?=  $postt->getPostsTitle()?></h2>
              <p class="card-text"><?= substr($postt->getPostsContent(),0,200)?></p>
              <a href="post.html/id/<?= $postt->getPostsId()?>" class="btn btn-primary">Continuer A Lire &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              <?= $postt->getPostsDate()?> par
              <a href="#">Jean forteroche</a>
            </div>
          </div>

            <!--<div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>-->
          </div>
        </div>
        <?php endforeach; ?>
    </div>




