<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdoptUnBoss</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="<?= $helper->base_url('assets/css/multi-select.css') ?>">
    <link rel="stylesheet" href="<?= $helper->base_url('assets/css/app.css') ?>">
    <link href='https://api.mapbox.com/mapbox-gl-js/v0.46.0/mapbox-gl.css' rel='stylesheet' />
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  </head>
  <body>
  <nav class="navbar is-transparent">
    <div class="navbar-brand">
      <a class="navbar-item" href="<?= $helper->base_url() ?>">
        <img src="<?= $helper->base_url("assets/img/logo_black.png") ?>" alt="Logo : adopte un boss">
        AdoptUnBoss
      </a>
      <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="<?= $helper->base_url('premium') ?>">
          Premium
        </a>
        <a class="navbar-item" href="<?= $helper->base_url('how') ?>">
          Comment ça marche ?
        </a>
        <a class="navbar-item" href="<?= $helper->base_url('events') ?>">
          Evenement
        </a>
        <a class="navbar-item" href="<?= $helper->base_url('news') ?>">
          News
        </a>        
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="field is-grouped">
            <?php if ($helper->is_auth()) { ?>
            <?php if ($helper->is_recruiter()) { ?>
            <p class="control">
              <a href="<?= $helper->base_url('offers/create') ?>" class="button is-danger">Créer une offre</a>
            </p> 
            <?php } else { ?>
            <p class="control">
              <a class="button is-danger">Match</a>
            </p> 
            <?php } ?>                   
            <?php if ($helper->is_admin()) { ?>
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                Administration
              </a>

              <div class="navbar-dropdown">
                <a href="<?= $helper->base_url('admin/dashboard') ?>" class="navbar-item">
                  Dashboard
                </a>                
                <a href="<?= $helper->base_url('admin/users'); ?>" class="navbar-item">
                  Utilisateurs
                </a>                
                <a href="<?= $helper->base_url('admin/offers'); ?>" class="navbar-item">
                  Offres
                </a>
                <a href="<?= $helper->base_url('admin/newsletters'); ?>" class="navbar-item">
                  Newsletters
                </a>                
                <a href="<?= $helper->base_url('admin/contacts'); ?>" class="navbar-item">
                  Contacts
                </a>
                <a href="<?= $helper->base_url('admin/employments'); ?>" class="navbar-item">
                  Type de contrat
                </a>
                <a href="<?= $helper->base_url('admin/activities'); ?>" class="navbar-item">
                  Activités
                </a>                
                <a href="<?= $helper->base_url('admin/skills'); ?>" class="navbar-item">
                  Compétences
                </a>
              </div>            
            </div>
            <?php } ?>
            <div class="navbar-item has-dropdown is-hoverable">
              <a class="navbar-link">
                Mon compte
              </a>

              <div class="navbar-dropdown">
                <a href="<?= $helper->base_url('dashboard'); ?>" class="navbar-item">
                  Dashboard
                </a>
                <?php if ($helper->is_recruiter()) { ?>
                <a href="<?= $helper->base_url('offers'); ?>" class="navbar-item">
                  Mes offres
                </a>
                <?php } ?>              
                <a href="<?= $helper->base_url('settings'); ?>" class="navbar-item">
                  Paramètres
                </a>
                <hr class="navbar-divider">
                <a href="<?= $helper->base_url('logout'); ?>" class="navbar-item">
                  Déconnexion
                </a>
              </div>            
            </div>                    
            <?php } else { ?>
            <p class="control">
              <a class="button" href="<?= $helper->base_url('login') ?>">
                <span>Connexion</span>
              </a>
            </p>
            <p class="control">
              <a class="button is-primary" href="<?= $helper->base_url('register') ?>">
                <span>Créer un compte</span>
              </a>
            </p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </nav>