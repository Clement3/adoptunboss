<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Liste des activités
      </h1>
      <h2 class="subtitle">
        <a href="<?= $helper->base_url('admin/activities/create')?>"><i class="fas fa-angle-right"></i> Créer une activité</a>
      </h2>       
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="box">
      <?php include('./views/helpers/notifications.php') ?>
      <?php if (empty($activities)) { ?>
      <div class="has-text-centered">
        <p>Vous n'avez pas encore de créer d'activités.</p>
        <a href="<?= $helper->base_url('admin/activities/create') ?>">Créer une activité.</a>
      </div>
      <?php } else { ?>      
      <table class="table is-fullwidth">
        <thead>
          <tr>
            <th><abbr title="Identifiant"># ID</abbr></th>
            <th>Nom</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($activities as $activities) { ?>
            <tr>
              <th><?= $activities['id'] ?></th>
              <td><?= $activities['name'] ?></td>
              <td>
                <a href="<?= $helper->base_url('admin/activities/'. $activities['id'] .'/edit') ?>" class="icon has-text-info">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="<?= $helper->base_url('admin/activities/'. $activities['id'] .'/delete') ?>" class="icon has-text-danger">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>              
            </tr>
          <?php } ?>
        </tbody>      
      </table>
      <?php } ?>
    </div>
  </div>
</section>