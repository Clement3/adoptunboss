<section class="hero is-primary">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
        Newsletter
      </h1>     
    </div>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="box">
      <?php include('./views/helpers/notifications.php') ?>
      <?php if (empty($newsletters)) { ?>
      <div class="has-text-centered">
        <p>Il n'y à personne d'inscrit à Newsletter.</p>
      </div>
      <?php } else { ?>      
      <table class="table is-fullwidth">
        <thead>
          <tr>
            <th><abbr title="Identifiant"># ID</abbr></th>
            <th>E-mail</th>
            <th>Abonné</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($newsletters as $newsletter) { ?>
            <tr>
              <th><?= $newsletter['id'] ?></th>
              <td><?= $newsletter['email'] ?></td>
              <th>
                <?php if ($newsletter['unsubscribe']) { ?>
                  <span class="tag is-info">Désabonné</span>
                <?php } else { ?>
                  <span class="tag is-primary">Abonné</span>  
                <?php } ?>
              <td>
                <a href="<?= $helper->base_url('admin/newsletters/'. $newsletter['id'] .'/delete') ?>" class="icon has-text-danger">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>              
            </tr>
          <?php } ?>
        </tbody>      
      </table>
      <?php } ?>
    </div>
  </div>
</section>