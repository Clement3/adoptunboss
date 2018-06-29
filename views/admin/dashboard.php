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
  <div class="columns is-multiline">
    <div class="column is-6">
      <div class="box">
        <h6 class="title is-6">Dernières recruteurs <a href="<?= $helper->base_url('admin/users') ?>" class="is-pulled-right">Voir tous</a></h6>
        <?php if (empty($recruiters)) { ?>
        <div class="has-text-centered">
          <p>Aucun recruteur.</p>
        </div>
        <?php } else { ?>
        <table class="table is-fullwidth">
          <thead>
            <tr>
              <th>Titre</th>
              <th>Prénom</th>
              <th>Nom de famille</th>
              <th>Entreprise</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($recruiters as $recruiter) { ?>
            <td><?= $recruiter['email'] ?></td>
            <td><?= $recruiter['firstname'] ?></td>
            <td><?= $recruiter['lastname'] ?></td>
            <td><?= $recruiter['company'] ?></td>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
      </div>
    </div>  
    <div class="column is-6">
      <div class="box">
        <h6 class="title is-6">Dernières candidats <a href="<?= $helper->base_url('admin/users') ?>" class="is-pulled-right">Voir tous</a></h6>
        <?php if (empty($candidats)) { ?>
        <div class="has-text-centered">
          <p>Aucun candidat.</p>
        </div>
        <?php } else { ?>
        <table class="table is-fullwidth">
          <thead>
            <tr>
              <th>Titre</th>
              <th>Prénom</th>
              <th>Nom de famille</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($candidats as $candidat) { ?>
            <td><?= $candidat['email'] ?></td>
            <td><?= $candidat['firstname'] ?></td>
            <td><?= $candidat['lastname'] ?></td>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
      </div>
    </div>      
    <div class="column is-6">
      <div class="box">
        <h6 class="title is-6">Dernières actualités</h6>
        <?php if (empty($news)) { ?>
        <div class="has-text-centered">
          <p>Aucune actualités.</p>
          <a href="<?= $helper->base_url('admin/news/create') ?>">Créer une actualité.</a>
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
        <h6 class="title is-6">Dernières évènement</h6>
        <?php if (empty($events)) { ?>
        <div class="has-text-centered">
          <p>Aucun evènement.</p>
          <a href="<?= $helper->base_url('admin/events/create') ?>">Créer un évènement.</a>
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
            <?php foreach ($events as $event) { ?>
            <td><?= $event['title'] ?></td>
            <?php } ?>
          </tbody>
        </table>
        <?php } ?>
      </div>
    </div>
  </div>
</section>