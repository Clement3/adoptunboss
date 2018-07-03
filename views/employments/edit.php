<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Editer l'emploi : <?= $employment['name'] ?>
      </h1>
      <h2 class="subtitle">
        <a href="<?= $helper->base_url('admin/employments')?>"><i class="fas fa-angle-left"></i> Retour à liste des contrats</a>
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
          <form method="POST" action="<?= $helper->base_url('admin/employments/' . $employment['id'] . '/edit') ?>">
            <div class="field">
              <label class="label">Nom</label>
              <div class="control">
                <input class="input" type="text" name="name" value="<?= $employment['name'] ?>">
              </div>          
            </div>
            <div class="field">
              <label class="checkbox">
                <input type="checkbox" name="period" <?php if ($employment['has_period']) { ?>checked<?php } ?>>
                Ce type de contrat à t'il une durée ?
              </label>
            </div>            
            <button type="submit" class="button is-primary full-width">Editer</button>                  
          </form>
        </div>      
      </div>
    </div>
  </div>
</section>