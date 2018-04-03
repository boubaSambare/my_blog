
    <div class="container">
        <div class="row">
            <div class="card m-auto col-12" style="width: 18rem;">
                <img class="card-img-top" src="<?=WEB?>medias/home-alaska.jpg" alt="Card image cap">
                <div class="card-body">
                    <h2 class="card-title align-items-center">Bienvenue Dans l'admistration</h2>
                </div>
            </div>
        </div>
    <div class="flex-row"> <a  href="<?=HOST?>add.html" class="btn" >Ajouter un chapitre</a></div>
            <div class="row">
    <table class="table col-1" >
        <thead class="thead-dark">
        <tr>
            <th scope="col">Chapitres</th>
            <th scope="col">Modifier</th>
            <th scope="col">Suprimer</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($postts as $postt): ?>
        <tr>
            <th scope="row"><?= $postt->getPostsTitle()?></th>
            <td><a href="<?=HOST?>edit_post.html/id/<?= $postt->getPostsId()?>">Modifier</a></td>
            <td ><div class="btn-warning delete "><a href="<?=HOST?>delete.html/id/<?= $postt->getPostsId()?>"  id="delete">Suprimer</a></div></td>

        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
        <div class="row">
            <table class="table col-1" >
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Commentaires signalés</th>
                    <th scope="col">Auteurs</th>
                    <th scope="col">Moderer</th>
                    <th scope="col" >Suprimer</th>

                </tr>
                </thead>
                <tbody>
                <?php foreach ($comment as $comments): ?>
                    <tr>
                        <th scope="row"><?= $comments->getCommentsContent()?></th>
                        <th scope="row"><?= $comments->getCommentAuthorsName()?></th>
                        <td class="btn-warning">

                          <a href="<?= HOST ?>single_comment.html/id/<?= $comments->getCommentsId() ?>">Moderer</a>


                        </td>
                        <td class="btn-danger delete"><a href="<?= HOST ?>delete_comment.html/id/<?= $comments->getCommentsId() ?>">Suprimer</a></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
</div>