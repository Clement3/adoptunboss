<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Editer <?= $user['email'] ?>
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
          <form method="POST" action="<?= $helper->base_url('admin/users/'.$user['id'].'/edit') ?>">
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
                <label class="label">Code postal</label>
                <input class="input" type="text" name="zip_code" value="<?= $user['zip_code'] ?>">
              </p>
              <p class="control is-expanded">
                <label class="label">Ville</label>
                <input class="input" type="text" name="city" value="">
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
            <div class="field is-grouped">
              <div class="control is-expanded">
                <label class="label">Admin</label>
                <div class="select full-width">
                  <select class="full-width" name="is_admin">
                    <option value="1" <?php if ($user['is_admin']) { ?>selected<?php } ?>>Oui</option>
                    <option value="0" <?php if (!$user['is_admin']) { ?>selected<?php } ?>>Non</option>
                  </select>
                </div>
              </div>
              <div class="control is-expanded">
                <label class="label">Grade</label>
                <div class="select full-width">
                  <select class="full-width" name="rank">
                    <option value="0" <?php if (!$user['is_recruiter']) { ?>selected<?php } ?>>Membre</option>
                    <option value="1" <?php if ($user['is_recruiter']) { ?>selected<?php } ?>>Recruteur</option>
                  </select>
                </div>
              </div>
            </div>                     
            <button type="submit" class="button is-primary full-width">Sauvegarder</button>                                     
          </form>
        </div>
      </section>
    </div>
  </div>
</div>