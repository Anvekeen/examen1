<form id="TicketForm" action="/examen1/ticket" method="post">
    <div class="form-group">
        <label for="Titre">Titre</label>
        <input type="text" class="form-control" name="commtitle" id="Titre" required>
    </div>
    <div class="form-group">
        <label for="description">Description du problème / de la communication :</label>
        <textarea class="form-control" name="commdescription" id="description" rows="4" required></textarea>
    </div>
    <div class="form-group">
        <label for="Building">Immeuble :</label>
        <select id="Building" class="form-control" name="commbuildingID">
            <?php foreach ($buildings as $building): ?>
                <?php if($building->__get('buildingID') > 1) { ?>
                    <option value="<?= $building->__get('buildingID'); ?>"> <?= $building->__get('buildingname'); ?> </option>
                <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="hidden" name="commuserID" value="<?= $user->__get('userID'); ?>">
    <input type="hidden" name="commstateID" value="<?= $stateID; ?>">
    <button type="submit" id="SubmitCommForm" class="btn btn-primary">Soumettre</button>
</form>