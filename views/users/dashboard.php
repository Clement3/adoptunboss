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
          <figure class="image is-128x128">
            <img src="https://bulma.io/images/placeholders/128x128.png">
          </figure><br>
    
          <div class="file">
            <label class="file-label">
              <input class="file-input" type="file" name="resume">
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Importer
                </span>
              </span>
            </label>
          </div>
          <br>

          <p class="subtitle is-6">Inscrit depuis le : <?= $date->formatWithoutTime($user['created_date']) ?></p>
        </div>
      </div>
      <div class="column">
        <?php if ($helper->is_recruiter()) { ?>
          <h3 class="title is-3">Ces recruteurs souhaitent vous rencontrez</h3>
        <?php } else { ?>
          <h5 class="title is-5">Ces recruteurs souhaitent vous rencontrez</h5>
          <div class="columns">
            <div class="column is-4">
              <div class="card">
                <header class="card-header">
                  <p class="card-header-title">
                    Component
                  </p>
                </header>
                <footer class="card-footer">
                  <a href="#" class="card-footer-item">Voir</a>
                  <a href="#" class="card-footer-item">Chat</a>
                </footer>
              </div>
            </div>
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