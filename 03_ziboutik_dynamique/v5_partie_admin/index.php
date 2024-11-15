
<?php

require_once 'configs/chemins.class.php';

require_once Chemins::CONFIGS . 'mysql_config.class.php';
require_once Chemins::MODELES . 'gestion_boutique.class.php';
require_once Chemins::CONFIGS . 'variables_globales.class.php';
require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';

require_once Chemins::CONTROLEURS . 'controleur_categories.class.php';
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

if (isset($_COOKIE['login_admin']))
 $_SESSION['login_admin'] = $_COOKIE['login_admin'];

//Aiguillage vers le bon corps de page
switch ($cas) {
    case 'afficherAccueil': {
            require Chemins:: VUES . 'v_accueil.inc.php';
            break;
        }
    case 'afficherProduits': {
            require_once Chemins::CONTROLEURS . 'controleur_produits.class.php';
            $controleurProduits = new ControleurProduits();
            $controleurProduits->afficher($categorie);
            break;
        }
    case 'verifierConnexion': {
            if (GestionBoutique::isAdminOK($_POST['login'], $_POST['passe'])) {
                $_SESSION['login_admin'] = $_POST['login'];
                if (isset($_POST['connexion_auto']))
                    setcookie('login_admin', $_POST['login'], time() + 7 * 24 * 3600, null, null, false, true);

                require Chemins::VUES_ADMIN . 'v_index_admin.inc.php';
            } else
                require Chemins::VUES_ADMIN . 'v_acces_interdit.inc.php';

            break;
        }
    case 'afficherIndexAdmin': {
            if (isset($_SESSION['login_admin']))
                require Chemins::VUES_ADMIN . 'v_index_admin.inc.php';
            else
                require Chemins::VUES_ADMIN . 'v_connexion.inc.php';
            break;
        }
    case 'seDeconnecter': {
            // Suppression des variables de session et de la session
            $_SESSION = array();
            session_destroy();
            setcookie('login_admin', ''); //suppression du cookie en vidant simplement la chaîne
            header("Location:index.php");
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