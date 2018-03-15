<div class="card my-4">
    <h5 class="card-header">Modifier le commentaire</h5>
    <div class="card-body">
        <form action="<?= HOST ?>moderer.html" method="post">
            <div class="form-group">
                <input type="hidden" name="values[comments_id]" value="<?= $comments->getCommentsId()?>">
                <input type="hidden" name="values[comments_signal]" value="NULL">
                <textarea class="form-control" name="values[comments_content]" rows="10" required><?= $comments->getCommentsContent()?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Poster</button>
        </form>
    </div>
</div>