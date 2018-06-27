<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Tableau de bord
      </h1>
    </div>
  </div>
</section>

<section class="section">
  <div class="columns">
    <div class="column is-6">
      <div class="box">
        <h6 class="title is-6">Dernières actualités</h6>
        <?php if (empty($news)) { ?>
        <div class="has-text-centered">
          <p>Aucune actualités.</p>
          <a href="<?= $helper->base_url('news/create') ?>">Créer une actualité.</a>
        </div>
        <?php } else { ?>
        <table class="table is-fullwidth">
          <thead>
            <tr>
              <th>Titre</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($news as $new) { ?>
            <td><?= $new['title'] ?></td>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
      </div>
    </div>
    <div class="column is-6">
      <div class="box">
        <h6 class="title is-6">Dernières utilisateurs</h6>
      </div>
    </div>
  </div>
</section>