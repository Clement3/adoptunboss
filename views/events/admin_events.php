<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Gestion des Événements
      </h1>
    </div>
  </div>
</section>

<div class="container">
  <section class="section">
    <div class="box">
      <?php include('./views/helpers/notifications.php') ?>
      <table class="table is-fullwidth">
        <thead>
          <tr>
            <th><abbr title="Identifiant"># ID</abbr></th>
            <th>Titre</th>
            <th>Résumé</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>Date de modification</th>
            <th>Date de création</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($events as $event) { ?>
          <tr>
            <th><?= $event['id'] ?></th>
            <td><?= $event['title'] ?></td>
            <td><?= substr($event['content'], 0, 50). "...." ?></td>
            <td><?= $event['start_date'] ?></td>
            <td><?= $event['end_date'] ?></td>
            <td><?= $event['updated_date'] ?></td>
            <td><?= $event['created_date'] ?></td>
            <td>
              <a href="<?= $helper->base_url('admin/events/'. $event['id'] .'/edit') ?>" class="icon has-text-info">
                <i class="fas fa-edit"></i>
              </a>
              <a href="<?= $helper->base_url('admin/events/'. $event['id'] .'/delete') ?>" class="icon has-text-danger">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>          
        </tbody>
      </table>      
    </div>
  </section>
</div>


