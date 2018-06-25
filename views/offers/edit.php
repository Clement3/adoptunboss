<div>
    <h2>Modifier l'offre</h2>
    <form method="post">
        <input type="text" placeholder="Titre" name="title" value="<?= $offer['title'] ?>"><br/><br/>
        <input type="number" placeholder="Code postale" name="zip_code" value="<?= $offer['zip_code'] ?>"><br/><br/>
        <textarea name="content" cols="30" rows="10" placeholder="Contenu"><?= $offer['content'] ?></textarea><br/><br/>
        <input type="number" placeholder="Salaire max" name="salary_max" value="<?= $offer['salary_max'] ?>"><br/><br/>
        <input type="number" placeholder="Salaire min" name="salary_min" value="<?= $offer['salary_min'] ?>"><br/><br/>
        <input type="number" placeholder="Experience" name="experience" value="<?= $offer['experience'] ?>"><br/><br/>
        <input type="number" placeholder="Durée du contrat" name="period" value="<?= $offer['period'] ?>"><br/><br/>
        <input type="submit" value="Mettre à jour l'offre">
        <a href="/dashboard/offers">Revenir au dashbaord</a>
    </form>

</div>
