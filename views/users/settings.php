<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Paramètres
      </h1>
    </div>
  </div>
</section>

<div class="container">
  <div class="columns is-centered">
    <div class="column is-half is-narrow">
      <section class="section">
        <div class="box">
          <?php include('./views/helpers/notifications.php') ?>
          <form method="POST" action="<?= $helper->base_url('settings') ?>">
            <div class="field">
              <label class="label">E-mail</label>
              <div class="control">
                <input class="input" type="email" name="email" value="<?= $user['email'] ?>">
              </div>
            </div>
            <div class="field is-grouped">
              <p class="control is-expanded">
                <label class="label">Prénom</label>
                <input class="input" type="text" name="firstname" value="<?= $user['firstname'] ?>">
              </p>
              <p class="control is-expanded">
                <label class="label">Nom de famille</label>
                <input class="input" type="text" name="lastname" value="<?= $user['lastname'] ?>">
              </p>
            </div>
            <div class="field is-grouped">
              <p class="control is-expanded">
                <label class="label">Date de naissance</label>
                <input class="input" type="date" name="birthday" value="<?= $user['birthday'] ?>">
              </p>
              <p class="control is-expanded">
                <label class="label">Téléphone</label>
                <input class="input" type="text" name="phone" value="<?= $user['tel'] ?>">
              </p>
            </div>                        
            <button type="submit" class="button is-primary full-width">Sauvegarder</button>                        
          </form>
        </div>
      </section>
    </div>
  </div>
</div>