<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Offres d'emploi
      </h1>     
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <?php foreach($offers as $offer) { ?>
    <div class="box">
      <article class="media offers">
        <div class="media-content">
          <div class="content">
            <h4 class="title is-4 is-marginless"><?= $offer['title'] ?></h4>
            <p>
              <small>Créer le <?= $date->format($offer['created_date']) ?></small>
            </p>
            <p><?= substr ($offer['content'],'0','200').'(...)' ?></p>
          </div>        
        </div>
      </article>
    </div>
    <?php } ?>
  </div>
</section>