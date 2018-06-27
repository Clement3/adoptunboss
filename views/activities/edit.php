<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Editer une activité : <?= $activitie['name'] ?>
      </h1>
      <h2 class="subtitle">
        <a href="<?= $helper->base_url('admin/activities')?>"><i class="fas fa-angle-left"></i> Retour aux activités</a>
      </h2>      
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-half is-narrow">
        <div class="box">
          <?php include('./views/helpers/notifications.php') ?>
          <form method="POST" action="<?= $helper->base_url('admin/activities/' . $activitie['id'] . '/edit') ?>">
            <div class="field">
              <label class="label">Nom</label>
              <div class="control">
                <input class="input" type="text" name="name" value="<?= $activitie['name'] ?>">
              </div>          
            </div>
            <button type="submit" class="button is-primary full-width">Editer l'activité</button>                  
          </form>
        </div>      
      </div>
    </div>
  </div>
</section>