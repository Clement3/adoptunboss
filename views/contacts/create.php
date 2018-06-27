<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Nous contacter
      </h1>
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-half is-narrow">
        <div class="box">
          <?php include('./views/helpers/notifications.php') ?>       
          <form method="POST" action="<?= $helper->base_url('contact') ?>">
            <div class="field">
              <label class="label">Nom complet</label>
              <div class="control">
                <input class="input" type="text" name="full_name" placeholder="ex: John Doe">
              </div>
            </div>
            <div class="field">
              <label class="label">E-mail</label>
              <div class="control">
                <input class="input" type="email" name="email" placeholder="ex: john@gmail.com">
              </div>
            </div>            
            <div class="field">
              <label class="label">Objet</label>
              <div class="control">
                <input class="input" type="text" name="title" placeholder="L'objet de votre demande">
              </div>
            </div>
            <div class="field">
              <label class="label">Description</label>
              <div class="control">
              <textarea class="textarea" name="content" cols="30" rows="10" placeholder="Pourquoi vous nous contactez ?"></textarea>
              </div>
            </div>             
            <button type="submit" class="button is-primary full-width">Envoyer</button>                                    
          </form>
        </div>
      </div>
    </div>
  </div>
</section>