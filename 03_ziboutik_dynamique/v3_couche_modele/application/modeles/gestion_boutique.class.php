<?php

require_once '../../configs/mysql_config.class.php';

class GestionBoutique {

//<editor-fold defaultstate="collapsed" desc="région Champs statiques">

    private static $pdoCnxBase = null;
    private static $pdoStResults = null;
    private static $requete = ""; //texte de la requête
    private static $resultat = null; //résultat de la requête

    /**
     * Permet de se connecter à la base de données
     */
    //</editor-fold>
    
   
//<editor-fold defaultstate="collapsed" desc="région Méthodes statiques">

    public static function seConnecter() {
        if (!isset(self::$pdoCnxBase)) { //S'il n'y a pas encore eu de connexion
            try {
                self::$pdoCnxBase = new PDO('mysql:host=' . MysqlConfig::SERVEUR . ';dbname=' .
                        MysqlConfig::BASE, MysqlConfig::UTILISATEUR, MysqlConfig::MOT_DE_PASSE);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$pdoCnxBase->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$pdoCnxBase->query("SET CHARACTER SET utf8");
            } catch (Exception $e) {
                echo 'Erreur : ' . $e->getMessage() . '<br />'; // méthode de la classe Exception
                echo 'Code : ' . $e->getCode(); // méthode de la classe Exception
            }
        }
    }

    public static function seDeconnecter() {
        self::$pdoCnxBase = null;
    }

    public static function getLesCategories() {
        self::seConnecter();

        self::$requete = "SELECT * FROM Categorie";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getLesProduits() {
        self::seConnecter();

        self::$requete = "SELECT * FROM Produit";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getLesProduitsByCategorie($libelleCategorie) {
        self::seConnecter();
        self::$requete = "SELECT * FROM Produit P,Categorie C where P.idCategorie = C.id AND libelle = :libCateg";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('libCateg', $libelleCategorie);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }

    public static function getLesProduitsById($idProduit) {
        self::seConnecter();

        self::$requete = "SELECT * FROM Produit WHERE Produit.id = $idProduit";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getNbProduits($NbProduit) {
        self::seConnecter();

        self::$requete = "SELECT COUNT(*) AS nbProduits FROM Produit;";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat->nbProduits;
    }

   
    public static function ajouterCategorie($libelleCateg) {
         /**
     * Ajoute une ligne dans la table Catégorie 
     * @param type $libelleCateg Libellé de la Catégorie
     */
        self::seConnecter();
        self::$requete = "insert into Categorie(libelle) values(:libelle)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('libelle', $libelleCateg);
        self::$pdoStResults->execute();
    }
    
    public static function ajouterProduit($nomProduit, $descriptionProduit, $prixProduit, $imageProduit, $idCategorieProduit) {
         /**
     * Ajoute une ligne dans la table Produit
     * @param type $idProduit id de lu produit
     */
        self::seConnecter();
        
        self::$requete = "insert into Produit(nom,description,prix, image, idCategorie) values ( :nom, :description, :prix, :image, :idCategorie);";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('nom', $nomProduit);
        self::$pdoStResults->bindValue('description', $descriptionProduit);
        self::$pdoStResults->bindValue('prix', $prixProduit);
        self::$pdoStResults->bindValue('image', $imageProduit);
        self::$pdoStResults->bindValue('idCategorie', $idCategorieProduit);
        
        self::$pdoStResults->execute();
    }

//</editor-fold>
}
?>

<?php

//GestionBoutique::seConnecter();
//
//$lesCategories = GestionBoutique::getLesCategories();
//var_dump($lesCategories);
//
//$lesProduits = GestionBoutique::getLesProduits();
//var_dump($lesProduits);
//
//$lesProduits = GestionBoutique::getLesProduitsByCategorie("blues");
//var_dump($lesProduits);
//
//$leProduit = GestionBoutique::getLesProduitsById(1);
//var_dump($leProduit);
//
//$NbProduit = GestionBoutique::getNbProduits('*');
//var_dump($NbProduit);
//echo 'Il y a ', ($NbProduit), ' produits dans la boutique';
//
//GestionBoutique::ajouterCategorie('funk');
//var_dump(GestionBoutique::getLesCategories());

//GestionBoutique::ajouterProduit('nouveau nom', 'il est très bien', 16.2, 'image', 4);
//var_dump(GestionBoutique::getLesProduits());

?>