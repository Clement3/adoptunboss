<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Liste des compétences
      </h1>
      <h2 class="subtitle">
        <a href="<?= $helper->base_url('admin/skills/create')?>"><i class="fas fa-angle-right"></i> Créer une compétence</a>
      </h2>       
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="box">
      <?php include('./views/helpers/notifications.php') ?>
      <table class="table is-fullwidth">
        <thead>
          <tr>
            <th><abbr title="Identifiant"># ID</abbr></th>
            <th>Nom</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($skills as $skill) { ?>
            <tr>
              <th><?= $skill['id'] ?></th>
              <td><?= $skill['name'] ?></td>
              <td>
                <a href="<?= $helper->base_url('admin/skills/'. $skill['id'] .'/edit') ?>" class="icon has-text-info">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="<?= $helper->base_url('admin/skills/'. $skill['id'] .'/delete') ?>" class="icon has-text-danger">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>              
            </tr>
          <?php } ?>
        </tbody>      
      </table>
    </div>
  </div>
</section>