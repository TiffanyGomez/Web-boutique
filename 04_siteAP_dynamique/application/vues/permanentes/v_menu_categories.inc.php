<nav id="menu_gauche">
    <h1> Catégories </h1>
    <?php
    foreach (VariablesGlobales::$lesCategories as $uneCategorie) {
        ?>

        <a href=index.php?controleur=Produits&action=afficher&categorie=<?php echo $uneCategorie->libelle; ?>><?php echo $uneCategorie->libelle; ?></a>
        
        <?php
    }
    ?> 
</nav>