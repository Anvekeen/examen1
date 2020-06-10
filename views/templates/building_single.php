<h4>Liste des habitants <?= $buildings->__get('buildingname') ?> :</h4>
<table class="table table-bordered" id="user-list">
    <thead>
    <tr class="thead-dark">
        <th scope="col">nom d'utilisateur</th>
        <th scope="col">Statut</th>
        <th scope="col">Numéro d'appartement</th>
    </tr>
    </thead>
    <?php foreach ($user_list as $user):?>
        <tbody>
        <tr>
            <th scope="row"> <?= $user->__get('username'); ?> </th>
            <td> <?= $user->__get('usertypeID')->__get('typename'); ?> </td>
            <td> <?= $user->__get('apartment_number'); ?> </td>
            <!--<td><form action="../../index.php" method="post">
                    <input type="hidden" name="userdelete" value="</?= $user->__get('id'); ?>">
                    <input type="submit" value="Supprimer" onclick="return confirm('Êtes-vous sur de vouloir supprimer ?')">
                </form></td>-->
        </tr>
        </tbody>
    <?php endforeach; ?>
</table>