<h4>Liste des communications <?= $buildings->__get('buildingname') ?> :</h4>
    <table class="table table-bordered" id="comm-list">
        <thead>
        <tr class="thead-dark">
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Date</th>
        </tr>
        </thead>
        <?php foreach ($comms as $comm):?>
            <tbody>
            <tr>
                <th scope="row"> <?= $comm->__get('commtitle'); ?> </th>
                <td> <?= $comm->__get('commdescription'); ?> </td>
                <td> <?= $comm->__get('commdate') ?> </td>
            </tr>
            </tbody>
        <?php endforeach; ?>
    </table>