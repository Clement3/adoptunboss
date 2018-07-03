<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Editer <?= $offer['title'] ?>
      </h1>
      <h2 class="subtitle">
        <a href="<?= $helper->base_url('offers')?>"><i class="fas fa-angle-right"></i> Mes offres</a>
      </h2>      
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="columns is-centered">
      <div class="column is-half is-narrow">
        <div class="box">
          <?php include('./views/helpers/notifications.php') ?>
          <form method="POST" action="<?= $helper->base_url('offers/'.$offer['id'].'/edit') ?>">
            <input type="text" class="hidden" value="<?= $offer['id'] ?>" id="offer">
            <div class="field">
              <label class="label">Titre de l'offre</label>
              <div class="control">
                <input class="input" type="text" value="<?= $offer['title'] ?>" name="title">
              </div>
            </div>
            <div class="field">
              <label class="label">Localisation</label>
              <div class="control">
                <input class="input" type="text" placeholder="Titre" name="place" id="place" value="<?= $offer['place'] ?>">
                <input type="text" class="hidden" id="lat" name="lat" value="<?= $offer['latitude'] ?>">
                <input type="text" class="hidden" id="lng" name="lng" value="<?= $offer['longitude'] ?>">
              </div>
            </div>
            <div class="field is-grouped">
              <p class="control is-expanded">
                <label class="label">Salaire minimum /an</label>
                <input class="input" type="number" name="salary_min" value="<?= $offer['salary_min'] ?>">
              </p>
              <p class="control is-expanded">
                <label class="label">Salaire maximum /an</label>
                <input class="input" type="number" name="salary_max" value="<?= $offer['salary_max'] ?>">
              </p>
            </div>
            <div class="field">
              <p class="control">
                <label class="label">Type de contrat</label>
                <div class="select full-width">
                  <select class="full-width" name="employment" id="employments">
                    <?php foreach ($employments as $employment) { ?>
                      <option value="<?= $employment['id'] ?>" data-period="<?= $employment['has_period'] ?>" <?php if ($offer['employment_name'] === $employment['name']) { ?> selected <?php } ?>><?= $employment['name'] ?></option>
                    <?php } ?>
                  </select>
                </div>                
              </p>              
            </div>  
            <div class="field hidden" id="period-field">
              <label class="label">Durée du contrat (en mois)</label>
              <p class="control">
                <input class="input" type="number" name="period" value="<?php if (isset($offer['period'])) { echo $offer['period']; } ?>">
              </p>
            </div>                       
            <div class="field">
              <p class="control">
                <label class="label">Activités</label>
                <div class="select full-width">
                  <select class="full-width" name="activitie" id="activitie">
                    <?php foreach ($activities as $activitie) { ?>
                      <option value="<?= $activitie['id'] ?>" <?php if ($offer['activitie_name'] === $activitie['name']) { ?> selected <?php } ?>><?= $activitie['name'] ?></option>
                    <?php } ?>
                  </select>
                </div>                
              </p> 
            </div>
            <div class="field">
              <label class="label">Expérience</label>
              <p class="control">                
                <input type="number" class="input" name="exp" value="<?= $offer['experience'] ?>">              
              </p>
            </div>                          
            <div class="field">
              <select multiple="multiple" id="skills" name="skills[]">
              </select>
            </div>                                  
            <div class="field">
              <label class="label">Description</label>
              <div class="control">
              <textarea class="textarea" name="content" cols="30" rows="10" placeholder="Décrivez votre annonce"><?= $offer['content'] ?></textarea>
              </div>
            </div>             
            <button type="submit" class="button is-primary full-width">Envoyer</button>                     
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
