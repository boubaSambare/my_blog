<div class="container">
    <div class="row">
        <div class="card mb-4">
            <h5 class="card-header">Mettre a jour les chapitres</h5>
            <div class="card-body">
                <form action="<?= HOST?>update.html" method="post">
                    <div class="form-group">
                        <label for="title" class="form-control">Titre</label>
                        <input type="hidden" name="values[posts_id]" value="<?= $postt->getPostsId()?>">
                        <input type="text" class="form-control" id="title" name="values[posts_title]" value="<?= $postt->getPostsTitle()?>">
                        <textarea class="form-control "  id="editable" rows="20" name="values[posts_content]"  ><?= $postt->getPostsContent()?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end row-->
</div>