<div class="container">
    <div class="row">
        <div class="card m-auto col-4" style="width: 18rem;">
            <img class="card-img-top" src="<?=WEB?>medias/login-alaska.png" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title align-items-center">Espace Reserver</h5>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card m-auto col-4" >
            <form action="<?= HOST?>login.html" method="post">
                    <div class="form-group">
                        <div>
                            <label for="username" class="form-control"><b>Nom d'utilisateur</b></label>
                        </div>
                        <div>
                            <input type="text" class="form-control" placeholder="Enter Votre nom d'utilisateur" name="username" required>
                        </div>
                        <div>
                            <label for="psw" class="form-control "><b>Mot de passe</b></label>
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Enter Votre Password" name="password" required>
                        </div>
                        <div>
                            <button type="submit" class="btn-primary form">Se Connecter</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

</div>

</div>

