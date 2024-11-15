
<?php
error_reporting( E_ALL); ini_set("display_errors", 1);
//echo sha1("motdepasse");
session_start(); // Pour éviter erreurs SESSIONS

ob_start(); // Pour éviter erreur COOKIES

require_once 'configs/chemins.class.php';
require_once Chemins::CONFIGS . 'mysql_config.class.php';
require_once Chemins::MODELES . 'gestion_boutique.class.php';
require_once Chemins::LIBS . 'Panier.class.php';
require_once Chemins::CONFIGS . 'variables_globales.class.php';
require Chemins::VUES_PERMANENTES . 'v_entete.inc.php';

Panier::initialiser();
//var_dump(Panier::getProduits());

require_once Chemins::CONTROLEURS . 'ControleurCategories.class.php';
$controleurCategories = new ControleurCategories();
$controleurCategories->afficher();

if (!isset($_REQUEST['controleur'])) {
    require_once(Chemins::VUES . "v_accueil.inc.php");
} else {

    $classeControleur = 'Controleur' . $_REQUEST['controleur']; //ex : ControleurProduits
    $fichierControleur = $classeControleur . ".class.php"; //ex : ControleurProduits.class.php
    require_once(Chemins::CONTROLEURS . $fichierControleur);

    $action = $_REQUEST['action']; //exemple : afficher

    $objetControleur = new $classeControleur(); //ex : $objetControleur = new ControleurProduits();
    $objetControleur->$action(); //ex : $objetControleur->afficher();
    //version avec classe statique
    // $classeStatiqueControleur = 'Controleur' . $_REQUEST['controleur'];
    // $classeStatiqueControleur::$action();
}

// Résumé du panier et pied de page
require Chemins::VUES_PERMANENTES . 'v_resume_panier.inc.php';
require Chemins::VUES_PERMANENTES . 'v_pied.inc.php';

?>