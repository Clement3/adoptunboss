<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Evènements
      </h1>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <?php if (empty($events)) { ?>
        <div class="column">
          <div class="has-text-centered">
            <h4 class="title is-4">Il y à aucun évènement actuellement</h4>
            <h1 class="title is-1"><i class="far fa-frown fa-3x"></i></h1>
          </div>
        </div>
      <?php } ?>
      <?php foreach ($events as $event) { ?>
      <div class="column is-6">
        <div class="box">
          <h3 class="title is-h3"><?= $event['title'] ?></h3>
          <p class="subtitle is-7">Commence le <?= $date->format($event['start_date']) ?> et ce termine le <?= $date->format($event['end_date']) ?></p>
          <p><?= $event['short_content']?></p>
          <br>
          <a class="button is-primary" href="<?= $helper->base_url('events/'. $event['id'] .'') ?>">Voir l'évènement</a>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>