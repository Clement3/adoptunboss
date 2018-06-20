<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Connexion
      </h1>
    </div>
  </div>
</section>

<div class="container">
  <div class="columns is-centered">
    <div class="column is-half is-narrow">
      <section class="section">
        <div class="box">
          <form method="POST" action="<?= $helper->base_url('login') ?>">
            <div class="field">
              <label class="label">E-mail</label>
              <div class="control">
                <input class="input" type="email" name="email" placeholder="Votre e-mail">
              </div>
            </div>
            <div class="field">
              <label class="label">Mot de passe</label>
              <div class="control">
                <input class="input" type="password" name="password" placeholder="Votre mot de passe">
              </div>
            </div>
              <button type="submit" class="button is-primary full-width">Se connecter</button>    
          </form>
          <p class="has-text-centered login-register">
            Vous n'avez pas de compte ? <a href="<?= $helper->base_url('register') ?>">Créer un compte</a>.
          </p>          
        </div>
      </section>
    </div>  
  </div>
</div>