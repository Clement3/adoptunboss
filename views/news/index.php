<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Actualités
      </h1>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <?php if (empty($news)) { ?>
        <div class="column">
          <div class="has-text-centered">
            <h4 class="title is-4">Il y à aucune actualités</h4>
            <h1 class="title is-1"><i class="far fa-frown fa-3x"></i></h1>
          </div>
        </div>
      <?php } ?>
      <?php foreach ($news as $new) { ?>
      <div class="column is-6">
        <div class="box">
          <h3 class="title is-h3"><?= $new['title'] ?></h3>
          <p class="subtitle is-7">Créer le <?= $date->format($new['created_date']) ?></p>
          <p><?= $new['short_content']?></p>
          <br>
          <a class="button is-primary" href="<?= $helper->base_url('news/'. $new['id'] .'') ?>">Voir l'actualité</a>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</section>
