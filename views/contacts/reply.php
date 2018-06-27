<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Répondre à : <?= $contact['email'] ?>
      </h1>
      <h2 class="subtitle">
        <a href="<?= $helper->base_url('admin/contacts')?>"><i class="fas fa-angle-left"></i> Retour aux contacts</a>
      </h2>      
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="columns">
      <div class="column is-6">
        <div class="box">
          <?php include('./views/helpers/notifications.php') ?>       
          <form method="POST" action="<?= $helper->base_url('admin/contacts/' . $contact['id'] . '/reply') ?>">         
            <div class="field">
              <label class="label">Réponse</label>
              <div class="control">
                <textarea class="textarea" name="answer" cols="30" rows="10"></textarea>
              </div>
            </div>             
            <button type="submit" class="button is-primary full-width">Envoyer</button>                                    
          </form>
        </div>
      </div>
      <div class="column is-6">
        <div class="box">
          <form>
            <div class="field">
              <label class="label">E-mail</label>
              <div class="control">
                <input class="input" type="text" value="<?= $contact['email'] ?>" readonly>
              </div>
            </div>
            <div class="field">
              <label class="label">Nom complet</label>
              <div class="control">
                <input class="input" type="text" value="<?= $contact['full_name'] ?>" readonly>
              </div>
            </div>
            <div class="field">
              <label class="label">Objet</label>
              <div class="control">
                <input class="input" type="text" value="<?= $contact['title'] ?>" readonly>
              </div>
            </div>
            <div class="field">
              <label class="label">Demande</label>
              <div class="control">
                <textarea class="textarea" name="answer"><?= $contact['content'] ?></textarea>
              </div>
            </div>                                     
          </form>
        </div>
      </div>      
    </div>
  </div>
</section>