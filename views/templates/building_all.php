<?php foreach ($buildings as $building): ?>
    <?php if($building->__get('buildingID') > 1) { ?>
    <div class="row">
    <div class="col">
    <h4>Liste des habitants <?= $building->__get('buildingname') ?> :</h4>
    </div>
    <div class="col">
        <form action="/examen1/building/delete" method="post">
            <input type="hidden" name="buildingdelete" value="<?= $building->__get('buildingID'); ?>">
            <input type="submit" value="Supprimer l'immeuble" onclick="return confirm('Êtes-vous sur de vouloir supprimer ? Attention ! Si vous supprimez l\'immeuble, les communications ainsi que les utilisateurs de cet immeubles seront également supprimés !')">
        </form>
    </div>
    </div>
    <table class="table table-bordered" id="user-list">
        <thead>
        <tr class="thead-dark">
            <th scope="col">nom d'utilisateur</th>
            <th scope="col">Statut</th>
            <th scope="col">Numéro d'appartement</th>
        </tr>
        </thead>
        <?php foreach ($user_list as $user): ?>
            <?php if ($user->__get('userbuildingID') == $building->__get('buildingID')) {
                ; ?>
                <tbody>
                <tr>
                    <th scope="row"> <?= $user->__get('username'); ?> </th>
                    <td> <?= $user->__get('usertypeID')->__get('typename'); ?> </td>
                    <td> <?= $user->__get('apartment_number'); ?> </td>
                </tr>
                </tbody>
            <?php } ?>
        <?php endforeach; ?>
    </table>
    <?php } ?>
<?php endforeach; ?>