<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Mon profil
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
          <form method="POST" action="<?= $helper->base_url('profile') ?>">
            <?php if(isset($profile['id'])) { ?>
              <input class="hidden" type="text" name="profile" id="profile" value="<?= $profile['id'] ?>">
            <?php } ?>
            <div class="field is-grouped">
              <p class="control is-expanded">
                <label class="label">Localisation</label>
                <input class="input" type="text" placeholder="ex: Montpellier" name="place" id="place" value="<?= $profile['place'] ?>">
                <input type="text" class="hidden" id="lat" name="lat">
                <input type="text" class="hidden" id="lng" name="lng">
              </p>
              <p class="control is-expanded">
                <label class="label">Rayon en km</label>
                <input class="input" type="number" placeholder="ex: 50" name="radius" value="<?= $profile['radius'] ?>">
              </p>
            </div>            
            <div class="field">
              <label class="label">Salaire par /an</label>
              <p class="control">
                <input class="input" type="number" name="salary" placeholder="35000" value="<?= $profile['salary'] ?>">
              </p>
            </div> 
            <div class="field">
              <p class="control">
                <label class="label">Type de contrat</label>
                <div class="select full-width">
                  <select class="full-width" name="employment" id="employments">
                    <?php foreach ($employments as $employment) { ?>
                      <option value="<?= $employment['id'] ?>" data-period="<?= $employment['has_period'] ?>" <?php if ($profile['employment_name'] === $employment['name']) { ?> selected <?php } ?>><?= $employment['name'] ?></option>
                    <?php } ?>
                  </select>
                </div>                
              </p>              
            </div>
            <div class="field hidden" id="period-field">
              <label class="label">Durée du contrat (en mois)</label>
              <p class="control">
                <input id="period-input" class="input" type="number" name="period" value="<?php if (isset($profile['period'])) { echo $profile['period']; } ?>">
              </p>
            </div>            
            <div class="field">
              <p class="control">
                <label class="label">Activités</label>
                <div class="select full-width">
                  <select class="full-width" name="activitie" id="activitie">
                    <?php foreach ($activities as $activitie) { ?>
                      <option value="<?= $activitie['id'] ?>" <?php if ($profile['activitie_name'] === $activitie['name']) { ?> selected <?php } ?>><?= $activitie['name'] ?></option>
                    <?php } ?>
                  </select>
                </div>                
              </p> 
            </div>   
            <div class="field">
              <label class="label">Expérience</label>
              <p class="control">                
                <input type="number" class="input" name="exp" placeholder="L'expérience que vous avez dans ce secteur" value="<?= $profile['experience'] ?>">              
              </p>
            </div>                      
            <div class="field">
              <select multiple="multiple" id="skills" name="skills[]">
              </select>
            </div>
            <button type="submit" class="button is-primary full-width">Sauvegarder</button>                                                              
          </form>
        </div>
      </div>
    </div>
  </div>
</section>