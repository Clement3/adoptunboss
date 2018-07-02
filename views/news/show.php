<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        <?= $new['title'] ?>
      </h1>
      <h2 class="subtitle">
        <a href="<?= $helper->base_url('news')?>"><i class="fas fa-angle-left"></i> Retour aux news</a>
      </h2>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="box">
      <p><?= $new['content']?></p>
      <i><?= $new['updated_date']?></i>
      <i><?= $new['created_date']?></i>
    </div>
</section>