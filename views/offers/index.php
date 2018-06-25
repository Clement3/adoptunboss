<h1><strong>DASHBOARD OFFRES</strong></h1>

<div>
    <form method="post" action="">
        <input type="text" placeholder="Titre" name="title"><br/><br/>
        <input type="text" placeholder="Code postale" name="zip_code"><br/><br/>
        <textarea name="" id="" cols="30" rows="10" placeholder="Contenu" name="content"></textarea><br/><br/>
        <input type="text" placeholder="Salaire max" name="salary_max"><br/><br/>
        <input type="text" placeholder="Salaire min" name="salary_min"><br/><br/>
        <input type="text" placeholder="Experience" name="experience"><br/><br/>
        <input type="text" placeholder="Durée du contrat" name="period"><br/><br/>
        <input type="submit" value="Poster l'offre">
    </form>
</div>

<div>
    <?php 
        foreach ($offers as $offer) {
            ?>
                <div>
                <?= $offer['created_date']; ?><br/>
                    <?= $offer['title']; ?><br/>
                    <?= $offer['content']; ?><br/>
                    <?= $offer['content']; ?><br/>
                    
                    <a href="">Modifier</a>
                    <a href="">Supprimer</a>
                </div>
                <br/>
                <br/>
            <?php
        }
    ?>
</div>