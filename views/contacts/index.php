<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Contacts
      </h1>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="box">
      <?php include('./views/helpers/notifications.php') ?>
      <?php if (empty($contacts)) { ?>
      <div class="has-text-centered">
        <p>Vous n'avez pas encore reçu de demande de contact.</p>
      </div>
      <?php } else { ?>
      <table class="table is-fullwidth">
        <thead>
          <tr>
            <th><abbr title="Identifiant"># ID</abbr></th>
            <th>E-mail</th>
            <th>Nom complet</th>
            <th>Objet</th>
            <th>Contenu</th>
            <th>Créer le</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($contacts as $contact) { ?>
            <tr>
              <th><?= $contact['id'] ?></th>
              <td><?= $contact['email'] ?></td>
              <td><?= $contact['full_name'] ?></td>
              <td><?= $contact['title'] ?></td>
              <td><?= $contact['content'] ?></td>
              <td><?= $contact['created_date'] ?></td>
              <td>
                <a href="<?= $helper->base_url('admin/contacts/'. $contact['id'] .'/reply') ?>" class="icon has-text-info">
                  <i class="fas fa-reply"></i>
                </a>
                <a href="<?= $helper->base_url('admin/contacts/'. $contact['id'] .'/delete') ?>" class="icon has-text-danger">
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