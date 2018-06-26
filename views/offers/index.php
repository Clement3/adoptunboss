<h1><strong>DASHBOARD OFFRES</strong></h1>

<div>
    <h2><strong>Créer une offre</strong></h2>
    <form method="post">
        <input type="text" placeholder="Titre" name="title"><br/><br/>
        <input type="number" placeholder="Code postale" name="zip_code"><br/><br/>
        <textarea name="content" cols="30" rows="10" placeholder="Contenu"></textarea><br/><br/>
        <input type="number" placeholder="Salaire max" name="salary_max"><br/><br/>
        <input type="number" placeholder="Salaire min" name="salary_min"><br/><br/>
        <input type="number" placeholder="Experience" name="experience"><br/><br/>
        <input type="number" placeholder="Durée du contrat" name="period"><br/><br/>
        <input type="submit" value="Poster l'offre">
    </form>
</div><br/><br/>

<div>
    <h2>Liste des offres</h2>
    <?php 
        foreach ($offers as $offer) {
            ?>
                <div>
                <?= $offer['created_date']; ?><br/>
                    <strong>Poste : </strong><?= $offer['title'] ?><br/> 
                    <p><strong>Missions : </strong><?= $offer['content'] ?></p>
                    <p><strong>Code postale : </strong><?= $offer['zip_code'] ?></p>
                    <p><strong>Salaire débutant : </strong><?= $offer['salary_min'] ?></p>
                    <p><strong>Salaire confirmé : </strong><?= $offer['salary_max'] ?></p>
                    <p><strong>Expérience requise : </strong><?= $offer['experience'] ?> ans</p>
                    <p><strong>Durée du contrat </strong><?= $offer['period'] ?> mois</p>
                    <i>Date de création : <?= $offer['created_date'] ?></i>
                    <i><?= $offer['updated_date'] ? " | Modifier le : " . $offer['updated_date']  : "" ?></i><br/> 
                    <a href="<?= $helper->base_url('dashboard/offers/'. $offer['id'] .'/update') ?>">Modifier</a>
                    <a href="<?= $helper->base_url('dashboard/offers/'. $offer['id'] .'/delete') ?>">Supprimer</a>
                </div>
                <br/>
                <br/>
            <?php
        }
    ?>
</div>