<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Modifier : <?= $event['title'] ?>
      </h1>
    </div>
  </div>
</section>

<div class="container">
  <section class="section">
    <div class="columns is-centered">
      <div class="column is-half is-narrow">
        <div class="box">
          <?php include('./views/helpers/notifications.php') ?>
          <form method="POST" action="<?= $helper->base_url('admin/events/'.$event['id'].'/edit') ?>">
            <div class="field">
              <label class="label">Titre</label>
              <div class="control">
                <input class="input" type="text" name="title" value="<?= $event['title'] ?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Petite description</label>
              <div class="control">
                <textarea class="textarea" name="short_content"><?= $event['short_content'] ?></textarea>
              </div>
            </div>            
            <div class="field">
              <label class="label">Contenu</label>
              <div class="control">
                <textarea class="textarea" name="content"><?= $event['content'] ?></textarea>
              </div>
            </div> 
            <div class="field is-grouped">
              <p class="control is-expanded">
                <label class="label">Date du début</label>
                <input type="date" class="input" name="start_date" value="<?= $event['start_date'] ?>">
              </p>
              <p class="control is-expanded">
                <label class="label">Date de fin</label>
                <input type="date" class="input" name="end_date" value="<?= $event['end_date'] ?>">
              </p>              
            </div>
            <div class="field">
              <label class="label">Localisation</label>
              <div class="control">
                <input class="input" type="text" placeholder="Ex: Montpellier" name="place" id="place">
                <input type="text" class="hidden" id="lat" name="lat">
                <input type="text" class="hidden" id="lng" name="lng">
              </div>
            </div> 
            <button type="submit" class="button is-primary full-width">Envoyer</button>                     
          </form>
        </div>
      </div>
    </div>
  </section>
</div>