<section>
    <?php
    foreach (VariablesGlobales::$lesProduits as $unProduit) {
        ?>

        <article><img src="<?php echo Chemins::IMAGES_PRODUITS . VariablesGlobales::$libelleCategorie . "/" . $unProduit->image; ?>"

            <aside>
                <h1><?php echo $unProduit->nom; ?></h1>
                <h2><?php echo $unProduit->description; ?></h2>
                <h3><?php echo $unProduit->libelle; ?></h3>
                    <?php echo VariablesGlobales::$libelleCategorie; ?>
                <h3><?php echo $unProduit->prix; ?></h3>
                <a href="#">
                    <img src="public/images/ajouter_panier.png" title = "Ajouter au panier"/> </a>
            </aside>

        </article>

    <?php
    }
    ?>

</section>
