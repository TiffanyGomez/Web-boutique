
<?php

require_once 'configs/chemins.class.php';

require_once Chemins::CONFIGS.'mysql_config.class.php';
require_once Chemins::MODELES.'gestion_boutique.class.php';
require_once Chemins::CONFIGS.'variables_globales.class.php';
require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';

require_once Chemins::CONTROLEURS.'controleur_categories.class.php';
$controleurCategories = new ControleurCategories();
$controleurCategories->afficher();

//Affectation d'une variable $cas en fonction du paramètre d'URL
if (!isset($_REQUEST['cas'])) {
    $cas = 'afficherAccueil';
} else {
    $cas = $_REQUEST['cas'];
}
if (isset($_REQUEST['categorie'])) {
    $categorie = $_REQUEST['categorie'];
}

//Aiguillage vers le bon corps de page
switch ($cas) {
    case 'afficherAccueil': {
            require Chemins:: VUES . 'v_accueil.inc.php';
            break;
        }
    case 'afficherProduits': {
       require_once Chemins::CONTROLEURS.'controleur_produits.class.php';
       $controleurProduits = new ControleurProduits();
       $controleurProduits->afficher($categorie);
       break;
    }
        
    default : {
            require Chemins:: VUES . 'v_erreur404.inc.php';
            break;
        }
}

// Résumé du panier et pied de page
require Chemins::VUES_PERMANENTES . 'v_resume_panier.inc.php';
require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';

?>