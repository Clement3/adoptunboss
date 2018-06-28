<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Mes offres
      </h1>
      <h2 class="subtitle">
        <a href="<?= $helper->base_url('offers/create')?>"><i class="fas fa-angle-right"></i> Créer une offre</a>
      </h2>      
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="box">
      <?php include('./views/helpers/notifications.php') ?>
      <?php if (empty($offers)) { ?>
      <div class="has-text-centered">
        <p>Vous n'avez pas encore créer d'offre.</p>
        <a href="<?= $helper->base_url('offers/create')?>">Créer une nouvelle offre</a>
      </div>
      <?php } else { ?>      
      <table class="table is-fullwidth">
        <thead>
          <tr>
            <th>Titre</th>
            <th>Secteur d'activité</th>
            <th>Type de contrat</th>
            <th>Créer le</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($offers as $offer) { ?>
            <tr>
              <th><?= $offer['title'] ?></th>
              <td><?= $offer['activitie_name'] ?></td>
              <td><?= $offer['employment_name'] ?></td>
              <td><?= $offer['created_date'] ?></td>
              <td>
                <a href="<?= $helper->base_url('offer/'. $offer['id']) ?>" class="button is-small">Voir</a>
                <a href="<?= $helper->base_url('offers/'. $offer['id'] .'/edit') ?>" class="button is-small has-text-info">
                  <i class="fas fa-edit"></i>
                </a>
                <a href="<?= $helper->base_url('offers/'. $offer['id'] .'/delete') ?>" class="button is-small has-text-danger">
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