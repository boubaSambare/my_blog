<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Billet de retour pour Alaska</title>

    <!-- Bootstrap core CSS -->
    <link type="text/css" href="<?= WEB ?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- tinymce-->
    <script src="<?=WEB?>tinymce/tinymce.min.js "></script>

    <!-- Custom styles for this template -->
    <link  href="<?= WEB ?>css/blog-post.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Jean Forteroche</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="<?= HOST?>"> Accueil
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <?php if (!empty($logout) ) {  echo $logout; }else{ $logout = null;} ?>
                </li>

            </ul>
        </div>
    </div>
</nav>
<h3 id='alert-message'>  <?php if (!empty($message) ) {  echo $message; }else{ $message = null;} ?> </h3>
<?=  $content ?>

<!--Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Jean Forteroche 2018</p>
        <p class="m-0 text-center text-white"> Sambare Aboubacar </p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?= WEB ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= WEB ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= WEB ?>js/tinymce.js"></script>
<script src="<?= WEB ?>js/ControlBlog.js"></script>

</body>

</html>