<h2 class="title is-2" >Mettre à jour l'évènement</h2>

<form method="POST" action="<?= $helper->base_url('event/'.$event['id'].'/update') ?>">

        <p><label>Nom de l'évènement</label></p>
        <p><input type="text" name="title" id="title" value="<?= $event['title']?>" required/></p>

        <p><label>Description de l'évènement</label></p>
        <p><textarea id='description' name='description' required><?= $event['description'] ?></textarea></p>

        <p><label>Détail de l'évènement</label></p>
        <p><textarea id='content' name='content' required><?= $event['content']?></textarea></p>

        <p><label>Date de début </label></p>
        <p><input type="date" id='start_date' name='start_date' value="<?= $event['start_date']?>" required/></p>

        <p><label>Date de fin </label></p>
        <p><input type="date" id='end_date' name='end_date' value="<?=$event['end_date']?>" required/></p>
        
        <!--<p><label>Lieu</label></p>
        <select name="location_id" id="location_id">
        <option></option>
        </select>-->

        <p><button type="submit">Valider</button> </p>
        
</form>