 <?php
 require "../config.php";
 AutoloadClass::register();
 $articles= new PostsManager();
 $article = $articles->readById(1);
 $title = "Un billet de retour pour alaska"
 ?>
 <?= ob_start();?>
 <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

         <!-- <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
          </h1>-->
          
          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><?=  $article->getPostsTitle()?></h2>
              <p class="card-text"><?= $article->getPostsContent()?></p>
              <a href="#" class="btn btn-primary">Continuer A Lire &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              <?= $article->getPostsDate()?> par
              <a href="#">Jean forteroche</a>
            </div>
          </div>

            <!--<div class="card-footer text-muted">
              Posted on January 1, 2017 by
              <a href="#">Start Bootstrap</a>
            </div>-->
          </div>
        </div>
    </div>
          <?= $content = ob_get_clean();
          require 'template.php';

          ?>
