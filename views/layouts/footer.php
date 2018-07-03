    <footer class="footer">
      <div class="content has-text-centered">
        <h4 class="title is-4">Les entreprises qui recrutent</h4>
        <div class="columns is-mobile">
          <div class="column"> 
            <img src="http://via.placeholder.com/140x100">
          </div>
          <div class="column">
            <img src="http://via.placeholder.com/140x100">
          </div>
          <div class="column">
            <img src="http://via.placeholder.com/140x100">
          </div>
          <div class="column">
            <img src="http://via.placeholder.com/140x100">
          </div>
        </div>
      </div>
      <section class="section">
        <hr />
        <div class="content is-size-7">
          <div class="level">
            <div class="level-left">
                <span class="level-item">&copy; AdoptUnBoss - Tous droit réservés.</span>
                <a href="<?= $helper->base_url('terms'); ?>" class="level-item">Conditions d'utilisations</a></p>
                <a href="<?= $helper->base_url('contact') ?>" class="level-item">Nous contacter</a>
              </div>
              <div class="level-item has-text-centered">
                <a href="<?= $helper->base_url(); ?>">
                  <img src="<?= $helper->base_url('assets/img/logo_black.png'); ?>" width="30px" alt="Logo">
                </a>
              </div>
              <div class="level-right">
                <a href="<?= $helper->base_url('how'); ?>" class="level-item">Comment ça marche ?</a></p>
                <a href="<?= $helper->base_url('premium'); ?>" class="level-item">Premium</a></p>
                <a href="<?= $helper->base_url('news'); ?>" class="level-item">Actualités</a></p>
                <a href="<?= $helper->base_url('events'); ?>" class="level-item">Evenements</a></p>
                </div>
            </div>
          </div>
        </div>  
      </section>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDDCe2tIZ-OaMK4YAb2N9GxV-wycx0pmp4"></script>
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>
    <script src="<?= $helper->base_url('assets/js/jquery.geocomplete.min.js'); ?>"></script>
    <script src="<?= $helper->base_url('assets/js/jquery.multi-select.js'); ?>"></script>  
    <script src="<?= $helper->base_url('assets/js/app.js'); ?>"></script>    
  </body>
</html>