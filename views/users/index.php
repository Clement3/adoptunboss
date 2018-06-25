<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Utilisateurs
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
            <th>E-mail</th>
            <th>Prénom</th>
            <th>Nom de famille</th>
            <th>Ranks</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user) { ?>
          <tr>
            <th><?= $user['id'] ?></th>
            <td><?= $user['email'] ?></td>
            <td><?= $user['firstname'] ?></td>
            <td><?= $user['lastname'] ?></td>
            <td>
              <?php if ($user['is_admin']) { ?> 
                <span class="tag is-primary">Admin</span> 
              <?php } ?>
              <?php if ($user['is_recruiter']) { ?> 
                <span class="tag is-warning">Recruteur</span> 
              <?php } else { ?> 
                <span class="tag is-info">Membre</span>
              <?php } ?>
            </td>
            <td>
              <a href="<?= $helper->base_url('admin/users/'. $user['id'] .'/edit') ?>" class="icon has-text-info">
                <i class="fas fa-edit"></i>
              </a>
              <a href="<?= $helper->base_url('admin/users/'. $user['id'] .'/delete') ?>" class="icon has-text-danger">
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