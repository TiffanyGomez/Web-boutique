
<?php

require_once 'configs/chemins.class.php';

require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';
require Chemins::VUES_PERMANENTES . 'v_menu_categories.inc.php';

$cas = (!isset($_REQUEST['cas'])) ? 'afficherAccueil' : $_REQUEST['cas'];

if (isset($_REQUEST['categorie'])) {
    $categorie = $_REQUEST['categorie'];
}

//Aiguillage vers le bon corps de page
switch ($cas) {
    case 'afficherAccueil': {
            require Chemins::VUES . 'v_accueil.inc.php';
            break;
        }
    case 'afficherProduits': {
            require Chemins::VUES . 'v_' . $categorie . '.inc.php';
            break;
        }
}

// Résumé du panier et pied de page
require Chemins::VUES_PERMANENTES . 'v_resume_panier.inc.php';
require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';

?>