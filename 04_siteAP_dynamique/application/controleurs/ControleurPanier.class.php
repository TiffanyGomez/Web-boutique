<?php

class ControleurPanier {

    public function __construct() {
        // si on séparait les modèles, le constructeur donnerait son chemin
        // require_once Chemins::MODELES.'gestion_categories.class.php'; 
    }
    
    public function afficherProduitduPanier(){
        VariablesGlobales::$lesProduits = Panier::getProduits();
        require(Chemins::VUES . "v_panier.inc.php");
    }

    public function afficher() {
        if(Panier::getNbProduits()>0){
            self::afficherProduitDuPanier();
        } else{
            return false;
        }
    }
    
    public function vider(){
        Panier::vider();
    }
    
    public function retirerProduit(){
        $idProduit = $_REQUEST['produit'];
        Panier::retirerProduit($idProduit);
        $this->afficherProduitDuPanier();
        
    }

    
    public function reduireQuantite(){
        $idProduit = $_REQUEST['produit'];
        $qte = Panier::getQteByProduit($idProduit);
        $qte = $qte-1;
        Panier::modifierQteProduit($idProduit, $qte);
         header("Location:index.php?controleur=Panier&action=afficherProduitDuPanier");
        //$this->afficherProduitDuPanier();
    }
    
    public function augmenterQuantite(){
        $idProduit = $_REQUEST['produit'];
        $qte = Panier::getQteByProduit($idProduit);
        $qte = $qte+1;
        Panier::modifierQteProduit($idProduit, $qte);
        $this->afficherProduitDuPanier();
    }
    
    public function modifPrix($idProduit, $prix){
        //$idProduit = $_REQUEST['produit'];
        $qte = Panier::getQteByProduit($idProduit);
        $prixNv = $prix*$qte;
        return $prixNv;
        $this->afficherProduitDuPanier();
    }

}

?>