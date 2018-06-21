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
            <p class="control">
              <a class="bd-tw-button button" data-social-network="Twitter" data-social-action="tweet" data-social-target="http://localhost:4000" target="_blank" href="https://twitter.com/intent/tweet?text=Bulma: a modern CSS framework based on Flexbox&amp;hashtags=bulmaio&amp;url=http://localhost:4000&amp;via=jgthms">
                <span class="icon">
                  <i class="fab fa-twitter"></i>
                </span>
                <span>
                  Connexion
                </span>
              </a>
            </p>
            <p class="control">
              <a class="button is-primary" href="">
                <span class="icon">
                  <i class="fas fa-download"></i>
                </span>
                <span>Créer un compte</span>
              </a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </nav>