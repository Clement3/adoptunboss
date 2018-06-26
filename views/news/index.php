<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Actualités
      </h1>
    </div>
  </div>
</section>

<div class="container">
  <section class="section">
    <div class="columns">
      <div class="column">
        <?php include('./views/helpers/notifications.php') ?>
        <?php if (empty($news)) { ?>
          <h2 class="is-size-2 has-text-centered">Il n'y à aucune actualités.</h2>
        <?php } ?>
        <?php foreach ($news as $new) { ?>
        <article class="message is-dark">
          <div class="message-header">
            <p><?= $new['title']; ?></p>
            <span class="has-text-right">
              <span class="has-text-weight-light"><?= $new['created_date']; ?></span>
              <?php if ($helper->is_admin()) { ?>
              <a href="<?= $helper->base_url('news/'. $new['id'].'/edit') ?>"><i class="fas fa-edit"></i></a>
              <a href="<?= $helper->base_url('news/'. $new['id'].'/delete') ?>"><i class="fas fa-trash-alt"></i></a>
              <?php } ?>
            </span>
          </div>
          <div class="message-body">
            <?= $new['content']; ?>
          </div>
        </article>
        <?php } ?>
      </div>
    </div>
  </section>
</div>
