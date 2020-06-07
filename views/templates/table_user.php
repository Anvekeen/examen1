<h4>Liste des users :</h4>
<table class="table table-bordered" id="user-list">
    <thead>
    <tr class="thead-dark">
        <th scope="col">Nom d'utilisateur</th>
        <th scope="col">Mot de passe</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
    </tr>
    </thead>
    <?php foreach ($user_list as $user): ?>
    <tbody>
        <tr>
            <th scope="row" class="username"><?= $user->__get('username'); ?></th>
            <td class="userpass"><?= $user->__get('password'); ?></td>
            <td><button type="button" class="usermodif" userinfo="<?= $user->__get('id'); ?>">Modifier</button></td>
            <td><form action="../../index.php" method="post">
                    <input type="hidden" name="userdelete" value="<?= $user->__get('id'); ?>">
                    <input type="submit" value="Supprimer" onclick="return confirm('Êtes-vous sur de vouloir supprimer ?')">
                </form></td>
        </tr>
    </tbody>
    <?php endforeach; ?>
</table>