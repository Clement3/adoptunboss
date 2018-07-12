<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Gestion des actualités
      </h1>
      <h2 class="subtitle">
        <a href="<?= $helper->base_url('admin/news/create')?>"><i class="fas fa-angle-right"></i> Créer une actualité</a>
      </h2>      
    </div>
  </div>
</section>

<div class="container">
  <section class="section">
    <div class="box">
      <?php include('./views/helpers/notifications.php') ?>
      <?php if (empty($news)) { ?>
      <div class="has-text-centered">
        <p>Vous n'avez pas encore créer d'actualité.</p>
        <a href="<?= $helper->base_url('admin/news/create') ?>">Créer une actualité.</a>
      </div>
      <?php } else { ?>        
      <table class="table is-fullwidth">
        <thead>
          <tr>
            <th><abbr title="Identifiant"># ID</abbr></th>
            <th>Titre</th>
            <th>Résumé</th>
            <th>Date de création</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($news as $new) { ?>
          <tr>
            <th><?= $new['id'] ?></th>
            <td><?= $new['title'] ?></td>
            <td><?= substr($new['content'], 0, 50). "...." ?></td>
            <td><?= $date->format($new['created_date']) ?></td>
            <td>
              <a href="<?= $helper->base_url('admin/news/'. $new['id'] .'/edit') ?>" class="icon has-text-info">
                <i class="fas fa-edit"></i>
              </a>
              <a href="<?= $helper->base_url('admin/news/'. $new['id'] .'/delete') ?>" class="icon has-text-danger">
                <i class="fas fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>          
        </tbody>
      </table>   
      <?php } ?>   
    </div>
  </section>
</div>