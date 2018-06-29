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
    <div class="columns">
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
          <p class="subtitle is-6">Commence le <?= $event['start_date'] ?> et ce termine le <?= $event['end_date']?></p>
          <p><?= $event['content']?></p>
          <a href="<?= $helper->base_url('admin/events/create') ?>">Créer un nouvel évènement</a>
          <a href="<?= $helper->base_url('admin/events/'.$event['id'].'/edit')?>"> Modifier</a> 
          <a href="<?= $helper->base_url('admin/events/'.$event['id'].'/delete') ?>">Supprimer</a> <br> <br>
        </div>
      </div>
      <?php } ?>
  </div>
</section>