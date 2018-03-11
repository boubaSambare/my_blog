<div class="container">
    <div class="row">
        <div class="card mb-4">
            <h5 class="card-header">Ajouter un article</h5>
            <div class="card-body">
                <form action="<?= HOST?>add_post.html" method="post">
                    <div class="form-group">
                        <label for="title" class="form-control">Titre</label>
                        <input type="text" class="form-control" id="title" name="values[posts_title]">
                        <textarea class="form-control " id="editable" rows="10" name="values[posts_content]"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end row-->
</div>