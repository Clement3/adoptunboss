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
  <div class="container">
    <div class="columns">
      <div class="column is-3">
        <div class="box">
          <p class="title is-6">
            <?= $user['firstname'].' '. $user['lastname'] ?> 
            <?php if ($helper->is_recruiter()) { ?>
            <span class="tag is-primary">Recruteur</span>
            <?php } else { ?>
            <span class="tag is-primary">Candidat</span>
            <?php } ?>
          </p>
          <p class="subtitle is-6">Inscrit depuis le : <?= $date->formatWithoutTime($user['created_date']) ?></p>
        </div>
      </div>
      <div class="column">
        <?php include('./views/helpers/notifications.php') ?>       
        <?php if ($helper->is_recruiter()) { ?>
          <h5 class="title is-5">Les candidats qui ont postulé</h5>
          <?php foreach ($postulates as $postulate) { ?>
            <div class="column is-4">
              <div class="card">
                <header class="card-header">
                  <p class="card-header-title">
                    <?= $postulate['title'] ?>
                  </p>
                </header>
                <footer class="card-footer">
                  <a href="<?= $helper->base_url('offer/'. $postulate['offers_id']) ?>" class="card-footer-item">Voir</a>
                  <?php if ($postulate['accepted']) { ?>
                  <a href="#" class="card-footer-item">Chat</a>
                  <?php } else { ?>
                  <a href="<?= $helper->base_url('postulates/'. $postulate['id'] .'/accept') ?>" class="card-footer-item has-text-success">Accepter</a>
                  <?php } ?>
                </footer>
              </div>
            </div>
          <?php } ?>
        <?php } else { ?>
          <h5 class="title is-5">Ces recruteurs souhaitent vous rencontrez</h5>
          <div class="columns">
            <?php foreach ($postulates as $postulate) { ?>
            <div class="column is-4">
              <div class="card">
                <header class="card-header">
                  <p class="card-header-title">
                    <?= $postulate['title'] ?>
                  </p>
                </header>
                <footer class="card-footer">
                  <a href="<?= $helper->base_url('offer/'. $postulate['id']) ?>" class="card-footer-item">Voir</a>
                  <a href="#" class="card-footer-item">Chat</a>
                </footer>
              </div>
            </div>
            <?php } ?>
          </div>
        <?php } ?>

        <div class="box">
          <p class="title is-5">Mes informations personnelles :  </p>
            <p>Nom : <?= $user['lastname'] ?>  </p>
            <p>Prénom : <?= $user['firstname'] ?> </p>
            <p>email : <?= $user['email'] ?> </p>
            <p>Date de naissance : <?= $user['birthday'] ?> </p>
            <p>Telephone : <?= $user['tel'] ?> <p>

            <br>
            <a class="button is-danger" href="<?= $helper->base_url('settings')?>">Modifier </a>
        </div>        
      </div>
    </div>
  </div>
</section>