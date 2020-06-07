<main>

    <div class="container p-3">
        <form action="index.php" method="post">
            <div class="form-group">
                <label for="InputEmail">Adresse Mail :</label>
                <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Entrez votre adresse mail" required>
            </div>
            <div class="form-group">
                <label for="InputPassword">Mot de passe :</label>
                <input type="password" class="form-control" id="InputPassword" name="InputPassword" placeholder="Mot de passe">
            </div>
            <button type="submit" class="btn btn-primary">Connexion</button>
            <div class="float-right">
                <span id="subscribe" class="text-muted">Nouveau sur le site? Inscrivez-vous maintenant !</span>
                <button type="button" class="btn btn-primary">Inscription</button>
            </div>
        </form>
    </div>

</main>