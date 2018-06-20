<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Créer un compte
      </h1>
    </div>
  </div>
</section>

<div class="container">
  <div class="columns is-centered">
    <div class="column is-half is-narrow">
      <section class="section">
        <div class="box">
          <div class="tabs is-centered">
            <ul id="tabs-register">
              <li class="is-active"><a>Candidat</a></li>
              <li><a>Recruteur</a></li>
            </ul>
          </div>        
          <form method="POST" action="<?= $helper->base_url('register') ?>">
            <div class="field">
              <label class="label">E-mail</label>
              <div class="control">
                <input class="input" type="email" name="email" placeholder="Votre e-mail">
              </div>
            </div>
            <div class="field is-grouped">
              <p class="control is-expanded">
                <label class="label">Prénom</label>
                <input class="input" type="text" name="firstname" placeholder="Votre prénom">
              </p>
              <p class="control is-expanded">
                <label class="label">Nom de famille</label>
                <input class="input" type="text" name="lastname" placeholder="Votre nom de famille">
              </p>
            </div>                      
            <div class="field">
              <label class="label">Mot de passe</label>
              <div class="control">
                <input class="input" type="password" name="password" placeholder="Votre mot de passe">
              </div>
            </div>
            <div class="field">
              <label class="label">Confirmation du mot de passe</label>
              <div class="control">
                <input class="input" type="password" name="repeat_password" placeholder="Retaper votre mot de passe">
              </div>
            </div>            
            <button type="submit" class="button is-primary full-width">Créer un compte</button>    
          </form>
          <p class="has-text-centered login-register">
            Vous avez déjà un compte ? <a href="<?= $helper->base_url('login') ?>">Connexion</a>.
          </p>          
        </div>
      </section>
    </div>  
  </div>
</div>