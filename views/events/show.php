<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title"><?= $event['title'] ?>
      </h1>
      <h2 class="subtitle"><a href="%3C?=%20$helper-%3Ebase_url('events')?%3E"><i class="fas fa-angle-left"></i> Retour aux évènements</a></h2><span class="hidden" id="lat"><?= $event['latitude'] ?>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="box">
      <div class="level-item">
        <span class="subtitle is-5"><?= $event['title'] ?>
        </span>
      </div>
      <?= $event['content']?>
      </span> <span class="hidden" id="lng"><?= $event['longitude'] ?>
      </span>
      <div class="media-content">
        <div class="content">
          <div class="level">
            <div class="level-left">
            </div>
            <div class="level-right">
              <div class="level-item">
                <?php if (!$helper->is_recruiter()) { ?><a class="button is-primary is-small" href="">Postuler</a> <?php } else { ?> <a class="button is-info is-small" href="%3C?=%20$helper-%3Ebase_url('offers/'.$event['id'].'/edit')%20?%3E">Editer</a> <?php } ?>
              </div>
            </div>
          </div>
        <div id="map"></div>
      <div class="offer-list"></div>
    </div>
  </div>
</section>