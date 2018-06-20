<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    <link rel="stylesheet" href="<?= $helper->base_url('/assets/app.css') ?>">
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
  </head>
  <body>
  <nav class="navbar is-transparent">
    <div class="navbar-brand">
      <a class="navbar-item" href="<?= $helper->base_url() ?>">
        <img src="https://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28">
      </a>
      <div class="navbar-burger burger" data-target="navbarExampleTransparentExample">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <div id="navbarExampleTransparentExample" class="navbar-menu">
      <div class="navbar-start">
        <a class="navbar-item" href="">
          Nos offres
        </a>
        <a class="navbar-item" href="">
          Comment ça marche ?
        </a>
        <a class="navbar-item" href="">
          Evenement
        </a>        
      </div>

      <div class="navbar-end">
        <div class="navbar-item">
          <div class="field is-grouped">
            <?php if ($helper->is_auth()) { ?>
            <p class="control">
              <a class="button" href="">
                <span>Mon compte</span>
              </a>
            </p>    
            <p class="control">
              <a class="button" href="<?= $helper->base_url('logout') ?>">
                <span>Déconnexion</span>
              </a>
            </p>                    
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