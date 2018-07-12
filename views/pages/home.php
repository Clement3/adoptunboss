<section class="hero is-medium is-primary is-bold">
  <div class="hero-body">
    <div class="container">
      <div class="has-text-centered">
        <h1 class="title">AdoptUnBoss</h1>
        <h2 class="subtitle">Le premier site ou vous pouvez match votre boss !</h2>
      </div>
    </div>
  </div>
</section>


<div class="container">
  <section class="section">
    <div class="columns">
      <div class="column is-4">
        <div class="has-text-centered">
          <a href="<?= $helper->base_url('register') ?>">
            <img src="./assets/img/candidat.png">
          </a>
          <p class="title is-4">Vous êtes Candidat?</p>
          <p class="subtitle is-6">Inscrivez-vous, c'est gratuit!</p>
        </div>
      </div>
      <div class="column is-4">
        <div class="has-text-centered">
          <a href="<?= $helper->base_url('register') ?>">
            <img src="./assets/img/recruteur.png">
          </a>
          <p class="title is-4">Vous êtes Recruteur?</p>
          <p class="subtitle is-6">Inscrivez-vous, c'est gratuit!</p>
        </div>
      </div>
      <div class="column is-4">
        <div class="has-text-centered">
          <a href="<?= $helper->base_url('offers/views') ?>">
            <img src="./assets/img/offres_emploi.png">
          </a>
          <p class="title is-4">Nos offres</p>
          <p class="subtitle is-6">Découvrez toutes nos offres d'emploi!</p>
        </div>
      </div>            
    </div>
  </section>
</div>

<section class="section has-background-light">
  <div class="container">
    
    <div class="columns">
      <div class="column is-6">
        <h3 class="title is-3">Les dernières actualités</h3>
        <div class="tile is-ancestor">
          <div class="tile is-vertical is-parent">
            <?php foreach ($news as $new) { ?>
            <div class="tile is-parent">
              <div class="tile is-child box">
                <p class="title is-4"><?= $new['title'] ?></p>
                <p class="subtitle is-6">Créer le <?= $date->format($new['created_date']) ?></p>
                <div class="content">
                  <p><?= substr ($new['content'],'0','200') . '(...)' ?></p>
                  <a href="<?= $helper->base_url('news') ?>"
                  <p>Lire la suite...</p>
                  </a>

                </div>                
              </div>
            </div>
            <?php } ?>          
          </div>
        </div>
      </div>

      <div class="column is-6 has-text-right">
        <h3 class="title is-3">Les derniers évenements</h3>
        <div class="tile is-ancestor">
          <div class="tile is-vertical is-parent">
            <?php foreach ($events as $event) { ?>
            <div class="tile is-parent">
              <div class="tile is-child box">
                <p class="title is-4"><?= $event['title'] ?></p>
                <p class="subtitle is-6">Créer le <?= $date->format($event['created_date']) ?></p>
                <div class="content">
                  <p> <?= substr ($event['content'],'0','210').'(...)' ?></p>
                  <a href=" <?= $helper->base_url('events/'. $event['id']) ?>">
                  <p>Lire la suite...</p>
                  </a>
                </div>            
              </div>
            </div>
            <?php } ?>    
          </div>
        </div>        
      </div>
    </div>

  </div>
</section>

<section class="section has-background-primary">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-6 has-text-centered">
        <?php include('./views/helpers/notifications.php') ?>
        <p class="subtitle is-4 has-text-white">S'inscrire à la newsletter</p>
        <form method="POST" action="<?= $helper->base_url('newsletter/subscribe') ?>">
          <div class="field has-addons has-addons-centered">
            <div class="control">
              <input class="input" type="email" placeholder="Votre e-mail" name="email">
            </div>
            <div class="control">
              <button class="button" type="submit">
                Inscription
              </button>
            </div>
          </div> 
        </form>
      </div>
    </div>
  </div>
</section>

<section class="section">
  <div class="content has-text-centered">
    <div class="columns is-centered">
      <div class="column"> 
        <img class="image is-128x128" src="<?= $helper->base_url('assets/img/Burger_King.png') ?>">
      </div>
      <div class="column">
        <img class="image is-128x128" src="<?= $helper->base_url('assets/img/Crédit_Agricole.png') ?>">
      </div>
      <div class="column">
        <img class="image is-128x128" src="<?= $helper->base_url('assets/img/Louis_V.png') ?>">
      </div>
      <div class="column">
        <img class="image is-128x128" src="<?= $helper->base_url('assets/img/SNCF.png') ?>">
      </div>
    </div>
  </div>
</section>