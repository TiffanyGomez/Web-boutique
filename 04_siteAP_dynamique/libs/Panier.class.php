<?php

//Classe statique, peut aussi être géré avec un singleton

class Panier {

// <editor-fold defaultstate="collapsed" desc="région INITS DE PANIER">

    public static function initialiser() {
        if (!isset($_SESSION['produit'])) {
            $_SESSION['produit'] = array();
        }
    }

    public static function vider() {
        $_SESSION['produit'] = array();
    }

    public static function detruire() {
        unset($_SESSION['produit']);
    }

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="région AJOUTS / MODIFS / SUPRESSION">

    public static function ajouterProduit($idProduit, $qte) {
        if (Panier::contains($idProduit))
            $_SESSION['produit'][$idProduit] += $qte;
        else
            $_SESSION['produit'][$idProduit] = $qte;
    }

    public static function modifierQteProduit($idProduit, $qte) {
        if (Panier::contains($idProduit))
            $_SESSION['produit'][$idProduit] = $qte;
    }

    public static function retirerProduit($idProduit) {
        if (Panier::contains($idProduit))
            unset($_SESSION['produit'][$idProduit]);
    }

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="région FONCTIONS GET">

    public static function getProduits() {
        return $_SESSION['produit'];
    }

    public static function getNbProduits() {
        if (isset($_SESSION['produit'])) {
            return array_sum($_SESSION['produit']);
        }
        // ou en 1 ligne : 
        //return isset($_SESSION['produits'])?array_sum($_SESSION['produits']):0;
    }

    public static function getQteByProduit($idProduit) {
        if (Panier::contains($idProduit))
            return $_SESSION['produit'][$idProduit];        
    }

// </editor-fold>    
// <editor-fold defaultstate="collapsed" desc="région FONCTIONS BOOLEENNES">
    public static function isVide() {
        return (self::getNbProduits() == 0);
        // OU
//        if (self::getNbProduits() == 0){
//            return true;
//        }
//        else {
//            return false;
//        }
    }



    
    public static function contains($idProduit) {
        return (array_key_exists($idProduit, self::getProduits()));
        
//        if (array_key_exists($idProduit, self::getProduits())) {
//            return true;
//        } else {
//            return false;
//        }
    }
    
// </editor-fold> 
}

//Panier::initialiser();
//Panier::ajouterProduit(4, 2);
//Panier::ajouterProduit(11, 6);
//
//var_dump(Panier::getProduits()); // OU var_dump($_SESSION['produits']);
//
//Panier::retirerProduit(1);
//Panier::retirerProduit(4);
//Panier::retirerProduit(11);
//var_dump(Panier::isVide());

//var_dump($_SESSION['produits']);
//echo PanierTestQte::getQteByProduit(8);
//TODO ADAPTER LES CAS ET LA VUE DU PANIER...
?>
