<!-- note que cette méthode risque de buger de même si un seul building/comm... A tester -->

<?php foreach ($buildings as $building): ?>
    <?php if($building->__get('buildingID') > 1) { ?>
    <h4>Liste des communications <?= $building->__get('buildingname') ?> :</h4>


    <table class="table table-bordered" id="comm-list">
        <thead>
        <tr class="thead-dark">
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Etat</th>
            <th scope="col">Date</th>
            <th scope="col">Envoyé par</th>
            <th scope="col">Suppression</th>
        </tr>
        </thead>
        <?php foreach ($comms as $comm): ?>
            <?php if ($comm->__get('commbuildingID') == $building->__get('buildingID')) {
                ; ?>
                <tbody>
                <tr>
                    <th scope="row" class="username"> <?= $comm->__get('commtitle'); ?> </th>
                    <td> <?= $comm->__get('commdescription'); ?> </td>
                    <td> <?= $comm->__get('commstateID')->__get('statename'); ?> </td>
                    <td> <?= $comm->__get('commdate') ?> </td>
                    <td> <?= $comm->__get('commuserID')->__get('usertypeID')->__get('typename'); ?> </td>
                    <td>
                        <form action="/examen1/portal/delete" method="post">
                            <input type="hidden" name="commdelete" value="<?= $comm->__get('commID'); ?>">
                            <input type="submit" value="Supprimer" onclick="return confirm('Êtes-vous sur de vouloir supprimer ?')">
                        </form>
                    </td>
                </tr>
                </tbody>
            <?php } ?>
        <?php endforeach; ?>
    </table>
    <?php } ?>
<?php endforeach; ?>