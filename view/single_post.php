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
          <img class="img-fluid rounded" src="<?=WEB?>medias/<?= $postt->getPostsMedia()?>" alt="">

          <hr>

          <!-- Post Content -->
          <p> <?= $postt->getPostsContent()?></p>
          <hr>

          <!-- Comments Form -->
          <div class="card my-4">
            <h5 class="card-header">Laisser un commentaire:</h5>
            <div class="card-body">
              <form action="<?= HOST ?>edit_comment.html" method="post">
                <div class="form-group">
                    <span>Entrez votre nom</span>
                    <p><input type="hidden" name="values[comments_posts_ID]" value="<?= $postt->getPostsId()?>" class="form-control" ></p>
                    <p><input type="text" name="values[comments_authors_name]" class="form-control" required></p>
                  <textarea class="form-control" name="values[comments_content]" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Poster</button>
              </form>
            </div>
          </div>

          <!-- Single Comment -->
            <?php  if (!empty($commentt)):?>
            <?php  foreach ($commentt as $comment):  ?>
          <div class="media mb-4">
            <div class="media-body">
              <h5 class="mt-0"><?= $comment->getCommentAuthorsName()?></h5>
                <?= $comment->getCommentsContent ()?>
                <form action="<?= HOST ?>signale_comment.html" method="get">
                    <input type="hidden" name="values[comments_id]" value="<?= $comment->getCommentsId()?>" class="form-control">
                    <input type="hidden" name="values[posts_id]" value="<?= $comment->getCommentsPostsId()?>">
                    <input type="hidden" name="values[comments_signal]" value="<?= SIGNALED?>" class="form-control">
               <div ><input type="submit" value="signaler"> </div>
                </form>
            </div>
          </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
      </div>

</div>

