<nav id="menu_gauche">
    <h1> Catégories </h1>
    <ul>
        <?php
        foreach (VariablesGlobales::$lesCategories as $uneCategorie) {
            ?>
            <li>
                <a href=index.php?cas=afficherProduits&categorie=<?php echo $uneCategorie->libelle; ?>><?php echo $uneCategorie->libelle; ?></a>
            </li>
            <?php
        }
        ?> 
    </ul>
</nav>