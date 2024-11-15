<?php

    // Récupérer le nombre de produits depuis la classe Panier
    $nombreProduits = Panier::getNbProduits();

    echo '<a id="resumePanier" href="#">Mon panier : ' . $nombreProduits . ' article(s)</a>';
?>

