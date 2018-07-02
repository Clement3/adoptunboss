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
            <div class="field is-grouped">
              <p class="control is-expanded">
                <label class="label">Localisation</label>
                <input class="input" type="text" placeholder="ex: Montpellier" name="place" id="place">
                <input type="text" class="hidden" id="lat" name="lat">
                <input type="text" class="hidden" id="lng" name="lng">
              </p>
              <p class="control is-expanded">
                <label class="label">Rayon en km</label>
                <input class="input" type="number" placeholder="ex: 50" name="radius">
              </p>
            </div>            
            <div class="field is-grouped">
              <label class="label">Salaire par /an</label>
              <p class="control is-expanded">
                <label class="label">Salaire par /an</label>
                <input class="input" type="number" name="salary_min" placeholder="35000">
              </p>
            </div> 
            <div class="field">
              <p class="control">
                <label class="label">Type de contrat</label>
                <div class="select full-width">
                  <select class="full-width" name="employment">
                    <?php foreach ($employments as $employment) { ?>
                      <option value="<?= $employment['id'] ?>"><?= $employment['name'] ?></option>
                    <?php } ?>
                  </select>
                </div>                
              </p>              
            </div>
            <div class="field">
              <p class="control">
                <label class="label">Activités</label>
                <div class="select full-width">
                  <select class="full-width" name="activitie" id="activitie">
                    <?php foreach ($activities as $activitie) { ?>
                      <option value="<?= $activitie['id'] ?>"><?= $activitie['name'] ?></option>
                    <?php } ?>
                  </select>
                </div>                
              </p> 
            </div>             
            <div class="field">
              <select multiple="multiple" id="skills" name="skills[]">
              </select>
            </div>                                     
          </form>
        </div>
      </div>
    </div>
  </div>
</section>