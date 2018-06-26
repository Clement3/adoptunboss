<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        <?= $event['title'] ?>
      </h1>
      <h2 class="subtitle">
        <a href="<?= $helper->base_url('events')?>"><i class="fas fa-angle-left"></i> Retour aux évènements</a>
      </h2>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="box">
      <?= $event['content']?>
    </div>
  </div>
</section>