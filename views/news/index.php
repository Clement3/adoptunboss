<div>
<h2>Ajouté une nouveauté</h2>
    <div class="field">
        <div class="control">
            <input class="input" type="text" name="titre" placeholder="titre">
        </div>
    </div>
    <div class="field">
        <div class="file">
            <label class="file-label">
                <input class="file-input" type="file" name="resume">
                <span class="file-cta">
                <span class="file-icon">
                    <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                    Image
                </span>
                </span>
            </label>
        </div>
    </div>
    <div class="field">
        <div class="control">
        <textarea class="textarea" name="content1" placeholder="texte" rows="10"></textarea>
        </div>
    </div>
    <div class="field is-grouped is-grouped-centered">
        <p class="control">
        <a class="button is-primary">
        Valider
    </a>
  </p>
</div>

<div>
<h2>Liste des news</h2>
    <?php
        foreach($data as $new){
            ?>
                <div>
                    <h2><?= $new['title']; ?></h2>
                    <p><?= $new['content']; ?></p>
                    <i><?= $new['created_date']; ?></i>
                    <a href="<?= $helper->base_url('edit/'. $new['id'].'') ?>">modifier</a>
                    <a href="<?= $helper->base_url('delete/'. $new['id'].'') ?>">supprimer</a>
                </div>
                <br/>
            <?php
        }
    ?>
</div>
