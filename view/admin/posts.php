
<h2> Bienvenue dans l'admistration </h2>
    <div class="container">
    <p>Liste de tous les chapitres</p>
    <div class="flex-row"> <a  href="<?=HOST?>add.html" class="btn" >Ajouter un chapitre</a></div>
    <div class="flex-row"><button class="btn-primary col-2 disabled" >Ajouter un chapitre <a  href="<?=HOST?>add_post.html" ></a></button></div>
            <div class="row">
    <table class="table col-1" >
        <thead class="thead-dark">
        <tr>
            <th scope="col">Titres</th>
            <th scope="col">Modifier</th>
            <th scope="col">Suprimer</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach ($postts as $postt): ?>
        <tr>
            <th scope="row"><?= $postt->getPostsTitle()?></th>
            <td><a href="<?=HOST?>edit_post.html/id/<?= $postt->getPostsId()?>">Modifier</a></td>
            <td><a href="<?=HOST?>delete.html/id/<?= $postt->getPostsId()?>">Suprimer</a></td>

        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</div>