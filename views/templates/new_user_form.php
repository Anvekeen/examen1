<div class="container p-3">
    <h1 class="display-5 text-black">Nouveau sur le site ? </h1>
    <h1 class="display-5 text-black">Remplissez notre formulaire d'inscription !</h1>
    <form id="NewUserForm" action="/examen1/index" method="post">
        <div class="form-group">
            <label for="InputEmailSub">Adresse email :</label>
            <input type="email" class="form-control" id="InputEmailSub" name="username" placeholder="Entrez votre adresse mail" required>
        </div>
        <div class="form-group">
            <label for="InputPasswordSub">Mot de passe :</label>
            <input type="password" class="form-control" pattern="(?=.*\d)(?=.*[A-Z]).{8,}" id="InputPasswordSub" name="password" placeholder="Mot de passe" required>
            <small id="passInfo" class="form-text text-muted">*Votre mot de passe doit contenir au moins 8 caractères, un chiffre et une lettre majuscule.</small>
        </div>
        <span>Vous êtes... :</span>
        <!-- pourrait être aussi dans une boucle foreach, un peu plus complexe à faire (à priori)
        pour les boutons radio d'où le fait que ça reste en 'hard-codé'
        (+ le fait qu'à priori ces options resteront identiques longtemps, contrairement aux buildings -->

        <div class="form-check">
            <input class="form-check-input" type="radio" name="usertypeID" id="InputType1" value="2" checked>
            <label class="form-check-label" for="InputType1">
                Un locataire
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="usertypeID" id="InputType2" value="3">
            <label class="form-check-label" for="InputType2">
                Un propriétaire (résident)
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="usertypeID" id="InputType3" value="4">
            <label class="form-check-label" for="InputType3">
                Un propriétaire (non-résident)
            </label>
        </div>
        <div class="row">
        <div class="form-group col-md-4">
            <label for="InputBuilding">Immeuble :</label>
            <select id="InputBuilding" class="form-control" name="userbuildingID">
                <?php foreach ($buildings as $building): ?>
                <?php if($building->__get('buildingID') > 1) { ?>
                <option value="<?= $building->__get('buildingID'); ?>"> <?= $building->__get('buildingname'); ?> </option>
                <?php } ?>
                <?php endforeach; ?>
            </select>
            <small>Si vous êtes propriétaire non-résident, veuillez indiquer le lieu dont vous êtes propriétaire. Si vous possédez plus d'un appartement, vous aurez la possibilité d'en ajouter par la suite.</small>
        </div>
            <div class="form-group col-md-4">
            <label for="InputAppart"> Appartement :</label>
            <input type="number" class="form-control" id="InputAppart" name="apartment_number" required>
        </div>
        </div>
        <button type="submit" id="NewSubBut" class="btn btn-primary">Inscription</button>
    </form>


