<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        <?= $offer['title'] ?>
      </h1>
      <?php if ($helper->is_recruiter()) { ?>
      <h2 class="subtitle">
        <a href="<?= $helper->base_url('offers')?>"><i class="fas fa-angle-right"></i> Mes offres</a>
      </h2>
      <?php } ?>      
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-half is-narrow">
        <div class="box">
          <?php include('./views/helpers/notifications.php') ?>
          <article class="media offer">
            <span class="hidden" id="lat"><?= $offer['latitude'] ?></span>
            <span class="hidden" id="lng"><?= $offer['longitude'] ?></span>
            <div class="media-content">
              <div class="content">
                <div class="level">
                  <div class="level-left">
                    <div class="level-item">
                      <span class="subtitle is-5"><?= $offer['title'] ?></span>
                    </div>
                  </div>
                  <div class="level-right">
                    <div class="level-item">
                      <?php if (!$helper->is_recruiter()) { ?>
                      <a class="button is-primary is-small" href="">Postuler</a>
                      <?php } else { ?>
                      <a class="button is-info is-small" href="<?= $helper->base_url('offers/'.$offer['id'].'/edit') ?>">Editer</a>    
                      <?php } ?>
                    </div>
                  </div>
                </div>
                <div id="map"></div>
                <div class="offer-list">
                  <dl>
                    <dt>Salaires</dt>
                      <dd>Entre <?= $offer['salary_min'] ?>€ et <?= $offer['salary_max'] ?>€ par an</dd>
                    <dt>Secteur d'activité</dt>
                      <dd><?= $offer['activitie_name'] ?></dd>
                    <dt>Type de contrat</dt>
                      <dd><?= $offer['employment_name'] ?></dd>
                    <?php if ($offer['employment_name'] !== 'CDI') { ?>
                    <dt>Durée du contrat</dt>
                      <dd><?= $offer['period'] ?></dd>
                    <?php } ?>
                    <?php if (!empty($offer['experience'])) { ?>
                    <dt>Expérience minimun</dt>
                      <dd><?= $offer['experience'] ?></dd>
                    <?php } ?>
                  </dl>
                </div>
                <p class="offer-content">
                  <?= $offer['content'] ?>
                </p>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </div>
</section>
