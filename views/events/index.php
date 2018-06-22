<h1 class="title is-1">Evènements</h1>

<?php //var_dump($events); 

?>


<?php foreach ($events as $event) { ?>
    <p> <strong> Titre : </strong><?= $event['title'] ?></p>
    <p> <strong> Description : </strong> <?=  $event['description']?> </p>
    <p> <strong> Date de début : </strong> <?= $event['start_date'] ?> </p>
    <p> <strong> Date de fin : </strong> <?= $event['end_date']?>  </p>
    <p><a href="<?= $helper->base_url('event/'.$event['id'].'')?>"> Plus de détails</a></p>
    <a href="<?= $helper->base_url('event/create') ?>">Créer un nouvel évènement</a>
    <a href="<?= $helper->base_url('event/'.$event['id'].'/edit')?>"> Modifier</a> 
    <a href="<?= $helper->base_url('event/'.$event['id'].'/delete') ?>">Supprimer</a> <br>, <br>

<?php } ?>



