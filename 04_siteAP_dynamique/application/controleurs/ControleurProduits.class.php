<?php

class ControleurProduits {

    public function __construct() {
        // si on séparait les modèles, le constructeur donnerait son chemin
        // require_once Chemins::MODELES.'gestion_categories.class.php'; 
    }

    public function afficher() {
        if (isset($_REQUEST['categorie'])) {
            $_SESSION['categorie'] = $_REQUEST['categorie'];
        }
        VariablesGlobales::$libelleCategorie = $_SESSION['categorie'];
        VariablesGlobales::$lesProduits = GestionBoutique::getLesProduitsByCategorie($_SESSION['categorie']);
        require Chemins::VUES . 'v_produits.inc.php';
    }

    public function ajouterAuPanier() {

        $idProduit = $_REQUEST['produit'];
        //$leProduit = GestionBoutique::getProduitById($idProduit);
        if (Panier::contains($idProduit)) {
            $qte = Panier::getQteByProduit($idProduit);
            $qte += 1;
            Panier::modifierQteProduit($idProduit, $qte);
            self::afficher();

        } else {
            Panier::ajouterProduit($idProduit, 1);
            self::afficher();
        }
    }
}

?>