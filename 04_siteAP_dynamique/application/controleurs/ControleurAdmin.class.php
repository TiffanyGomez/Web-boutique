<?php

Class ControleurAdmin {

    public function afficherIndex() {
        if (isset($_SESSION['login_admin']))
            require Chemins::VUES_ADMIN . 'v_index_admin.inc.php';
        else
            require Chemins::VUES_ADMIN . 'v_connexion.inc.php';
    }

    public function verifierConnexion() {
        if (GestionBoutique::isAdminOK($_POST['login'], $_POST['mdp'])) {
            $_SESSION['login_admin'] = $_POST['login'];
            require Chemins::VUES_ADMIN . 'v_index_admin.inc.php';
        } else
            require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php';
    }

    public function seDeconnecter() {
        // Suppression des variables de session et de la session
        $_SESSION = array();
        session_destroy();
        header("Location:index.php");
    }

//    public function afficherTous() {
//        require_once Chemins::CONTROLEURS . 'ControleurProduits.class.php';
//        $controleurProduits = new ControleurProduits();
//        $controleurProduits->afficher($produits);
//    }
//
//    public function afficherToutes() {
//        require_once Chemins::CONTROLEURS . 'ControleursCategories.class.php';
//        $controleurCategories = new ControleurCategories();
//        $controleurCategories->afficher($categorie);
//    }

    public function afficherToutes() {
        
        VariablesGlobales::$lesProduits = GestionBoutique::getLesCategories();
//        VariablesGlobales::$lesProduits = GestionBoutique::getLesProduitsByCategorie($categories);
        require Chemins::VUES . 'v_produits.inc.php';
    }
}
    