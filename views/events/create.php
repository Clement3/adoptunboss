<div class="container">
  <div class="notification">


        <h2 class="title is-2" >Créer un nouvel évènement</h2>

        <form method="POST" action="<?= $helper->base_url('event/create') ?>">
                <div class="field">
                <label class="label">Nom de l'évènement</label>
                <div class="control">
                <input class="input" type="text" name="title" id="title"  required>
                </div>
                </div>

                <div class="field ">
                <label class="label">Description de l'évènement</label>
                <div class="control">
                <input class="input" type="text" id="description"  name="description" required> 
                </div>
                </div>

                <div class="field">
                <label class="label">Détail de l'évènement </label>
                <div class="control"> 
                <textarea class="textarea" placeholder="Textarea" id='content' name='content' required></textarea>
                </div>
                </div>

                <div class="field is-grouped">
                <label class="label">Date de début : </label>
                <div class="control">
                <input type="date" id='start_date' name='start_date' value="<?= $event['start_date']?>" required/>
                </div>
                <label class="label">Date de fin :</label>
                <div class="control">
                <input type="date" id='end_date' name='end_date' value="<?= $event['end_date']?>" required/>
                </div>
                </div>
                </div>

                <div class="field is-grouped">
                <div class="control">
                <button class="button is-link" type="submit" >Submit</button>
                </div>
                <div class="control">
                <button class="button is-text">Cancel</button>
                </div>
                 </div>
        </form>
        <br>

  </div>
</div>


