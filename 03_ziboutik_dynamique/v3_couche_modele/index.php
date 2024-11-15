
<?php

require_once 'configs/chemins.class.php';

require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
require Chemins::VUES_PERMANENTES . 'v_menu_categories.inc.php';

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
        $chemin = Chemins::VUES. 'v_'. $categorie . '.inc.php';
        if (file_exists($chemin)) {
            require Chemins::VUES. 'v_' . $categorie . '.inc.php';
        } else {
            require Chemins::VUES . 'v_erreur404.inc.php';
        }
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