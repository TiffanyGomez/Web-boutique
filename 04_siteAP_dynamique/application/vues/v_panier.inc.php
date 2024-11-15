<?php
// Initialiser le panier
Panier::initialiser();

// Ajouter des produits (pour tester)
//Panier::ajouterProduit(1, 3);
//Panier::ajouterProduit(2, 2);
// Afficher les produits dans le panier
$produitsDansPanier = Panier::getProduits();

// Afficher la page HTML
?>



<h1><u>Produits dans le panier</u></h1>

<?php
// Vérifie si le panier n'est pas vide
if (!Panier::isVide()) {
    echo '<ul>';
    $prixTotal = 0;
    // Parcourir chaque produit dans le panier
    foreach ($produitsDansPanier as $idProduit => $qte) {
        $leProduit = GestionBoutique::getProduitById($idProduit);
        $laCategorie = GestionBoutique::getCategorieByIdProduit($idProduit);
        $prix = $leProduit->prix;

        $modifPrix = ControleurPanier::modifPrix($idProduit, $prix);

        $prixTotal = $prixTotal + $modifPrix;

        echo '<li><h3> Catégorie : ' . $laCategorie . ' </h3></li>';
        echo '<li>Nom du produit : ' . $leProduit->nom . '.</br> '
        . 'Prix : ' . $modifPrix . ' €</br>'
        . ' Quantité: ' . $qte . '</li></br>';

        if ($qte > 1) {
            echo "<a  style='color: red' href='index.php?controleur=Panier&action=retirerProduit&produit=$leProduit->id'> Supprimer ce produit</a></br>";
            echo "<a  href='index.php?controleur=Panier&action=reduireQuantite&produit=$leProduit->id'> <img src='public/images/moins-vide.png' title = 'retirer du panier'/>  </a>";
            echo "<a  href='index.php?controleur=Panier&action=augmenterQuantite&produit=$leProduit->id'> <img src='public/images/icon_lama.png' title = 'ajouter au panier'/>  </a>";
        } else {
            echo "<a  style='color: red;' href='index.php?controleur=Panier&action=retirerProduit&produit=$leProduit->id'> Supprimer le produit</a></br>";
            echo "<a  href='index.php?controleur=Panier&action=augmenterQuantite&produit=$leProduit->id'> <img src='public/images/plsu-vide.png' title = 'ajouter au panier'/>  </a>";
        }
    }
    echo '</br>';
    echo '<a  href="index.php?controleur=Panier&action=vider"> Vider le panier.</a></ul>';
    echo '<ul><h2> Sous-total : ' . $prixTotal . '</ul></h2>';
} else {
    echo '<p>Le panier est vide.</p>';
}
?>

