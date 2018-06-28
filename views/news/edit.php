<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Editer l'actualité
      </h1>
    </div>
  </div>
</section>

<div class="container">
  <section class="section">
    <div class="columns">
      <div class="column">
        <div class="box">
          <?php include('./views/helpers/notifications.php') ?>
          <form method="POST" action="<?= $helper->base_url('news/'.$new['id'].'/edit') ?>">
            <div class="field">
              <label class="label">Titre</label>
              <div class="control">
                <input class="input" type="text" name="title" value="<?= $new['title'] ?>">
              </div>
            </div>
            <div class="field">
              <label class="label">Petit contenu</label>
              <div class="control">
                <textarea class="textarea" name="content"><?= $new['short_content'] ?></textarea>
              </div>
            </div>             
            <div class="field">
              <label class="label">Contenu</label>
              <div class="control">
                <textarea class="textarea" name="content"><?= $new['content'] ?></textarea>
              </div>
            </div>  
            <button type="submit" class="button is-primary full-width">Modifier</button>                     
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
