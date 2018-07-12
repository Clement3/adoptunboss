<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        <?php if ($helper->is_admin()) { ?>
        Les offres
        <?php } else { ?>
        Mes offres
        <?php } ?>
      </h1>
      <?php if (!$helper->is_admin()) { ?>
      <h2 class="subtitle">
        <a href="<?= $helper->base_url('offers/create')?>"><i class="fas fa-angle-right"></i> Créer une offre</a>
      </h2>
      <?php } ?>      
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
            <?php if ($helper->is_admin()) { ?>
            <th>Créer par</th>
            <?php } else { ?>
            <th>Type de contrat</th>
            <?php } ?>
            <th>Créer le</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($offers as $offer) { ?>
            <tr>
              <th><?= $offer['title'] ?></th>
              <td><?= $offer['activitie_name'] ?></td>
              <?php if ($helper->is_admin()) { ?>
              <td><?= $offer['email'] ?></td>
              <?php } else { ?>
              <td><?= $offer['employment_name'] ?></td>  
              <?php } ?>
              <td><?= $date->format($offer['created_date']) ?></td>
              <td>
                <a href="<?= $helper->base_url('offer/'. $offer['id']) ?>" class="button is-small">Voir</a>
                <a href="<?= $helper->base_url('offers/'. $offer['id'] .'/edit') ?>" class="button is-small has-text-info">
                  <i class="fas fa-edit"></i>
                </a>
                <?php if ($offer['closed']) { ?>
                  <span class="tag is-danger">Fermer</span>
                <?php } else { ?>
                <a href="<?= $helper->base_url('offers/'. $offer['id'] .'/delete') ?>" class="button is-small has-text-danger">
                  <i class="fas fa-trash-alt"></i>
                </a>
                <?php } ?>                
              </td>              
            </tr>
          <?php } ?>
        </tbody>      
      </table>
      <?php } ?>
    </div>
  </div>
</section>