
<form method="POST" action="<?= $helper->base_url('') ?>">

        <p><label>Nom de l'évènement</label></p>
        <p><input type="text" name="title" id="title"/></p>

        <p><label>Description de l'évènement</label></p>
        <p><textarea id='content' name='content' ></textarea></p>

        <p><label>Date de début </label></p>
        <p><input type="date" id='start_date' name='start_date' /></p>

        <p><label>Date de fin </label></p>
        <p><input type="date" id='end_date' name='end_date' /></p>
        
        <p><label>Lieu</label></p>
        <select name="location_id" id="location_id">
        <option></option>
        </select>

        <p><button type="submit" class="button is-primary full-width">Valider</button> </p>
        
</form>