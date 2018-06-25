<?php if ($helper->has('flash')) { ?>
  <div class="notification <?= $helper->session['class'] ?>">
    <button id="notification-delete" class="delete"></button>
    <?= $helper->session['message'] ?>
  </div>            
<?php } ?>
<?php if ($helper->hasErrors()) { ?>
  <div class="notification is-danger">
      <button id="notification-delete" class="delete"></button>
      <p class="has-text-weight-bold">Une ou des erreur(s) se sont produite :</p>
      <ul class="errors-list">
      <?php foreach ($helper->errors() as $error) { ?>
        <li><?= $error ?></li>
        <?php } ?>
      </ul>
    </div>           
<?php } ?>