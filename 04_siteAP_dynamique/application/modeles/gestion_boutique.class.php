<?php


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

        self::$requete = "SELECT * FROM categorie";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getLesProduits() {
        self::seConnecter();

        self::$requete = "SELECT * FROM produit";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getLesProduitsByCategorie($libelleCategorie) {
        self::seConnecter();
        self::$requete = "SELECT P.id, P.nom, P.description, P.prix, P.image, C.libelle FROM produit P,categorie C WHERE P.idCategorie = C.id AND libelle = :libCateg";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('libCateg', $libelleCategorie);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetchAll();
        self::$pdoStResults->closeCursor();
        return self::$resultat;
    }

    public static function getProduitById($idProduit) {
        self::seConnecter();

        self::$requete = "SELECT * FROM produit WHERE id = $idProduit";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat;
    }

    public static function getNbProduits($NbProduit) {
        self::seConnecter();

        self::$requete = "SELECT COUNT(*) AS nbProduits FROM produit;";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat->nbProduits;
    }

     public static function getCategorieByIdProduit($idProduit) {
        self::seConnecter();
        
        self::$requete = "SELECT C.libelle FROM produit P,categorie C WHERE P.idCategorie = C.id AND P.id = $idProduit";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();

        self::$pdoStResults->closeCursor();

        return self::$resultat->libelle;
    }
    
    public static function ajouterCategorie($libelleCateg) {
        /**
         * Ajoute une ligne dans la table Catégorie 
         * @param type $libelleCateg Libellé de la Catégorie
         */
        self::seConnecter();
        self::$requete = "insert into categorie(libelle) values(:libelle)";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('libelle', $libelleCateg);
        self::$pdoStResults->execute();
    }

    public static function supprimerCategorie($supId) {
        /**
         * Ajoute une ligne dans la table Catégorie 
         * @param type $libelleCateg Libellé de la Catégorie
         */
        self::seConnecter();
        self::$requete = "DELETE FROM categorie WHERE id = :id;";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('id', $supId);
        self::$pdoStResults->execute();
    }

    public static function ajouterProduit($nomProduit, $descriptionProduit, $prixProduit, $imageProduit, $idCategorieProduit) {
        /**
         * Ajoute une ligne dans la table Produit
         * @param type $idProduit id de lu produit
         */
        self::seConnecter();

        self::$requete = "insert into produit(nom,description,prix, image, idCategorie) values ( :nom, :description, :prix, :image, :idCategorie);";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('nom', $nomProduit);
        self::$pdoStResults->bindValue('description', $descriptionProduit);
        self::$pdoStResults->bindValue('prix', $prixProduit);
        self::$pdoStResults->bindValue('image', $imageProduit);
        self::$pdoStResults->bindValue('idCategorie', $idCategorieProduit);

        self::$pdoStResults->execute();
    }

    public static function isAdminOK($login, $mdp) {
        self::seConnecter();
        self::$requete = "SELECT * FROM utilisateur where login=:login and mdp=:mdp";
        self::$pdoStResults = self::$pdoCnxBase->prepare(self::$requete);
        self::$pdoStResults->bindValue('login', $login);
        self::$pdoStResults->bindValue('mdp', $mdp);
        self::$pdoStResults->execute();
        self::$resultat = self::$pdoStResults->fetch();
        self::$pdoStResults->closeCursor();
        if ((self::$resultat != null) and ( self::$resultat->isAdmin))
            return true;
        else
            return false;
    }
//</editor-fold>
}
?>

<?php

//var_dump(GestionBoutique::isAdminOK("petitChef", "passePetitChef"));


//GestionBoutique::seConnecter();
////
//$lesCategories = GestionBoutique::getLesCategories();
//$nbCategories = count($lesCategories);
////
//echo "Il y a $nbCategories categories dans la base : </br>";
//echo "-----------------------------------------   </br>";
////////AVEC FOR :
//////
//for ($i=0;$i<$nbCategories;$i++)
//{
//    echo $lesCategories[$i]->libelle. "(categorie ". $lesCategories[$i]->id. ")</br> " ;
//}
//AVEC FOREACH :
//
//foreach ($lesCategories as $uneCategorie)
//{
//    echo "$uneCategorie->libelle (categorie $uneCategorie->id) </br>";
//}
//
//$lesProduits = GestionBoutique::getLesProduits();
//var_dump($lesProduits);
//
//$lesProduits = GestionBoutique::getLesProduitsByCategorie("blues");
//var_dump($lesProduits);
//
//$leProduit = GestionBoutique::getLesProduitsById(1);
//var_dump($leProduit);
//echo "Produit retourné : <br/>";
//echo "------------------   <br/>";
//echo "id : $leProduit->id<br/>";
//echo "nom : $leProduit->nom <br/>";
//echo "description : $leProduit->description <br/>";
//echo "prix : $leProduit->prix <br/>";
//echo "Fichier de l'image : $leProduit->image <br/>"
//
//$NbProduit = GestionBoutique::getNbProduits('*');
//var_dump($NbProduit);
//echo 'Il y a ', ($NbProduit), ' produits dans la boutique';
//
//GestionBoutique::ajouterCategorie('funk');
//var_dump(GestionBoutique::getLesCategories());
//GestionBoutique::supprimerCategorie();
//var_dump(GestionBoutique::getLesCategories());
//GestionBoutique::ajouterProduit('nouveau nom', 'il est très bien', 16.2, 'image', 4);
//var_dump(GestionBoutique::getLesProduits());
?>