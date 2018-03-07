<div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-12">

          <!-- Title -->
          <h1 class="mt-4"><?=  $postt->getPostsTitle()?></h1>

          <!-- Author -->
          <p class="lead">
            par
            <a href="#">Jean Forteroche</a>
          </p>

          <hr>

          <!-- Date/Time -->
          <p>Poster en   <?=$postt-> getPostsDate()?></p>

          <hr>

          <!-- Preview Image -->
          <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

          <hr>

          <!-- Post Content -->
          <p> <?= $postt->getPostsContent()?></p>
          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Laisser un commentaire:</h5>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <textarea class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Poster</button>
              </form>
            </div>
          </div>

          <!-- Single Comment -->

          <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
              <h5 class="mt-0"><?= $comment->getCommentAuthorsName()?></h5>
                <?= $comment->getCommentsContent ()?>
            </div>
          </div>
        </div>
      </div>

</div>

