<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title"><?= $event['title'] ?></h1>
      <h2 class="subtitle"><a href="<?= $helper->base_url('events') ?>"><i class="fas fa-angle-left"></i> Retour aux évènements</a></h2>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="box has-text-centered">
      <span class="hidden" id="lat"><?= $event['latitude'] ?></span>
      <span class="hidden" id="lng"><?= $event['longitude'] ?></span>    
      <h5 class="title is-5"><?= $event['title'] ?></h5>
      <p class="subtitle is-7">Commence le <?= $date->format($event['start_date']) ?> et ce termine le <?= $date->format($event['end_date']) ?></p>
      <p><?= $event['content']?></p>
      <br>
      <div id="map"></div>
    </div>
  </div>
</section>