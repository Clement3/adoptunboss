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
          <p class="title is-4">Title 4</p>
          <p class="subtitle is-6">Subtitle 6</p>
          <span><i class="fas fa-edit fa-3x"></i></span>
        </div>
      </div>
      <div class="column is-4">
        <div class="has-text-centered">
          <p class="title is-4">Title 4</p>
          <p class="subtitle is-6">Subtitle 6</p>
          <span><i class="fas fa-edit fa-3x"></i></span>
        </div>
      </div>
      <div class="column is-4">
        <div class="has-text-centered">
          <p class="title is-4">Title 4</p>
          <p class="subtitle is-6">Subtitle 6</p>
          <span><i class="fas fa-edit fa-3x"></i></span>
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
                <p class="subtitle is-6">Créer le <?= $new['created_date'] ?></p>
                <div class="content">
                  <p><?= $new['content'] ?></p>
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
                <p class="subtitle is-6">Créer le <?= $event['created_date'] ?></p>
                <div class="content">
                  <p<div class="columns"> $event['content'] ?></p>
                </di<div class="columns">              
              </div><div class="columns">
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