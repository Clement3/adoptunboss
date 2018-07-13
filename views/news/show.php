<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title"><?= $new['title'] ?></h1>
      <h2 class="subtitle"><a href="<?= $helper->base_url('news') ?>"><i class="fas fa-angle-left"></i> Retour aux actualités</a></h2>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="box has-text-centered">
      <h5 class="title is-5"><?= $new['title'] ?></h5>
      <p class="subtitle is-7">Créer le <?= $date->format($new['created_date']) ?></p>
      <p><?= $new['content']?></p>
    </div>
  </div>
</section>
